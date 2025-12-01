<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blog Sederhana</title>
    <style>
        :root {
            --accent: #0ea5a4;
            --muted: #6b7280;
            --card: #ffffff
        }

        * {
            box-sizing: border-box
        }

        body {
            font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial;
            line-height: 1.6;
            margin: 0;
            background: #f3f4f6;
            color: #111
        }

        .wrap {
            max-width: 1000px;
            margin: 36px auto;
            padding: 0 16px
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--accent)
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            margin-left: 12px;
            font-size: .95rem
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 20px
        }

        @media (max-width:800px) {
            .grid {
                grid-template-columns: 1fr
            }
        }

        .card {
            background: var(--card);
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .06)
        }

        .post {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 14px;
            border-radius: 8px
        }

        .post h2 {
            margin: 0;
            font-size: 1.15rem
        }

        .meta {
            font-size: .85rem;
            color: var(--muted)
        }

        .excerpt {
            color: #374151
        }

        .read-more {
            display: inline-block;
            margin-top: 8px;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600
        }

        .sidebar-section {
            margin-bottom: 16px
        }

        footer {
            margin-top: 28px;
            padding: 18px 0;
            text-align: center;
            color: var(--muted);
            font-size: .9rem
        }

        .search input {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #e5e7eb
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .tag {
            background: #eef2f2;
            padding: 6px 10px;
            border-radius: 999px;
            color: #064e4e;
            font-size: .85rem;
            text-decoration: none
        }
    </style>
</head>

<body>
    <div class="wrap">
        <header>
            <h1>Blog</h1>
            <nav>
                <a href="{{ url('/blog') }}">Beranda</a>
                <a href="{{ url('/blog/tentang') }}">Tentang</a>
                <a href="{{ url('/blog/contact') }}">Kontak</a>
            </nav>
        </header>
        <h3>@yield('judul_halaman')</h3>
        @yield('konten')
        <footer>
            &copy; {{ date('Y') }} — Simple Blog. Dibuat dengan Laravel.
        </footer>
    </div>
</body>

</html>
