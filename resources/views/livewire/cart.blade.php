<div class="container mt-2">
    <div class="row mb-2 mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; ?>
                        @forelse ($order_details as $order_detail)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>
                                    <img class="img-fluid"
                                        src="{{ url('assets/jersey') }}/{{ $order_detail->product->img }}"
                                        width="200" alt="{{ $order_detail->product->name }}">
                                </td>
                                <td>
                                    {{ $order_detail->product->name }}
                                </td>
                                <td>
                                    {{ $order_detail->order_quantity }}
                                </td>
                                <td>
                                    Rp {{ number_format($order_detail->product->price) }}
                                </td>
                                <td><strong>
                                        Rp {{ number_format($order_detail->total_price) }}
                                </td></strong>
                                <td>
                                    <i wire:click="destroy({{ $order_detail->id }})"
                                        class="fas fa-trash text-danger"></i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Keranjang Kosong</td>
                            </tr>
                        @endforelse

                        @if (!empty($order))
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga : </strong></td>
                                <td align="left"><strong>
                                        Rp {{ number_format($order->total_price) }}
                                </td></strong>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik : </strong></td>
                                <td align="left"><strong>
                                        Rp {{ number_format($order->unique_code) }}
                                </td></strong>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Total yang harus dibayar : </strong></td>
                                <td align="left"><strong>
                                        Rp {{ number_format($order->total_price + $order->unique_code) }}
                                </td></strong>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td colspan="3">
                                    <a href="{{ route('checkout') }}" class="btn btn-success btn-block radius-10">
                                        <i class="fas fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
