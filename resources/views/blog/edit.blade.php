<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fffaf0;
            padding: 30px;
            font-size: 18px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #fd7e14;
            text-align: center;
            font-size: 32px;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 17px;
        }

        button {
            margin-top: 25px;
            background-color: #fd7e14;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e8590c;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: #007bff;
            font-size: 17px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .errors {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-top: 20px;
            border-radius: 8px;
        }

        .current-image {
            margin-top: 15px;
        }

        .current-image img {
            max-width: 250px;
            border-radius: 10px;
            box-shadow: 0 0 6px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🛠️ Edit Blog Post</h1>

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Title:</label>
            <input type="text" name="title" value="{{ $blog->title }}">

            <label>Content:</label>
            <textarea name="content" rows="6">{{ $blog->content }}</textarea>

            <label>Current Image:</label>
            <div class="current-image">
                @if($blog->image)
                    <img src="{{ asset('uploads/' . $blog->image) }}" alt="Current Image">
                @else
                    <p style="color: gray;">No image uploaded.</p>
                @endif
            </div>

            <label>Change Image:</label>
            <input type="file" name="image">

            <button type="submit">🔁 Update Blog</button>
        </form>

        <a href="{{ route('blog.index') }}" class="back-link">← Back to Blog List</a>
    </div>
</body>
</html>
