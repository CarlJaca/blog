<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only('title', 'content');

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }

        Blog::create($data);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only('title', 'content');

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
            unlink(public_path('uploads/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
