@extends('backend.layouts.master')

@section('title','Insert Student')
@section('content')

@endsection

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
{{--                            <li class="breadcrumb-item active">Customer</li>--}}
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
                        <a href="{{route('student.index')}}" class="btn btn-secondary">List</a>
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
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Age</label>
                            <input type="number" class="form-control" name="age" id="age" value="{{old('age')}}">
                            @error('age')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" >
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{old('phone_number')}}" >
                            @error('phone_number')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Gaurdian's Name</label>
                            <input type="text" class="form-control" name="guardian_name" id="guardian_name" value="{{old('guardian_name')}}" >
                            @error('guardian_name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Gaurdian Phone Number</label>
                            <input type="number" class="form-control" name="guardian_phone_number" id="guardian_phone_number" value="{{old('guardian_phone_number')}}" >
                            @error('guardian_phone_number')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Admitted Date</label>
                            <input type="date" class="form-control" name="admitted_date" id="admitted_date" value="{{old('admitted_date')}}">
                            @error('admitted_date')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image_file">Image</label>
                            <input type="file" class="form-control" name="image_file" id="image_file" value="{{old('image_file')}}">
                            @error('image_file')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="room_id">Room Number</label>
                            <select class="form-control" name="room_id" id="room_id" value="{{old('room_id')}}">
                                <option value="">Select room number</option>
                                @foreach($data['row'] as $room)
                                <option value="{{$room->id}}">{{$room->room_number}}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Permanent Address</label>
                            <input type="text" class="form-control" name="permanent_address" id="permanent_address" value="{{old('permanent_address')}}" >
                            @error('permanent_address')
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

