<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f8ff;
            margin: 0;
            padding: 20px;
            font-size: 18px; /* Bigger default font */
        }

        h1 {
            color: #1a73e8;
            text-align: center;
            font-size: 36px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        a.button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }

        a.button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #d3d3d3;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #1a73e8;
            color: white;
            font-size: 20px;
        }

        td {
            vertical-align: middle;
            font-size: 18px;
        }

        img {
            max-width: 200px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .action-buttons a,
        .action-buttons button {
            margin: 5px;
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #ffc107;
            color: black;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📖 Blog List</h1>
        <a href="{{ route('blog.create') }}" class="button">➕ Create New Blog Post</a>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td><strong>{{ $blog->title }}</strong></td>
                    <td>{{ $blog->content }}</td>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog Image">
                        @else
                            <span style="color: gray;">No Image</span>
                        @endif
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('blog.edit', $blog->id) }}" class="edit-btn">✏️ Edit</a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Delete this blog post?')">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
