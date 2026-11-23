<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSlide;
use App\Models\Service;
use App\Models\Post;
use App\Models\TeamMember;
use App\Models\Inquiry;
use App\Models\Setting;

class FrontendController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $posts = Post::where('is_published', true)->orderByDesc('published_at')->take(3)->get();
        $team = TeamMember::orderBy('sort_order')->take(3)->get();

        return view('frontend.index', compact('slides', 'services', 'posts', 'team'));
    }

    public function about()
    {
        $team = TeamMember::orderBy('sort_order')->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(3)->get();
        return view('frontend.about', compact('team', 'services'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.services', compact('services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $allServices = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('frontend.service-details', compact('service', 'allServices'));
    }

    public function blog()
    {
        $posts = Post::where('is_published', true)->orderByDesc('published_at')->paginate(6);
        return view('frontend.blog', compact('posts'));
    }

    public function blogDetails($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $recentPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->orderByDesc('published_at')->take(3)->get();
        return view('frontend.blog-details', compact('post', 'recentPosts'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function submitInquiry(Request $request)
    {
        $validated = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:191',
            'subject' => 'nullable|string|max:191',
            'message' => 'required|string|max:5000',
            'type' => 'nullable|in:quote,contact',
        ])->validate();

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'subject' => $validated['subject'] ?? 'Website Inquiry',
            'message' => $validated['message'],
            'type' => $validated['type'] ?? 'contact',
            'status' => 'new',
        ]);

        $msg = match (app()->getLocale()) {
            'ar' => 'تم استلام طلبكم بنجاح! سيتواصل معكم فريق التجارة الدولية في أقرب وقت.',
            'fr' => 'Votre demande a bien été reçue ! Notre équipe commerciale vous contactera rapidement.',
            default => 'Your inquiry has been submitted successfully! Our export desk will contact you shortly.',
        };

        return back()->with('success', $msg);
    }

    public function changeLanguage($locale)
    {
        if (in_array($locale, ['en', 'ar', 'fr'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
