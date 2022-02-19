
@extends('backend.layouts.master')
@section('title','Student')
@section('main-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><strong>Student</strong></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                @endif
                @if(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('danger')}}</p>
                @endif
                <div class="card-header">
                    <h3 class="card-title"> View
                        <a href="{{route('student.index')}}" class="btn btn-success">List</a>
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped" >
                        <tr>
                            <th>Feature Image</th>
                            <td><img src="{{asset('uploads/'.$data['row']->feature_image)}}" alt="" height="100px"></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$data['row']->name}}</td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{$data['row']->age}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data['row']->email}}</td>
                        </tr>
                        <tr>
                            <th>Guardian Name</th>
                            <td>{{$data['row']->guardian_name}}</td>
                        </tr>
                        <tr>
                            <th>Guardian Phone Number</th>
                            <td>{{$data['row']->guardian_phone_number}}</td>
                        </tr>
                        <tr>
                            <th>Room ID</th>
                            <td>{{$data['row']->room_id}}</td>
                        </tr>
                        <tr>
                            <th>Admitted Date</th>
                            <td>{{$data['row']->admitted_date}}</td>
                        </tr>
                        <tr>
                            <th>Parmanent Address</th>
                            <td>{{$data['row']->permanent_address}}</td>
                        </tr>
                        <tr>
                            <th>Phone NUmber</th>
                            <td>{{$data['row']->phone_number}}</td>
                        <tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$data['row']->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{$data['row']->updated_at}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            {{--            session div ends --}}
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection


