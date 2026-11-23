<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlide;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'title.fr' => 'nullable|string',
            'subtitle.en' => 'nullable|string',
            'subtitle.ar' => 'nullable|string',
            'subtitle.fr' => 'nullable|string',
            'description.en' => 'nullable|string',
            'description.ar' => 'nullable|string',
            'description.fr' => 'nullable|string',
            'button_text.en' => 'nullable|string',
            'button_text.ar' => 'nullable|string',
            'button_text.fr' => 'nullable|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:4096',
        ]);

        $imagePath = 'assets/images/banner/bg-01.jpg';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'slide_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/banner'), $filename);
            $imagePath = 'assets/images/banner/' . $filename;
        }

        HeroSlide::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link ?: '/contact',
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?: 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.slides.index')->with('success', 'Hero slide created successfully!');
    }

    public function edit(HeroSlide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, HeroSlide $slide)
    {
        $validated = $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:4096',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link ?: '/contact',
            'sort_order' => $request->sort_order ?: 0,
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'slide_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/banner'), $filename);
            $data['image'] = 'assets/images/banner/' . $filename;
        }

        $slide->update($data);

        return redirect()->route('admin.slides.index')->with('success', 'Hero slide updated successfully!');
    }

    public function destroy(HeroSlide $slide)
    {
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Hero slide deleted successfully!');
    }
}
