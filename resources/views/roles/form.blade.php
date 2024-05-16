
<div class="form-group">
    <label for="title">Title</label>
    <input id="title" 
           class="form-control" 
           name="title" 
           type="text" 
           value="{{ old('title', optional($role)->title) }}"
           minlength="1"
           maxlength="255"
           required="true"
           placeholder="Enter title"/>
    {!! $errors->first('title', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" cols="3" rows="5" id="description" required="true">{{ old('description', optional($role)->description) }}</textarea>
    {!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
</div>

