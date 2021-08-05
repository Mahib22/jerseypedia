<div class="container">
    
    {{-- BANNER --}}
    <div class="banner">
        <img src="{{ url('assets/slider/slider.jpg') }}" alt="banner">
    </div>

    {{-- League Card --}}
    <section class="league-card mt-4">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row mt-4">
            @foreach ($leagues as $league)
            <div class="col-md-3 mb-2">
                <a href="{{ route('products.league', $league->id) }}">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <img class="img-fluid" src="{{ url('assets/league') }}/{{ $league->img }}" alt="{{ $league->name }}">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Best Product --}}
    <section class="best-products mt-5">
        <h3>
            <strong>Produk Terbaru</strong>
        </h3>
        <div class="row mt-4">
            @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ url('assets/jersey') }}/{{ $product->img }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('products.detail', $product->id) }}" class="stretched-link text-decoration-none text-dark"><strong>{{ $product->name }}</strong></a></h5>
                        <h5 class="card-text">Rp {{ number_format($product->price) }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
