<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Article</title>
    <!-- إضافة Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px 0;
            display: flex; /* استخدام Flexbox لترتيب العناصر أفقياً */
            justify-content: flex-start; /* جعل الروابط تبدأ من اليسار */
            align-items: center;
        }

        .navbar li {
            display: inline-block; /* جعل العناصر تظهر بجانب بعضها */
            margin-right: 20px; /* المسافة بين الروابط */
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
            min-height: 100vh;
        }

        .article-section {
            flex: 2;
            padding-right: 30px;
        }

        .comments-section {
            flex: 1;
            padding-left: 30px;
            border-left: 2px solid #ddd;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .meta {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-style: italic;
        }

        .content {
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .button-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        button {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1em;
        }

        button:hover {
            background-color: #34495e;
            transform: translateY(-2px);
        }

        .comment {
            margin-bottom: 15px;
            padding: 10px;
            background: #f4f4f4;
            border-radius: 5px;
        }

        .comment .author {
            font-weight: bold;
            color: #2c3e50;
        }

        .comment .content {
            margin-top: 5px;
        }

        /* DropDown Menu CSS */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2c3e50;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #34495e;
        }

        .dropdown.active .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <!-- ناف بار -->
    <div class="navbar">
        <li><a>GLOBAL BLOG</a></li> 
        <li><a href="{{route('main')}}">Home</a></li>
        <!-- Dropdown Menu for Sections -->
        <li class="dropdown" id="sectionsDropdown">
            <a href="javascript:void(0)" onclick="toggleDropdown()">Sections</a>
            <div class="dropdown-content">
                @foreach ( App\Models\Section::all() as $item)
                    <a class="dropdown-item" name="section_id" href="{{route('section.show',$item->id)}}">{{$item->section}}</a>
                @endforeach    
            </div>
        </li>
        <a href="#">Contact</a>
    </div>

    <div class="container">
        <div class="article-section">
            <h1>{{ $showBlog->blog_title }}</h1>
            <div class="meta">
                <span>{{ $showBlog->created_at }}</span>
            </div>
            <div class="meta">
                <span id="section">Section: {{ $showBlog->section->section }}</span>
            </div>
            <div class="content">
                {{ $showBlog->article }}
            </div>
            @if (auth()->user()->role == 'admin')
            <div class="button-container">
                <a href="{{ route('Blog.edit', $showBlog->id) }}">
                    <button>Edit</button>
                </a>

                <button id="deleteBtn" data-toggle="modal" data-target="#modaldemo9">Delete</button>
             @endif
            <button id="downloadBtn">Download</button>
        </div>
         <br>

        <div class="comments-section">
            <form action="{{ route('Comment.store', $showBlog->id) }}" method="post">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $showBlog->id }}">
                <div class="comment-box">
                    <input type="text" name="comment" placeholder="Write a comment..." required />
                    <button id="commentBtn">Post Comment</button>
                    <br>
                </div>
                <br>

                @foreach ($comments as $comment)
                    <div class="comment">
                        <div class="author">{{ $comment->user_name }}</div>
                        <div class="content">{{ $comment->comment }}</div>
                    </div>
                @endforeach
            </form>
        </div>
    </div>

    <!-- إضافة Bootstrap JS (bundle الذي يحتوي على JavaScript و Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Dropdown Toggle -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('sectionsDropdown');
            dropdown.classList.toggle('active');
        }
    </script>

</body>

</html>
