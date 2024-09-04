@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts List</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk Menambah Post -->
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add New Post</a>

    <!-- Tabel untuk Menampilkan Daftar Post -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Body</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->body, 100) }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
