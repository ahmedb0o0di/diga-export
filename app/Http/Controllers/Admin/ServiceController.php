<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'slug' => 'nullable|string|unique:services,slug',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->input('title.en'));
        if (Service::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $imagePath = 'assets/images/services/services-01.jpg';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'service_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/services'), $filename);
            $imagePath = 'assets/images/services/' . $filename;
        }

        Service::create([
            'slug' => $slug,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $request->icon ?: 'fa-solid fa-ship',
            'image' => $imagePath,
            'sort_order' => $request->sort_order ?: 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'slug' => 'nullable|string|unique:services,slug,' . $service->id,
            'image' => 'nullable|image|max:4096',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $request->icon ?: $service->icon,
            'sort_order' => $request->sort_order ?: 0,
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'service_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/services'), $filename);
            $data['image'] = 'assets/images/services/' . $filename;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
