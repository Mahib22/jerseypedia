<div class="container">
    <div class="row mb-2 mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card product-img">
                <div class="card-body"><img class="img-fluid" src="{{ url('assets/jersey') }}/{{ $product->img }}" alt="{{ $product->name }}"></div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $product->name }}</strong>
            </h2>
            <h4>
                @if ($product->is_ready == 1)
                    <span class="badge bg-success text-white"><i class="fas fa-check"></i> Ready Stock</span>
                @else
                    <span class="badge bg-danger text-white"><i class="fas fa-times"></i> Stock Habis</span>
                @endif
            </h4>
            <h3>Rp {{ number_format($product->price) }}</h3>
            <h4>Berat : {{ $product->weight }}</h4>
            <h4>Deskripsi Produk :</h4>
            <h5>{{ $product->description }}</h5>
            <hr>
            <form wire:submit.prevent="addToCart">
                <div class="input-group mb-3">
                    <span class="input-group-text">Jumlah Pesanan</span>
                    <input type="number" class="form-control @error('order_quantity') is-invalid @enderror" wire:model="order_quantity" required>
                    @error('order_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</div>
