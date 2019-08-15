@extends('layouts.orangebee')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-info">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-info">{{ Session::get('error') }}</div>
@endif
<div class="row">
    <div class="col-sm-12">
        <div class="owl_sale_wrapper">
            @foreach ($products as $product)
                <div class="single_featured">
                    <div class="single_featured_img">
                        <a href="shop.html">
                            <img style="height: 350px; width: 300px;" class="primary_image" src="{{ asset(config('product.image_path') . $product->image) }}" alt="sale">
                    </div>
                    <div class="actions">
                        <div class="action_button">
                            <ul>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Add to cart" class="add_to_cart btn btn-danger my-cart-btn" data-product-id="{{ $product->id }}" role="button">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li><a href="#" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Favorite"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Compair"><i class="fa fa-refresh"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single_featured_label row_{{ $product->id }}">
                        <a href="{{ route('product.show', $product->id)}}"><h2>{{ $product->name }}</h2></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                        <h3>{{ __('products.pro_currency') }}{{ $product->price }}</h3>
                    </div>
                </div>
            @endforeach
            <div class="pull-right">{{ $products->links() }}</div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/add_to_cart.js') }}"></script>
@endsection
