<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blog Sederhana</title>
    <style>
        :root{--accent:#0ea5a4;--muted:#6b7280;--card:#ffffff}
        *{box-sizing:border-box}
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;line-height:1.6;margin:0;background:#f3f4f6;color:#111}
        .wrap{max-width:1000px;margin:36px auto;padding:0 16px}
        header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px}
        header h1{margin:0;font-size:1.5rem;color:var(--accent)}
        nav a{color:var(--muted);text-decoration:none;margin-left:12px;font-size:.95rem}
        .grid{display:grid;grid-template-columns:1fr 300px;gap:20px}
        @media (max-width:800px){.grid{grid-template-columns:1fr}}
        .card{background:var(--card);padding:16px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,.06)}
        .post{display:flex;flex-direction:column;gap:10px;padding:14px;border-radius:8px}
        .post h2{margin:0;font-size:1.15rem}
        .meta{font-size:.85rem;color:var(--muted)}
        .excerpt{color:#374151}
        .read-more{display:inline-block;margin-top:8px;color:var(--accent);text-decoration:none;font-weight:600}
        .sidebar-section{margin-bottom:16px}
        footer{margin-top:28px;padding:18px 0;text-align:center;color:var(--muted);font-size:.9rem}
        .search input{width:100%;padding:8px;border-radius:6px;border:1px solid #e5e7eb}
        .tags{display:flex;flex-wrap:wrap;gap:8px}
        .tag{background:#eef2f2;padding:6px 10px;border-radius:999px;color:#064e4e;font-size:.85rem;text-decoration:none}
    </style>
</head>
<body>
    <div class="wrap">
        <header>
            <h1>Blog</h1>
            <nav>
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/about') }}">Tentang</a>
                <a href="{{ url('/contact') }}">Kontak</a>
            </nav>
        </header>

        <div class="grid">
            <!-- main content -->
            <main>
                <div class="card">
                    <div style="margin-bottom:12px">
                        <h2 style="margin:0">Artikel Terbaru</h2>
                        <p class="meta">Kumpulan tulisan terbaru dan catatan</p>
                    </div>

                    @if(isset($posts) && $posts->count())
                        @foreach($posts as $post)
                            <article class="post" style="border:1px solid #eef2f2">
                                <div>
                                    <h2><a href="{{ url('/posts/'.$post->id) }}" style="color:inherit;text-decoration:none">{{ $post->title }}</a></h2>
                                    <div class="meta">oleh {{ $post->author->name ?? 'Penulis' }} • {{ optional($post->created_at)->format('d M Y') }}</div>
                                </div>
                                <p class="excerpt">{{ Str::limit(strip_tags($post->excerpt ?? $post->body ?? ''), 180) }}</p>
                                <a class="read-more" href="{{ url('/posts/'.$post->id) }}">Baca selengkapnya →</a>
                            </article>
                        @endforeach

                        {{ $posts->links ?? '' }}
                    @else
                        <p class="meta">Belum ada posting. Coba buat posting baru.</p>
                    @endif
                </div>
            </main>

            <!-- sidebar -->
            <aside>
                <div class="card sidebar-section">
                    <h3 style="margin:0 0 8px 0">Cari</h3>
                    <form class="search" action="{{ url('/search') }}" method="GET">
                        <input type="text" name="q" placeholder="Cari artikel..." value="{{ request('q') }}">
                    </form>
                </div>

                <div class="card sidebar-section">
                    <h3 style="margin:0 0 8px 0">Kategori</h3>
                    <ul style="list-style:none;padding:0;margin:0">
                        @foreach($categories ?? [] as $category)
                            <li style="margin-bottom:8px">
                                <a href="{{ url('/category/'.$category->slug) }}" style="text-decoration:none;color:inherit">{{ $category->name }} ({{ $category->posts_count ?? 0 }})</a>
                            </li>
                        @endforeach
                        @unless(isset($categories) && count($categories))
                            <li class="meta">Tidak ada kategori</li>
                        @endunless
                    </ul>
                </div>

                <div class="card sidebar-section">
                    <h3 style="margin:0 0 8px 0">Tag populer</h3>
                    <div class="tags">
                        @foreach($tags ?? [] as $tag)
                            <a class="tag" href="{{ url('/tag/'.$tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                        @unless(isset($tags) && count($tags))
                            <div class="meta">Belum ada tag</div>
                        @endunless
                    </div>
                </div>
            </aside>
        </div>

        <footer>
            &copy; {{ date('Y') }} — Simple Blog. Dibuat dengan Laravel.
        </footer>
    </div>
</body>
</html>
