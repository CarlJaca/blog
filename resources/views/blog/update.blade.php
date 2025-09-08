<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE BLOG</title>
</head>
<body>
    <h1>Update a New Blog Post</h1>
    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" value="{{ $blog->title }}" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" value="{{ $blog->content }}" required></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            @if($blog->image)
                <div>
                    <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image" width="200">
                </div>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Create Post</button>
    </form>
    <a href="{{ route('blog.index') }}">Back to Blog List</a>
</body>
</html>