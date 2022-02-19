<div class="form-group">
    <label for="offer_number" class="control-label">Name</label>
    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
    @error('name')
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
