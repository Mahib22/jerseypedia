<div class="container mb-3">
    <div class="row mb-2 mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card product-img">
                <div class="card-body">
                    <img class="img-fluid" src="{{ url('assets/jersey') }}/{{ $product->img }}"
                        alt="{{ $product->name }}">
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-3">
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
            <h2>Rp {{ number_format($product->price) }}</h2>

            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                        type="button" role="tab" aria-controls="info" aria-selected="true">Info Produk</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                        type="button" role="tab" aria-controls="desc" aria-selected="false">Deskripsi</button>
                </li>
            </ul>
            <div class="tab-content mt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <h5>Kondisi : <span class="text-secondary">Baru</span></h5>
                    <h5>Berat : <span class="text-secondary">{{ $product->weight }} kg</span></h5>
                    <h5>Kategori : <a href="{{ route('products.league', $product->league->slug) }}"
                            class="text-decoration-none">Jersey {{ $product->league->name }}</a></h5>
                </div>
                <div class="tab-pane fade" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    <h5>{{ $product->description }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="addToCart">
                        <div class="mb-3">
                            <label for="jumlahPesanan" class="form-label">Jumlah Pesanan</label>
                            <input id="jumlahPesanan" type="number"
                                class="form-control @error('order_quantity') is-invalid @enderror"
                                wire:model="order_quantity" required min="1">
                            @error('order_quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            @if ($product->is_ready !== 1) disabled @endif><i class="fas fa-plus mr-2"></i> Tambah ke
                            Keranjang</button>
                    </form>
                    <hr>
                    @auth
                        <form wire:submit.prevent="addToWishlist">
                            @if (Auth::user()->wishlists()->where('product_id', $product->id)->first())
                                <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-heart mr-2"></i>
                                    Hapus dari Wishlist</button>
                            @else
                                <button type="submit" class="btn btn-success btn-block"><i class="far fa-heart mr-2"></i>
                                    Tambah ke Wishlist</button>
                            @endif
                        </form>
                    @else
                        <form wire:submit.prevent="addToWishlist">
                            <button type="submit" class="btn btn-success btn-block"><i class="far fa-heart mr-2"></i>
                                Tambah ke Wishlist</button>
                        </form>
                    @endauth
                    <button type="button" class="btn btn-outline-secondary btn-block mt-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fas fa-share-alt mr-2"></i>
                        Bagikan Link</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Share Link -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title" id="exampleModalLabel">Bagikan link melalui</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times fs-25"></i>
                </button>
            </div>
            <div class="modal-body">
                {!! Share::page(url('/products/' . $product->slug), null, ['class' => 'fs-25 mx-2 p-5-10 rounded-10'], '<ul class="list-unstyled d-flex justify-content-center">', '</ul>')->facebook()->twitter()->whatsapp()->telegram() !!}
            </div>
        </div>
    </div>
</div>
