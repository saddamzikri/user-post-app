<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Ambil semua post dari database, termasuk user yang terkait
        $posts = Post::with('user')->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Ambil semua user untuk digunakan dalam form pembuatan post
        $users = User::all();

        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Simpan post baru ke dalam database
        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        // Tampilkan detail post tertentu
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Ambil semua user untuk digunakan dalam form pengeditan post
        $users = User::all();

        return view('posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, Post $post)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update data post di database
        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Hapus post dari database
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
