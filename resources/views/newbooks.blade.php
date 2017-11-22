@extends('layouts.master')
@section('content')
    <!-- <section> -->
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>{{ trans('index.Category') }}</h2>
                <div class="panel-group category-products" id="accordian">
                    <!--category-productsr-->
                    @foreach($category as $row)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">{{$row->name}}</a></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--/category-products-->
                <div class="brands_products">
                    <!--brands_products-->
                    <h2>{{ trans('index.publisher') }}</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($publisher as $row)
                                <li><a href="#">{{$row->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--/brands_products-->
                <div class="price-range">
                    <!--price-range-->
                    <h2>{{ trans('index.PriceRange') }}</h2>
                    <div class="well text-center">
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                        <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div>
                <!--/price-range-->
            </div>
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <!--features_items-->
                <h2 class="title text-center">{{ trans('index.new_items') }}</h2>
                @foreach($new_book as $row)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $row->getImagePathAttribute() }}" alt=""/>
                                    <h2>{{ $row->price }}</h2>
                                    <p>{{ $row->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ trans('index.add_to_cart') }}</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ $row->price }}</h2>
                                        <p>{{ $row->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ trans('index.add_to_cart') }}</a>
                                    </div>
                                </div>
                                <img src="{{ config('index.link.image_book_new') }}" class="new" alt="" />
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('index.add_to_wishlist') }}</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('index.add_to_compare') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- </div> -->
<!-- </section> -->
@endsection
