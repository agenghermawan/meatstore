@extends('frontend.include.app')

@section('content')
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Product Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-gallery" id="item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="col-lg-8" data-aos="zoom-in">
                            <transition name="slide-fade" mode="out-in">
                                <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="main-image"
                                    width="730px" height="467px" alt="" />
                            </transition>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                                data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image"
                                        :class="{ active: index == activePhoto }" alt="" width="160px" height="103px" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>{{ $data->ProductName }}</h1>
                            <div class="owner">{{ $data->Categories }}</div>
                            <div class="price">{{ $data->Price }}</div>
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            @auth
                                <form action="{{ route('detail-add', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                        Add to Cart
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                                    Sign in to Add
                                </a>
                            @endguest

                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <p>
                                {{ $data->Description }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5>Customer Review (3)</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/icon-testimonial-1.png" class="mr-3 rounded-circle" alt="" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Hazza Risky</h5>
                                        I thought it was not good for living room. I really happy
                                        to decided buy this product last week now feels like
                                        homey.
                                    </div>
                                </li>
                                <li class="media my-4">
                                    <img src="/images/icon-testimonial-2.png" class="mr-3 rounded-circle" alt="" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                                        Color is great with the minimalist concept. Even I thought
                                        it was made by Cactus industry. I do really satisfied with
                                        this.
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="/images/icon-testimonial-3.png" class="mr-3 rounded-circle" alt="" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                                        When I saw at first, it was really awesome to have with.
                                        Just let me know if there is another upcoming product like
                                        this.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('frontend/vendor/vue/vue.js') }}"></script>
    <script>
        var item = new Vue({
            el: "#item",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($data->galleries as $gallery)
                        {
                        id: {{ $gallery->id }},
                        url: "{{ Storage::url($gallery->Photos) }}",
                        },
                    @endforeach
                ],
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                },
            },
        });

    </script>

@endpush
