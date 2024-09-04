@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <!-- Menampilkan pesan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk Mengedit Post -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" required>{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
