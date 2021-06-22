@extends('backend.include.app')

@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                    Look what you have made today!
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                    15,209
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Revenue
                                </div>
                                <div class="dashboard-card-subtitle">
                                    $931,290
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transaction
                                </div>
                                <div class="dashboard-card-subtitle">
                                    22,409,399
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transactions</h5>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
