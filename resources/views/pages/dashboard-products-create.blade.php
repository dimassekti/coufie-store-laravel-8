@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection


@section('content')
    <!-- Section Content -->
    <div>
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Create Product</h2>
                <p class="dashboard-subtitle">Create Your Own Product</p>
            </div>
            <!--  -->
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" ]>
                                                <label> Product Name</label>
                                                <input type="text" class="form-control" name="name" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group" ]>
                                                <label> Price</label>
                                                <input type="number" class="form-control" name="price" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="categories_id" id="" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Description</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Thumbnails</label>
                                                <input type="file" name="photo" class="form-control" />
                                                <p class="text-muted">
                                                    Kamu dapat memilih lebih dari satu file
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        function thisFileUpload() {
            document.getElementById("file").click()
        }
    </script>
    <script>
        CKEDITOR.replace("editor");
    </script>
@endpush
