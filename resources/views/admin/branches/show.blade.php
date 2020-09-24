@extends('layouts.admin')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">{{$branch->name}}</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئسيه</a>
                </li>
                <li class="breadcrumb-item"><a href="#">الفروع</a>
                </li>
                <li class="breadcrumb-item active">{{$branch->name}}
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content-detached ">
        <div class="content-body">
          <section class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">بيانات الفرع</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                         <span class="badge badge-default badge-danger">{{$branch->name}}</span>
                      <span class="badge badge-default badge-warning">{{$branch->city}}</span>
                      <span class="badge badge-default badge-success">{{$branch->address}}</span>
                      
                      
                    </div>
                  </div>
                  <div class="px-1">
                    <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                      <li>المسئول عن الفرع :
                        <span class="text-muted">{{$branch->admin ? $branch->admin->name : ''}}</span>
                      </li>
                      <li>
                        <span class="text-muted">{{$branch->created_at->format('Y-m-d')}}</span>
                      </li>
                      
                    </ul>
                  </div>
                </div>
                <!-- project-info -->
                <div id="project-info" class="card-body row">
                  <div class="project-info-count col-lg-4 col-md-12">
                    <div class="project-info-icon">
                      <h2>{{$branch->employees()->count()}}</h2>
                      <div class="project-info-sub-icon">
                        <span class="la la-users"></span>
                      </div>
                    </div>
                    <div class="project-info-text pt-1">
                      <h5>عدد الموظفين</h5>
                    </div>
                  </div>
                  <div class="project-info-count col-lg-4 col-md-12">
                    <div class="project-info-icon">
                      <h2>{{$branch->employees()->count()}}</h2>
                      <div class="project-info-sub-icon">
                        <span class="la la-clipboard"></span>
                      </div>
                    </div>
                    <div class="project-info-text pt-1">
                      <h5>عدد الفواتير</h5>
                    </div>
                  </div>
                  <div class="project-info-count col-lg-4 col-md-12">
                    <div class="project-info-icon">
                      <h2>{{$branch->invoices->count()}}</h2>
                      <div class="project-info-sub-icon">
                        <span class="la la-money"></span>
                      </div>
                    </div>
                    <div class="project-info-text pt-1">
                      <h5>المبيعات</h5>
                    </div>
                  </div>
                </div>
                <!-- project-info -->
                
              </div>
            </div>
          </section>
          <!-- Task Progress -->
            <section id="dom" class="mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> منتجات الفرع </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table
                                        class="table table-de mb-0 display nowrap table-striped table-bordered">
                                        <thead class="">
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الوصف</th>
                                            <th>السعر</th>
                                            <th>الكميه المخزنه</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($products)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                            <a href="{{route('admin.products.edit',$product -> id)}}"
                                                                class="btn btn-outline-primary box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-edit"></i></a>

                                                            <a href="{{route('admin.products.delete',$product->id)}}"
                                                                class="btn btn-outline-danger box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-trash-2"></i></a>

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
            </section>

            <section id="dom" class="mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> فواتير الفرع </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table
                                        class="table table-de mb-0 display nowrap table-striped table-bordered">
                                        <thead class="">
                                        <tr>
                                            <th>رقم الفاتوره</th>
                                            <th>تاريخ الفاتوره</th>
                                            <th>العميل</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($invoices)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                            <a href="{{route('admin.products.edit',$product -> id)}}"
                                                                class="btn btn-outline-primary box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-edit"></i></a>

                                                            <a href="{{route('admin.products.delete',$product->id)}}"
                                                                class="btn btn-outline-danger box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-trash-2"></i></a>

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
            </section>

        </div>
      </div>
     
    </div>
  </div>
@endsection