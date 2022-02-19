
@extends('backend.layouts.master')
@section('title','Room')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Room</h1>
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
                <h3 class="card-title">Edit
                    <a href="{{route('room.index')}}" class="btn btn-success">List</a>
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
                <form action="{{route('room.update',$data['row']->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="room_number" class="control-label">Room Number</label>
                        <input type="number" id="room_number" name="room_number" class="form-control" value="{{$data['row']->room_number}}">
                        @error('room_number')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image_file">Image</label>
                        <input type="file" class="form-control" name="feature_image" id="feature_image" value="{{$data['row']->feature_image}}">
                        @error('feature_image')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="room_type_id" class="control-label">Room Type</label>
                        <select name="room_type_id" id="room_type_id" class="form-control">
                            <option value=""> Select Room Type</option>
                            @foreach($data['room_types'] as $room_type)
                                @if($room_type->id == $data['row']->room_type_id)
                                    <option value="{{$room_type->id}}" selected>{{$room_type->name}}</option>
                                @else
                                    <option value="{{$room_type->id}}">{{$room_type->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('room_type_id')
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
@section('js')
    <script>
        $(document).ready(function() {
            $('select').on('change', function () {
                var value = this.value;
                document.getElementById("room_capacity").value = value;
            });
        });
    </script>
@endsection
