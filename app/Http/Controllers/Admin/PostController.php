<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'slug' => 'nullable|string|unique:posts,slug',
            'thumbnail' => 'nullable|image|max:4096',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->input('title.en'));
        if (Post::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $thumbPath = 'assets/images/blog/details/01.png';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'post_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/blog'), $filename);
            $thumbPath = 'assets/images/blog/' . $filename;
        }

        Post::create([
            'slug' => $slug,
            'title' => $request->title,
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'author' => $request->author ?: 'DIJA Group Trade Desk',
            'read_time' => $request->read_time ?: '5 min read',
            'thumbnail' => $thumbPath,
            'published_at' => $request->published_at ? \Carbon\Carbon::parse($request->published_at) : now(),
            'is_published' => $request->boolean('is_published', true),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Article published successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'content.en' => 'required|string',
            'content.ar' => 'required|string',
            'slug' => 'nullable|string|unique:posts,slug,' . $post->id,
            'thumbnail' => 'nullable|image|max:4096',
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'author' => $request->author ?: $post->author,
            'read_time' => $request->read_time ?: $post->read_time,
            'is_published' => $request->boolean('is_published'),
        ];

        if ($request->slug) {
            $data['slug'] = Str::slug($request->slug);
        }

        if ($request->published_at) {
            $data['published_at'] = \Carbon\Carbon::parse($request->published_at);
        }

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'post_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/blog'), $filename);
            $data['thumbnail'] = 'assets/images/blog/' . $filename;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Article deleted successfully!');
    }
}
