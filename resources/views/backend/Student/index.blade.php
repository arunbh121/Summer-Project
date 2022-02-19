@extends('backend.layouts.master')

{{--@include('title','index Student')--}}

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student</h1>
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
            <div class="card-header">
                <h3 class="card-title"> List <a href="{{route('student.create')}}" class="btn btn-secondary">Create</a></h3>
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
                @if(Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
                @endif
                @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('error')}}</p>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>S.N</th>
                        <th>Room ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Age</th>
{{--                        <th>Admitted Date</th>--}}
{{--                        <th>Email</th>--}}
                        <th>Phone Number</th>
{{--                        <th>Gurdian Name</th>--}}
{{--                        <th>Gurdian Phone Number</th>--}}
                        <th>Permanent Address</th>
                        <th>Action </th>
                    </tr>
                    @foreach($data['rows'] as $i=> $row)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$row->RoomId->room_number}}</td>
                        <td><img src="{{asset('uploads/'.$row->feature_image)}}" alt="" height="100px"></td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->age}}</td>
{{--                        <td>{{$row->admitted_date}}</td>--}}
{{--                        <td>{{$row->email}}</td>--}}
{{--                        <td>{{$row->phone_number}}</td>--}}
{{--                        <td>{{$row->guardian_name}}</td>--}}
                        <td>{{$row->guardian_phone_number}}</td>
                        <td>{{$row->permanent_address}}</td>
                        <td>
                            <a href="{{route('student.show',$row->id)}}" class="btn btn-info">View</a>
                            <a href="{{route('student.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('student.destroy',$row->id)}}" class="d-inline" method="Post" class="d-inline">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
