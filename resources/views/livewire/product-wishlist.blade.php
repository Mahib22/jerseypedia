<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h1>Wishlist</h1>
        </div>
    </div>

    <section class="products">
        <div class="row mt-4">
            @foreach ($wishlists as $wishlist)
            <div class="col-6 col-md-3 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ url('assets/jersey') }}/{{ $wishlist->product->img }}" alt="{{ $wishlist->product->name }}">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('products.detail', $wishlist->product->id) }}" class="stretched-link text-decoration-none text-dark"><strong>{{ $wishlist->product->name }}</strong></a></h5>
                        <h5 class="card-text">Rp {{ number_format($wishlist->product->price) }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </section>
</div>
