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
                <div class="alert alert-success">
                    {{ session('message') }}
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
            <h3>Rp {{ number_format($product->price) }}</h3>

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
                    <p>Kondisi : Baru</p>
                    <p>Berat : {{ $product->weight }}</p>
                    <p>Kategori : Jersey Bola Pria</p>
                    <p>Jersey Liga : La Liga</p>
                    <p>Size tersedia : M, L, XL</p>
                    <p>Stok tersedia : 10</p>
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
                            <label for="size" class="form-label">Pilih Ukuran</label>
                            <select class="form-control" id="size">
                                <option value="1">M</option>
                                <option value="2">L</option>
                                <option value="3">XL</option>
                            </select>
                        </div>
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
                        <div class="mb-3">
                            <label for="note" class="form-label">Tambah Catatan</label>
                            <input type="text" class="form-control" placeholder="Contoh: Size M alternate L"
                                id="note">
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
                    <button class="btn btn-outline-secondary btn-block mt-2"><i class="fas fa-share-alt mr-2"></i>
                        Bagikan Link</button>
                </div>
            </div>
        </div>
    </div>
</div>
