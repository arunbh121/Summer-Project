
<div class="form-group">
    <label for="name" class="control-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <label for="name" class="control-label">Image</label>
    <input type="file" class="form-control" name="image_file" id="image_file" value="{{old('image_file')}}">
    @error('image_file')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <label for="description" class="control-label">Description</label>
    <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
    @error('description')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <label for="status" class="control-label">Status</label>
    <input type="radio" name="status" value="1">Active
    <input type="radio" name="status" value="0" checked="checked">Inactive
    @error('status')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
