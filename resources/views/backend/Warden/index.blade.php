@extends('backend.layouts.master')
{{--@include('title','index Student')--}}
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Warden</h1>
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
                <h3 class="card-title">List
                    <a href="{{route('warden.create')}}" class="btn btn-success">Create</a></h3>
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
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Warden Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Short Description</th>
                        <th class="no_print">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['rows'] as $i => $row)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$row->warden_name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone_number}}</td>
                            <td>{{$row->short_description}}</td>
                            <td class="no_print">
                                <a href="{{route('warden.show',$row->id)}}" class="btn btn-success">View</a>
                                <a href="{{route('warden.edit',$row->id)}}" class="btn btn-primary">Update</a>
                                <form action="{{route('warden.destroy',$row->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete" />
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
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
