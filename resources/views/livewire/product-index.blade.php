<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h1>List Jersey</h1>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <input wire:model="search" type="text" class="form-control" placeholder="Search ..." aria-label="Search ..." aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
    </div>

    <section class="products">
        <div class="row mt-4">
            @foreach ($products as $product)
            <div class="col-md-3 mb-3">
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
        
        <div class="row">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</div>
