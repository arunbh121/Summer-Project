
@extends('backend.layouts.master')
@section('title','Service')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Service</h1>
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
                    <a href="{{route('service.create')}}" class="btn btn-success">Create</a>
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
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        
                        <th>Status</th>
                        <th>Description</th>
                        <th class="no_print">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['rows'] as $i => $row)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>
                               {{$row->name}}
                            </td>

                            @if($row->status==1)
                                <td>
                                    <p class="text text-success">Active</p>
                                </td>
                            @else
                                <td>
                                    <p class="text text-danger">Inactive</p>
                                </td>

                            @endif
                            <td>{{$i+1}}</td>
                            <td>
                                {{$row->description}}
                            </td>
                            <td class="no_print">
                                <a href="{{route('service.show',$row->id)}}" class="btn btn-success">View</a>
                                <a href="{{route('service.edit',$row->id)}}" class="btn btn-primary">Update</a>
                                <form action="{{route('service.destroy',$row->id)}}" method="post" class="d-inline">
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


