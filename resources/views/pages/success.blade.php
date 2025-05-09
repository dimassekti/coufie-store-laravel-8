@extends('layouts.success')

@section('title')
Store Success Page
@endsection


@section('content')
<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="/images/success.svg" alt="" class="mb-4" />
                    <h2>Transaction Processed!</h2>
                    <p>
                        Silahkan tunggu konfirmasi email dari kami dan kami akan
                        menginformasikan resi secept mungkin!
                    </p>
                    <div>
                        <a href="/dashboard.html" class="btn btn-success w-50 mt-4">
                            My Dashboard
                        </a>
                        <a href="/dashboard.html" class="btn btn-signup w-50 mt-4">
                            Go to Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var gallery = new Vue({
            el: "#gallery",
            mounted() {
              AOS.init();
            },
            data: {
              activePhoto: 0,
              photos: [
                {
                  id: 1,
                  url: "/images/product-detail-1.png",
                },
                {
                  id: 2,
                  url: "/images/product-detail-2.png",
                },
                {
                  id: 3,
                  url: "/images/product-detail-3.png",
                },
                {
                  id: 4,
                  url: "/images/product-detail-4.png",
                },
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