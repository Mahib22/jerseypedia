<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h1>{{ $title }}</h1>
        </div>
        <div class="col-md-3">
            <div class="input-group border-bottom">
                <input wire:model="search" type="text" class="form-control py-4 border-0" placeholder="Search ..."
                    aria-label="Search ..." aria-describedby="basic-addon1">
                <div class="input-group-postpend">
                    <span class="input-group-text bg-white p-3 border-0">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="products">
        <div class="row mt-4">
            @foreach ($products as $product)
                <div class="col-6 col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ url('assets/jersey') }}/{{ $product->img }}"
                            alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('products.detail', $product->slug) }}"
                                    class="stretched-link text-decoration-none text-dark"><strong>{{ $product->name }}</strong></a>
                            </h5>
                            <h5 class="card-text">Rp {{ number_format($product->price) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col">
                <ul class="pagination justify-content-end" role="navigation">
                    {{ $products->links() }}
                </ul>
            </div>
        </div>
    </section>
</div>
