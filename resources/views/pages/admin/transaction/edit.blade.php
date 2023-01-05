@extends('layouts.admin')

@section('title')
  IHC Transaction
@endsection

@section('content')
  <!-- Section Content -->
  <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">IHC Transaction</h2>
        <p class="dashboard-subtitle">Edit Transaction</p>
      </div>
      <!--  -->
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-12">

            {{-- Error Handling --}}
            {{-- $error merupakan bawaan dari laravel --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  {{-- all() disini akan mengambil segala jenis error yang terjadi, ini bisa di custom atau dipilih yang mau ditampilkan --}}
                  @foreach ($errors->all() as $error)
                    <li>
                      {{ $error }}
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="card">
              <div class="card-body">
                <form
                  action="{{ route('transaction.update', $item->id) }}"
                  method="post"
                  enctype="multipart/form-data"
                >
                  @method('PUT')
                  @csrf
                  {{-- Row 1 Form --}}
                  <div class="row">

                    {{--  Transaction --}}
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Transaction Status</label>
                        <select
                          name="transaction_status"
                          class="form-control"
                        >
                          <option value="{{ $item->transaction_status }}">{{ $item->transaction_status }}</option>
                          <option
                            value=""
                            disabled
                          >----------------</option>
                          <option value="PENDING">PENDING</option>
                          <option value="SHIPPING">SHIPPING</option>
                          <option value="SUCCESS">SUCCESS</option>
                        </select>
                      </div>
                    </div>
                    {{-- Form Harga Transaction --}}
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>
                          Total Price
                        </label>
                        <input
                          type="number"
                          name="total_price"
                          class="form-control"
                          value="{{ $item->total_price }}"
                          required
                        >
                      </div>
                    </div>

                  </div>
                  {{-- Row 2 Button --}}
                  <div class="row">
                    <div class="col text-right">
                      <button
                        type="submit"
                        class="btn btn-success px-5"
                      >
                        Save Now
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endpush
