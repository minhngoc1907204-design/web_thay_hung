@extends('layout/home')
@section('body')
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>All Category</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<div class="container my-4">
    <div class="row">
        @forelse($products as $object)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $object->image }}" class="card-img-top img-fluid" style="height: 220px; object-fit: cover;"alt="{{ $object->name }}">

                <div class="card-body d-flex flex-column">

                    <h5 class="card-title text-center fw-bold">{{ $object->name }}</h5>

                    <p class="card-text text-muted small text-center">{{ Str::limit($object->description, 80) }}</p>

                    <p class="text-center mb-3">
                        <span class="badge border border-success text-success px-3 py-2">
                            Còn {{ $object->stock }} sản phẩm
                        </span>
                        <span class="badge border border-success text-success px-3 py-2">
                            {{ number_format($object->price) }} VNĐ
                        </span>
                    </p>

                    <div class="mt-auto text-center">
                        <a href="{{ route('single_product',['category'=>$object->id]) }}" class="btn btn-secondary px-3">
                            Deital Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
          Not data
        @endforelse
    </div>
</div>
@endsection