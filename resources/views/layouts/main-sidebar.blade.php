<style>
    /* تأثير التدرج اللوني للـ Sidebar */
    .app-sidebar {
        background: linear-gradient(180deg, #3e2723, #8b0000); /* تدرج من اللون الأسمر (البني الداكن) إلى الأحمر الداكن */
        color: white;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    /* قائمة العناصر في الـ Sidebar */
    .side-menu__item {
        color: white !important; /* النص باللون الأبيض */
        font-size: 16px;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .side-menu__item:hover {
        background-color: rgba(255, 255, 255, 0.1); /* تأثير التمرير بخلفية شفافة */
        transform: translateX(5px); /* حركة خفيفة عند التمرير */
        color: #ff4c4c !important; /* تغيير اللون إلى الأحمر عند التمرير */
    }

    .side-item-category {
        font-weight: bold;
        color: white !important; /* التأكد من أن الفئة الرئيسية باللون الأبيض */
        margin-top: 20px;
    }

    /* تحسين الخطوط داخل القائمة */
    .side-menu__label {
        color: white !important;
        font-weight: 500;
    }

    /* تحسين الأيقونات */
    .side-menu__icon {
        fill: white !important;
        width: 22px;
        height: 22px;
        margin-right: 10px;
        transition: fill 0.3s ease;
    }

    .side-menu__item:hover .side-menu__icon {
        fill: #ff4c4c; /* تغيير اللون عند التمرير */
    }

    /* تحسين الأيقونات الاجتماعية */
    .social-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        padding: 20px 0;
    }

    .social-icons a i {
        font-size: 30px;
        color: white !important;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-icons a i:hover {
        transform: scale(1.2);
        color: #ff4c4c; /* تغيير اللون عند التمرير */
    }

    /* تحسين مظهر صورة المستخدم */
    .app-sidebar__user img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid white;
        margin-right: 10px;
    }

    .user-info h4 {
        color: white !important;
        font-size: 18px;
        margin: 5px 0;
    }

    .user-info span {
        color: #b0bec5;
    }
</style>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo">
        </a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo">
        </a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="user-info">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{ URL::asset('assets/img/faces/6.jpg') }}">
                    <span class="avatar-status profile-status bg-green"></span>
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'index')) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">Blogs</span>
                </a>
            </li>
            <li class="side-item side-item-category">General</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3" />
                        <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">Create Blog</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('Blog.index') }}">Create New Blog</a></li>
                </ul>
            </li>
            @if (auth()->user()->role == 'admin')
                 <li class="side-item side-item-category">Details</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                    </svg>
                    <span class="side-menu__label">Sections</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('section.index')}}">Sections</a></li>
                </ul>
            </li>
            @endif
       
           @php 
           $role =Auth::user()->role;
           @endphp
           @if($role== 'admin')
                <li class="side-item side-item-category"></li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                        </svg>
                        <span class="side-menu__label">Permissions</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('users.index')}}">Permissions of Users</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category"></li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3" />
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z" />
                        </svg>
                        <span class="side-menu__label">User Page</span>
                        <i class="angle fe fe-chevron-down"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('main')}}">User Page</a></li>
                    </ul>
                </li>
            @endif    
            <li class="side-item side-item-category">Contact Us</li>
            <br><br>
            <li class="slide">
                <div class="social-icons">
                    <a href="https://www.facebook.com/share/17snhxgZ5K/?mibextid=LQQJ4d" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/momen_no77" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/momenahmed77" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
