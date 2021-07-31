<div class="container">
    
    {{-- BANNER --}}
    <div class="banner">
        <img src="{{ url('assets/slider/slider1.png') }}" alt="banner">
    </div>

    {{-- League Card --}}
    <section class="league-card mt-4">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row mt-4">
            @foreach ($leagues as $league)
            <div class="col-md-3">
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
            <strong>Produk Terlaris</strong>
            <a href="{{ route('products') }}" class="float-right"><i class="fas fa-chevron-right color-dark"></i></a>
        </h3>
        <div class="row mt-4">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img class="img-fluid" src="{{ url('assets/jersey') }}/{{ $product->img }}" alt="{{ $product->name }}">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $product->name }}</strong></h5>
                                <h5>Rp {{ number_format($product->price) }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-success btn-block">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
