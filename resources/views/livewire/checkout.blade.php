<div class="container mt-2">
    <div class="row mb-2 mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('cart') }}" class="text-dark">Keranjang</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('cart') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan transfer di rekening dibawah ini sebesar : <strong>Rp {{ number_format($total_price) }}</strong></p>
            <div class="media">
                <img src="{{ url('assets/bri.png') }}" class="mr-3" alt="Logo BRI" width="60">
                <div class="media-body">
                  <h5 class="mt-0">BANK BRI</h5>
                  <p>No. Rekening <strong>012345-678-910</strong> atas nama <strong>Ucok</strong></p>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label for="phone_number">No. HP</label>
                    <input type="text" wire:model="phone_number" name="phone_number" id="phone_number" class="form-control @error('order_quantity') is-invalid @enderror" value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea wire:model="address" name="address" id="address" class="form-control @error('order_quantity') is-invalid @enderror" value="{{ old('address') }}" rows="3" required></textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-shopping-cart"></i> Check Out
                </button>
            </form>
        </div>
    </div>
</div>
