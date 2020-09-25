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
                                        <h4>{{number_format(App\Models\Invoice::clientInvoices()->sum('price'),1)}} <span style="color:green">$</span></h4>
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
                                        <h4>{{number_format(App\Models\Invoice::supplierInvoices()->sum('price') + App\Models\Invoice::employeeInvoices()->sum('price'),1)}} <span style="color:green">$</span></h4>
                                      
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
                                        <h4>{{number_format(App\Models\Product::count(),1)}}  <i class="la la-tags" style="color:blue"></i></h4>
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
                            <h4 class="card-title"><a href="{{route('admin.invoices')}}">احدث الفواتير</a></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard table-responsive">
                                <table
                                    class="table table-de mb-0 display nowrap table-striped table-bordered">
                                    <thead class="">
                                    <tr>
                                        <th>الرقم</th>
                                        <th>التاريخ</th>
                                        <th>المبلغ</th>
                                        <th>العميل</th>
                                        <th>الفرع</th>
                                        <td>الحاله</td>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @isset($invoices)
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td><a href="{{route('admin.invoices.show',$invoice->id)}}">{{$invoice->id}}</a></td>
                                                <td>{{date($invoice->date)}}</td>
                                                <td>{{$invoice->price}} ج</td>
                                                
                                                <td>{{$invoice->client ? $invoice->client->name : ''}}</td>
                                                <td>{{$invoice->branch ? $invoice->branch->name : ''}}</td>
                                                <td>{{$invoice->status ? 'تم الدفع' : 'قيد التنفيذ'}}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                         aria-label="Basic example">
                                                        <a href="{{route('admin.invoices.edit',$invoice->id)}}"
                                                           class="btn btn-outline-primary box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-edit"></i></a>

                                                        <a href="{{route('admin.invoices.delete',$invoice->id)}}"
                                                           class="btn btn-outline-danger box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-trash-2"></i></a>
                                                        @if($invoice->status === 0 )
                                                        <a href="{{route('admin.invoices.showProduct',$invoice->id)}}"
                                                            class="btn btn-outline-warning box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-eye"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                                
                                <div class="justify-content-center d-flex">

                                </div>
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
