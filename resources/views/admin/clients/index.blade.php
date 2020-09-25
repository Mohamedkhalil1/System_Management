@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-1">
                    <h3 class="content-header-title"> العملاء </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> العملاء
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="heading-elements mb-2">
                <a href="{{route('admin.clients.create')}}" class="btn btn-success btn-sm"><i class="ft-plus white"></i> اضافه عميل جديد</a>
              </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><span class="ft-users" style="color:green"></span> جميع العملاء </h4>
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

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                        <table
                                            class="table table-de display nowrap table-striped table-bordered mb-0">
                                            <thead class="">
                                            <tr>
                                                <th>الاسم</th>
                                                <th>العنوان</th>
                                                <th> البريد الالكتروني</th>
                                                 <th>رقم التليفون</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($clients)
                                                @foreach($clients as $client)
                                                    <tr>
                                                        <td><a href="{{route('admin.clients.show',$client->id)}}">{{$client->name}}</a></td>
                                                        <td>{{$client->address}}</td>
                                                        <td>{{$client ->email}}</td>
                                                        <td>{{$client->phone}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.clients.edit',$client-> id)}}"
                                                                   class="btn btn-outline-primary box-shadow-3 mr-1 mb-1 btn-sm"><i class="ft-edit"></i></a>

                                                                <a href="{{route('admin.clients.delete',$client->id)}}"
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
@endsection
