@extends('layouts.master')

@section('content')
  <style>
    /* استايل الصفحة بالكامل */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #121212; /* خلفية داكنة */
      color: #f0f0f0; /* نص بلون فاتح */
      line-height: 1.6;
    }

    /* تنسيق المقالات */
    main {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      padding: 20px;
    }

    /* تصميم المقالة */
    .article {
      background-color: #1c1c1c; /* خلفية داكنة للمقالات */
      width: 300px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    .article:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.5);
    }

    /* تنسيق الصورة داخل المقالة */
    .article-image img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    /* تنسيق محتوى المقال */
    .article-content {
      padding: 15px;
    }

    .article-content h4 {
      color: #e74c3c; /* العناوين باللون الأحمر الفاتح */
      font-size: 1.5em;
      margin-bottom: 10px;
    }

    .article-content p {
      color: #d1d1d1; /* نص المقال باللون الفاتح */
      font-size: 1em;
    }

    .article-content a {
      color: #e74c3c; /* روابط باللون الأحمر */
      text-decoration: none;
    }

    .article-content a:hover {
      text-decoration: underline;
    }

  </style>

<main>
  @foreach (App\Models\Blog::all() as $item)
    <div class="article">
      <div class="article-image">
        <!-- عرض الصورة باستخدام asset() -->
        <img src="{{ asset('public/storage/images/' . $item->image) }}" alt="{{ $item->blog_title }}">
      </div>
      <div class="article-content">
        <h4 class="card-title">{{ $item->blog_title }}</h4>
        <a href="{{ route('Blog.show', $item->id) }}">Read More <i class="fe fe-arrow-right ml-1"></i></a>
      </div>
    </div>
  @endforeach
</main>


  <script>
    // تأكيد أن الصفحة تم تحميلها بالكامل
    document.addEventListener('DOMContentLoaded', function() {
      const articles = document.querySelectorAll('.article');

      // إضافة تأثيرات عند التمرير فوق المقالات
      articles.forEach(article => {
        article.addEventListener('mouseenter', () => {
          article.style.boxShadow = "0 8px 12px rgba(0, 0, 0, 0.5)";
        });

        article.addEventListener('mouseleave', () => {
          article.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.3)";
        });
      });
    });
  </script>
@endsection
