@extends('backend.layouts.master')
@section('title','Warden')
@section('main-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><strong>Warden</strong></h1>
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
                <h3 class="card-title">Create
                    <a href="{{route('warden.index')}}" class="btn btn-success">List</a>
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
                <form action="{{route('warden.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" id="warden_name" name="warden_name" class="form-control" value="{{$data['row']->warden_name}}">
                        @error('warden_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$data['row']->email}}">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="control-label">Phone Number</label>
                        <input type="number" id="phone_number" name="phone_number" class="form-control" value="{{$data['row']->phone_number}}">
                        @error('phone_number')
                        <p class="text-danger">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Short Description</label>
                        <input type="text" id="short_descrption" name="short_descrption" class="form-control" value="{{$data['row']->short_descrption}}">
                        @error('short_descrption')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSave" value="Save" class="btn btn-info">
                    </div>
                </form>
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


