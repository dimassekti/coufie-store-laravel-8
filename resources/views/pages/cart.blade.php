@extends('layouts.app')

@section('title')
  Store Cart Page
@endsection

@section('content')
  <!-- Page Content -->

  <div class="page-content page-cart">
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!--  -->
    <section class="store-cart">
      <div class="container">
        <div
          class="row"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="col-12 table-responsive">
            <table class="table table-borderless table-cart">
              <thead>
                <tr>
                  <td>Image</td>
                  <td>Name &amp; Seller</td>
                  <td>Price</td>
                  <td>Menu</td>
                </tr>
              </thead>
              <!--  -->
              <tbody>
                @php $totalPrice = 0 @endphp
                @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 20%">
                      @if ($cart->product->galleries)
                        <img
                          src="{{ Storage::url($cart->product->galleries->first()->photos ?? '') }}"
                          alt=""
                          class="cart-images w-75"
                        />
                      @endif
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">oleh {{ $cart->product->user->store_name }}</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">${{ $cart->product->price }}</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%">
                      <form
                        action="{{ route('cart-delete', $cart->id) }}"
                        method="POST"
                      >
                        @method('DELETE')
                        @csrf
                        <button
                          type="submit"
                          class="btn btn-remove-cart"
                        >remove</button>
                      </form>
                    </td>
                  </tr>
                  @php
                    $totalPrice += $cart->product->price;
                  @endphp
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <!--  -->
        <div
          class="row"
          data-aos="fade-up"
          data-aos-delay="150"
        >
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Shipping Details</h2>
          </div>
        </div>
        <!--  -->
        <form
          id="locations"
          action="{{ route('checkout') }}"
          enctype="multipart/form-data"
          method="POST"
        >
          @csrf
          <input
            type="hidden"
            name="total_price"
            value="{{ $totalPrice }}"
          >

          <div
            class="row mb-2"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Address 1</label>
                <input
                  id="address_one"
                  type="text"
                  class="form-control"
                  name="address_one"
                  value="Kembangan Street"
                />
              </div>
            </div>
            <!--  -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Address 2</label>
                <input
                  id="address_two"
                  type="text"
                  class="form-control"
                  name="address_two"
                  value="No 112"
                />
              </div>
            </div>
            <!--  -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Province</label>
                <select
                  v-if="provinces"
                  id="provinces_id"
                  v-model="provinces_id"
                  name="provinces_id"
                  class="form-control"
                >
                  <option
                    v-for="province in provinces"
                    :value="province.id"
                  >@{{ province.name }}
                  </option>
                </select>
                <select
                  v-else
                  id=""
                  class="form-control"
                ></select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">City</label>
                <select
                  v-if="regencies"
                  id="regencies_id"
                  v-model="regencies_id"
                  name="regencies_id"
                  class="form-control"
                >
                  <option
                    v-for="regency in regencies"
                    :value="regency.id"
                  >@{{ regency.name }}
                  </option>
                </select>
                <select
                  v-else
                  class="form-control"
                ></select>
              </div>
            </div>
            <!--  -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Postal Code</label>
                <input
                  id="zip_code"
                  type="text"
                  class="form-control"
                  name="zip_code"
                  value="11111"
                />
              </div>
            </div>
            <!--  -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <input
                  id="country"
                  type="text"
                  class="form-control"
                  name="country"
                  value="Indonesia"
                />
              </div>
            </div>
            <!--  -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Mobile</label>
                <input
                  id="phone_number"
                  type="text"
                  class="form-control"
                  name="phone_number"
                  value="+628 2022 00000"
                />
              </div>
            </div>
          </div>
          <!--  -->
          <div
            class="row"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Payment Information</h2>
            </div>
          </div>
          <!--  -->
          <div
            class="row"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="col-4 col-md-2">
              <div class="product-title">$10</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">$100</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">$500</div>
              <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">${{ number_format($totalPrice ?? 0) }}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-4">
              <button
                type="submit"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Checkout Now
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script
    src="/js/app.js"
    type="text/javascript"
  ></script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        AOS.init();
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
        }
      }
    });
  </script>
@endpush
