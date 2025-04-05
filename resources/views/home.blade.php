<x-app-layout>
    <section class="d-flex flex-column justify-content-center align-items-center text-center mt-5 py-5 px-4">
        <img src="{{ asset('assets/img/wallpaper.jpg') }}" alt="thumb" class="w-100" style="height: 370px; object-fit:cover;">
        <h1 class="mt-4 fs-2 fw-bold">Selamat Datang di Perpustakaan Online!</h1>
        <form action="{{ route('search') }}" method="GET" class="position-relative d-flex w-100 my-4" style="max-width: 630px">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari buku..." aria-label="Cari buku..." aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <svg class="text-white" fill="currentColor" x="0px" y="0px" width="18"
                        height="18" viewBox="0 0 18 18">
                        <path
                            d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 19.585938 21.585938 C 20.137937 22.137937 21.033938 22.137938 21.585938 21.585938 C 22.137938 21.033938 22.137938 20.137938 21.585938 19.585938 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z">
                        </path>
                    </svg>
                </button>
            </div>
        </form>
    </section>

    <section class="py-5 bg-body-tertiary card container border-0 shadow mb-4">

        <div class="container">
            <h2 class="fs-4 fw-bold ms-4 mb-4 text-center">Paling Populer</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-6 g-3">
                @foreach ($popularBooks as $popularBook)
                <a href="{{ route('preview', $popularBook) }}" class="col text-dark text-decoration-none">
                    <div class="card shadow border-0 h-100">
                        <img src="{{ isset($popularBook->cover) ? asset('storage/' . $popularBook->cover) : asset('storage/placeholder.png') }}"
                            alt="{{ $popularBook->title }}" class="card-img-top">
                        <div class="card-body">
                            <h4 class="fw-light mb-1" style="font-size: 14px;">{{ $popularBook->writer }}</h4>
                            <h3 class="card-text fw-semibold mb-4" style="font-size: 14px;">{{ $popularBook->title }}</h3>
                            <span class="position-absolute" style="bottom: 10px; font-size: 14px">Dipinjam
                                <span
                                    class="fw-bold text-decoration-underline">{{ $popularBook->borrows_count }}</span>
                                kali</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 card container border-0 shadow mb-4">
        <h2 class="fs-4 fw-bold ms-4 mb-4 text-center">Terbaru</h2>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-3">
                @foreach ($newestBooks as $newestBook)
                <a href="{{ route('preview', $newestBook) }}" class="col text-dark text-decoration-none">
                    <div class="card shadow border-0 h-100">
                        <img src="{{ isset($newestBook->cover) ? asset('storage/' . $newestBook->cover) : asset('storage/placeholder.png') }}"
                            alt="{{ $newestBook->title }}" class="card-img-top">
                        <div class="card-body">
                            <h4 class="fw-light mb-1" style="font-size: 14px;">{{ $newestBook->writer }}</h4>
                            <h3 class="card-text fw-bold mb-4" style="font-size: 14px;">{{ $newestBook->title }}</h3>
                            <span style="font-size: 14px;">Terbit
                                <span
                                    class="fw-bold text-decoration-underline">{{ $newestBook->created_at->locale('id_ID')->diffForHumans() }}</span>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 card container border-0 shadow mb-4">
        <h2 class="fs-4 fw-bold ms-4 mb-4 text-center">Semua</h2>

        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-6 g-3">
                @foreach ($allBooks as $allBook)
                <a href="{{ route('preview', $newestBook) }}" class="col text-dark text-decoration-none">
                    <div class="card shadow border-0 h-100">
                        <img src="{{ isset($allBook->cover) ? asset('storage/' . $allBook->cover) : asset('storage/placeholder.png') }}"
                            alt="{{ $allBook->title }}" class="card-img-top">
                        <div class="card-body">
                            <h4 class="fw-light mb-1" style="font-size: 14px;">{{ $newestBook->writer }}</h4>
                            <h3 class="card-text fw-bold mb-1" style="font-size: 14px;">{{ $allBook->title }}</h3>
                            <span style="font-size: 14px;">Terbit
                                <span
                                    class="fw-bold text-decoration-underline">{{ $allBook->created_at->locale('id_ID')->diffForHumans() }}</span>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>