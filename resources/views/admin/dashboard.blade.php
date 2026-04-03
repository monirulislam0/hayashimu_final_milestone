@section('title')
    {{ config('app.name') }} | Dashboard
@endsection
<x-admin-layout>
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row">
                <!-- Website Analytics Starts-->
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Dashboard</h4>
                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                        </div>
                        <div class="card-content">
                            <div class="card-body pb-1">
                                <div class="d-flex justify-content-around align-items-center flex-wrap">
                                    <div class="user-analytics">
                                        <i class="bx bx-user mr-25 align-middle"></i>
                                        <span class="align-middle text-muted">Total Products</span>
                                        <div class="d-flex">
                                            <div id="radial-success-chart"></div>
                                            <h3 class="mt-1 ml-50">{{ $total_products }}</h3>
                                        </div>
                                    </div>
                                    <div class="sessions-analytics">
                                        <i class="bx bx-trending-up align-middle mr-25"></i>
                                        <span class="align-middle text-muted">Total Category</span>
                                        <div class="d-flex">
                                            <div id="radial-warning-chart"></div>
                                            <h3 class="mt-1 ml-50">{{ $total_category }}</h3>
                                        </div>
                                    </div>
                                    <div class="bounce-rate-analytics">
                                        <i class="bx bx-pie-chart-alt align-middle mr-25"></i>
                                        <span class="align-middle text-muted">Total Order</span>
                                        <div class="d-flex">
                                            <div id="radial-danger-chart"></div>
                                            <h3 class="mt-1 ml-50">{{ $total_order }}</h3>
                                        </div>
                                    </div>
                                    <div class="user-analytics">
                                        <i class="bx bx-user mr-25 align-middle"></i>
                                        <span class="align-middle text-muted">Total Sell</span>
                                        <div class="d-flex">
                                            <div id="radial-success-chart"></div>
                                            <h3 class="mt-1 ml-50">{{ $total_sell }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div id="analytics-bar-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
