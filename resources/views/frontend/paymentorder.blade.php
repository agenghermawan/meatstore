@extends('frontend.include.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <!-- Page Content -->
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart" aria-describedby="Cart">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name &amp; Seller</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0 @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 20%;">
                                            @if ($cart->product->galleries)
                                                <img src="{{ Storage::url($cart->product->galleries->first()->Photos) }}"
                                                    alt="" class="cart-image" />
                                            @endif
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">{{ $cart->product->ProductName }}</div>
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">{{ number_format($cart->product->Price) }}</div>
                                            <div class="product-subtitle"></div>
                                        </td>
                                        <td style="width: 20%;">
                                            <form action="{{ route('cart.destroy', $cart->Products_id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-remove-cart" type="submit">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $totalPrice += $cart->product->Price @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Details</h2>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="name" value="{{ $name }}" />
                    <input type="hidden" class="form-control" name="email" value="{{ $email }} " />
                    <input type="hidden" class="form-control" name="address_one" value="{{ $address_one }} " />
                    <input type="hidden" class="form-control" name="address_two" value="{{ $address_two }} " />
                    <input type="hidden" class="form-control" name="province" value="{{ $province }} " />
                    <input type="hidden" class="form-control" name="city" value="{{ $city }} " />
                    <input type="hidden" class="form-control" name="zip_code" value="{{ $zip_code }} " />
                    <input type="hidden" class="form-control" name="phone" value="{{ $phone }} " />
                    <input type="hidden" class="form-control" name="total_price" value="{{ $totalPrice }} " />
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Name </label>
                                <h5> {{ $name }}
                                </h5>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <label for="address_one">Mail </label>
                                <h5> {{ $email }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <h5> {{ $address_one }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <h5> {{ $address_two }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <h5> {{ $province }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <h5> {{ $city }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <h5> {{ $zip_code }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <h5> {{ $phone }}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1">Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title"> <img src="{{ asset('frontend/images/ic_bank.png') }}" alt="">
                            </div>
                            <div class="product-subtitle">Transfer Bank</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title" style="height: 45px">993816235</div>
                            <div class="product-subtitle">BCA</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">$0</div>
                            <div class="product-subtitle">Quantity</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">{{ $totalPrice }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">
                                Alredy Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

{{-- @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                },
            }
        });

    </script>
@endpush --}}
