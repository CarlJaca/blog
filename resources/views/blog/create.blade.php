<!DOCTYPE html>
<html>
<head>
    <title>Create Blog</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f9ff;
            padding: 30px;
            font-size: 18px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
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
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>✍️ Create Blog Post</h1>

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Title:</label>
            <input type="text" name="title" placeholder="Enter blog title">

            <label>Content:</label>
            <textarea name="content" rows="6" placeholder="Write your blog content here..."></textarea>

            <label>Upload Image:</label>
            <input type="file" name="image">

            <button type="submit">✅ Create Blog</button>
        </form>

        <a href="{{ route('blog.index') }}" class="back-link">← Back to Blog List</a>
    </div>
</body>
</html>
