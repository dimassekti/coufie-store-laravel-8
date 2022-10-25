@extends('layouts.app')

@section('title')
Store Category Page
@endsection


@section('content')
<div class="page-content page-home">
    <!-- Section Carousel -->
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">

                </div>
            </div>
        </div>
    </section>
    <!-- Section trend categories -->
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementCategory = 0
                @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{$incrementCategory += 100}}">
                    <a href="{{route('categories-detail', $category->slug)}}"
                        class="component-categories d-block h-100">
                        <div class="gadgets-image">
                            <img src="{{Storage::url($category->photo)}}" class="w-100 h-100">
                        </div>
                        <p class="categories-text">
                            {{$category -> name}}
                        </p>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    Categories not Found
                </div>
                @endforelse
            </div>
    </section>
    <!-- Section new products -->
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>New Products</h5>
                </div>
            </div>

            <div class="row">
                @php
                $incrementProduct = 0
                @endphp
                @forelse ($products as $product)
                <div class="col-6 col-md4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{route('detail', $product->slug)}}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                            
                                            @if($product->galleries->count())
                                                background-image: url('{{ Storage::url($product->galleries->first()->photos)}}')
                                            @else
                                                background-color: #eee
                                            @endif
                                            
                                            ">

                            </div>
                        </div>
                        <div class="products-text">
                            {{$product->name}}
                        </div>
                        <div class="products-price">
                            {{$product->price}}
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    Products not Found
                </div>
                @endforelse


            </div>
        </div>
    </section>
</div>
@endsection