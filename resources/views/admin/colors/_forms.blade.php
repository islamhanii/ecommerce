<div class="form-group">
    <label for="t-text" class="sr-only">Choose Color</label>
    <input id="t-text" type="color" value="{{ (old('code',isset($color)))?'#'.$color->code:'' }}" name="code" class="form-control" required>
</div>

<div class="form-group">
    <label for="t-text" class="sr-only">Color Name</label>
    <input id="t-text" type="text" name="name" value="{{ (old('name',isset($color)))?$color->name:'' }}" placeholder="Please Enter Color Name" class="form-control" required>
</div>
<input type="submit" name="txt" class="mt-4 btn btn-primary">
