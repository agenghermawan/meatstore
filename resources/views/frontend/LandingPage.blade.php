@extends('frontend.include.app')
@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                                <li data-target="#storeCarousel" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontend/images/bg4.jpg') }}" height="600px"
                                        style="border-radius: 20px" class="d-block w-100 " alt="Carousel Image" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/bg2.jpg') }}" class="d-block w-100 "
                                        style="border-radius: 20px" height="600px" alt="Carousel Image" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/bg5.jpg') }}" class="d-block w-100 "
                                        style="border-radius: 20px" height="600px" alt="Carousel Image" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/images/bg3.jpg') }}" class="d-block w-100 "
                                        style="border-radius: 20px" height="600px" alt="Carousel Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h5 class="text-center"> Categories</h5>
                        <img src="{{ asset('frontend/images/dagingbg.png') }}" alt="">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <a class="component-categories d-block" href="{{ route('ctigasapi') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/dagingigasapi.jpg') }}" alt="Gadgets Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging Iga Sapi
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <a class="component-categories d-block" href="{{ route('ctayam') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/dagingayam.jpg') }}" alt="Furniture Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging Ayam
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <a class="component-categories d-block" href="{{ route('cthas') }}">
                            <div class="categories-image">
                                <img src="{{ asset('frontend/images/daginghas2.jpg') }}" alt="Makeup Categories"
                                    class="w-100" height="217px" />
                            </div>
                            <p class="categories-text">
                                Daging has
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h5 class="text-center"> Suggest Product</h5>
                        <img src="{{ asset('frontend/images/dagingbg.png') }}" alt="">
                    </div>
                </div>
                <div class="row mt-4 ">
                    @php $incrementProduct = 0 @endphp

                    @foreach ($suggestproduct as $item)
                        <div class="col-6 col-md-3 col-lg-4 pt-3" data-aos="fade-up"
                            data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a class=" d-block" href="{{ route('detail', $item->id) }}">
                                <p class="categories-text ">
                                    <h4 class="text-center"> {{ $item->ProductName }} </h4>
                                </p>
                                <div class="categories-image">
                                    <img src="{{ Storage::url($item->galleries->first()->Photos) }}"
                                        alt="Gadgets Categories" class="w-100" height="217px" />
                                </div>
                                <p class="categories-text ">
                                    <h6 class="text-center"> {{ $item->Categories }} </h6>
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="store-new-products mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h5 class="text-center">New Product </h5>
                        <img src="{{ asset('frontend/images/daging3.png') }}" width="80px" height="57px" alt="">
                    </div>
                </div>
                <div class="row mt-5">
                    @php $incrementProduct = 0 @endphp
                    @foreach ($data as $item)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-right"
                            data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a class="component-products d-block" href="{{ route('detail', $item->id) }}">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="background-image: url('{{ Storage::url($item->galleries->first()->Photos) }}');">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ $item->ProductName }}
                                </div>
                                <div class="products-price">
                                    {{ $item->Price }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
