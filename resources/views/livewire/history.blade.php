<div class="container mt-2">
    <div class="row mb-2 mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">History</li>
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
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesanan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>
                            <td><strong>Total Harga</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>
                                    @php
                                        $order_details = \App\OrderDetail::where('order_id', $order->id)->get();
                                    @endphp
                                    @foreach ($order_details as $order_detail)
                                        <img class="img-fluid" src="{{ url('assets/jersey') }}/{{ $order_detail->product->img }}" width="50" alt="{{ $order_detail->product->name }}">
                                        {{ $order_detail->product->name }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($order->status == 1)
                                        Belum Lunas
                                    @else
                                        Lunas
                                    @endif
                                </td>
                                <td><strong>
                                    Rp {{ number_format($order->total_price) }}
                                </strong></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada history</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan transfer di rekening dibawah ini : </p>
                    <div class="media">
                        <img src="{{ url('assets/bri.png') }}" class="mr-3" alt="Logo BRI" width="60">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BRI</h5>
                            <p>No. Rekening <strong>012345-678-910</strong> atas nama <strong>Ucok</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
