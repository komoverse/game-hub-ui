<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Komodo Legends Administration Panel">
        <meta name="author" content="Nikko Agustino">
        <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
        <title>Administration Panel - Komodo Legends</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="shortcut icon" href="{{ url('assets/img/admin-icon.webp') }}" />

        <link rel="canonical" href="https://demo-basic.adminkit.io/" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/o7ana1st7f3eol0lr350rwyddca19v65gnfhxwd2hnkfhr5l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


        <link href="{{ url('assets/css/adminkit.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/admin.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b71ce7388c.js" crossorigin="anonymous"></script>
        <script src="https://files.komoverse.io/jquery.komo-env.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        @if ($errors)
            @foreach ($errors->all() as $message) 
                {{ $message }}
            @endforeach
        @endif

        @if (Request::path() == 'admin/login')
            @yield('content')
        @else
            <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <span class="sidebar-brand">
                    <img src="{{ url('assets/img/admin-logo.webp') }}" alt="">
                </span>
                <ul class="sidebar-nav">
                    <li class="sidebar-item <?= (Request::path() == 'admin') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin') }}">
              <i class="fas fa-chart-line"></i> <span class="align-middle">Dashboard</span>
            </a>
                    </li>
                    <li class="sidebar-item <?= (Request::path() == 'media') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/media') }}">
              <i class="fas fa-photo-video"></i> <span class="align-middle">Media</span>
            </a>
                    </li>

                    <li class="sidebar-header">
                        News
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/news/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/news/create') }}">
              <i class="fas fa-edit"></i> <span class="align-middle">Create News Article</span>
            </a>
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/news/list') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/news/list') }}">
              <i class="fas fa-newspaper"></i> <span class="align-middle">News Article List</span>
            </a>
                    </li>

                    <li class="sidebar-header">
                        Partnership
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/partner/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/partner/create') }}">
              <i class="fas fa-edit"></i> <span class="align-middle">Create Partnership Article</span>
            </a>
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/partner/list') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/partner/list') }}">
              <i class="fas fa-newspaper"></i> <span class="align-middle">Partnership Article List</span>
            </a>
                    </li>

                    <li class="sidebar-header">
                        Academy
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/academy/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/academy/create') }}">
              <i class="fas fa-edit"></i> <span class="align-middle">Create Academy Article</span>
            </a>
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/academy/list') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/academy/list') }}">
              <i class="fas fa-newspaper"></i> <span class="align-middle">Academy Article List</span>
            </a>
                    </li>

                    <li class="sidebar-header">Game Updates</li>
                    <li class="sidebar-item <?= (Request::path() == 'admin/game-announcement/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/game-announcement/create') }}">
                            <i class="fas fa-edit"></i> <span class="align-middle">Create Game Announcement</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= (Request::path() == 'admin/game-announcement/list') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/game-announcement/list') }}">
                            <i class="fas fa-bullhorn"></i> <span class="align-middle">List Game Announcement</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= (Request::path() == 'admin/patch-notes/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/patch-notes/create') }}">
                            <i class="fas fa-edit"></i> <span class="align-middle">Create Patch Notes</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= (Request::path() == 'admin/patch-notes/list') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/patch-notes/list') }}">
                            <i class="fas fa-sync-alt"></i> <span class="align-middle">List Patch Notes</span>
                        </a>
                    </li>


                    <li class="sidebar-header">
                        Newsletter
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/newsletter/create') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/newsletter/create') }}">
              <i class="fas fa-envelope-open-text"></i> <span class="align-middle">Create Newsletter</span>
            </a>
                    </li>


                    <li class="sidebar-item <?= (Request::path() == 'admin/newsletter/archive') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/newsletter/archive') }}">
              <i class="fas fa-mail-bulk"></i> <span class="align-middle">Published Newsletter List</span>
            </a>
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/newsletter/recipient') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/newsletter/recipient') }}">
              <i class="fas fa-clipboard-list"></i> <span class="align-middle">Newsletter Recipient List</span>
            </a>
                    </li>

                    <li class="sidebar-header">
                        User Management
                    </li>


                    <li class="sidebar-item <?= (Request::path() == 'admin/user-management') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/user-management') }}">
              <i class="fas fa-users-cog"></i> <span class="align-middle">User Management</span>
            </a>
                    </li>


                    <li class="sidebar-item <?= (Request::path() == 'admin/change-password') ? 'active' : ''; ?>">
                        <a class="sidebar-link" href="{{ url('admin/change-password') }}">
              <i class="fas fa-key"></i> <span class="align-middle">Change Password</span>
            </a>
                    </li>

                    <li class="sidebar-item <?= (Request::path() == 'admin/system-log') ? 'active' : ''; ?>">
                        <a href="{{ url('admin/system-log') }}" class="sidebar-link">
                        <i class="fas fa-shield-alt"></i> <span class="align-middle">System Log</span>
                    </a>
                </li>

                    <li class="sidebar-item mb-5">
                        <a class="sidebar-link" href="{{ url('admin/logout') }}">
              <i class="fas fa-sign-out-alt"></i> <span class="align-middle">Logout</span>
            </a>
                    </li>

            </div>
        </nav>

        <div class="main">

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            </svg>
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex position-fixed m-5 w-50" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            {{ session('error') }}
            </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex position-fixed m-5 w-50" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            {{ session('success') }}
            </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <main class="content">
                @yield('content')
            </main>

        </div>
    </div>
    @endif
    @yield('script')
    <script src="{{ url('assets/js/adminkit.js') }}"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl)
            })
    </script>
    </body>
</html>