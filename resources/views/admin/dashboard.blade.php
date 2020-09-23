@extends('layouts.admin')

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    
                                    <div class="col-12 pl-2">
                                        <h3 class="text-muted">اجمالي المبيعات</h3>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4>$9,980</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="btc-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-12 pl-2">
                                        <h3 class="text-muted">اجمالي المخرجات</h3>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4>944</h4>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="eth-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                 
                                    <div class="col-12 pl-2">
                                        <h4 class="text-muted">عدد المنتجات</h4>
                                    </div>
                                    <div class="col-12 text-right">
                                        <h4>500</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="xrp-chartjs" class="height-75"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Candlestick Multi Level Control Chart -->

            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">احدث الفواتير</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>العميل</th>
                                        <th>السعر</th>
                                        <th>حاله الطلب</th>
                                        <th>الاجمالي</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-success bg-lighten-5">
                                        <td>10500</td>
                                        <td>محمد خليل</td>
                                        <td>1500</td>
                                        <td>مكتمل</td>
                                        <td>5200</td>
                                    </tr>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
        </div>
    </div>
</div><!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
