@extends("layouts.app")

@section("content")
    <div class="container my-5">

        @if(isset($products) && count($products) > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ url('/urun-detay/'.$product->id) }}" class="text-decoration-none">
                                <img src="{{ $product->image }}" alt="" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <p class="card-text">{{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection