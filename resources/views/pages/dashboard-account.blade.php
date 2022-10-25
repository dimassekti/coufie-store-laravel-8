@extends('layouts.dashboard')

@section('title')
    Account Setting
@endsection


@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Account Settings</h2>
                <p class="dashboard-subtitle">
                    Make store that profitable
                </p>
            </div>
            <!--  -->
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Your
                                                    Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="Dimas Sekti" />
                                            </div>
                                        </div>

                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Your
                                                    Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="tes@gmail.com" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addresOne">Address
                                                    1</label>
                                                <input type="text" class="form-control" id="addressOne" name="addressOne"
                                                    value="Kembangan Street" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addresTwo">Address
                                                    2</label>
                                                <input type="text" class="form-control" id="addresTwo" name="addresTwo"
                                                    value="No 112" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <select name="province" id="provence" class="form-control">
                                                    <option value="Jakarta">
                                                        Jakarta
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select name="city" id="city" class="form-control">
                                                    <option value="West Jakarta">
                                                        West
                                                        Jakarta
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postalCode">Postal
                                                    Code</label>
                                                <input type="text" class="form-control" id="postalCode" name="postalCode"
                                                    value="11111" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    value="Indonesia" />
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="postalCode">Mobile</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    value="+628 2022 00000" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
