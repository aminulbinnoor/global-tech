
<div class="form-group">
    <label>Image</label>
    <br/>
    <input name="image" type="file" style="display: none;" accept="image/*"/>
    <img id="image-placeholder" src="{{ $user ? $user->image : asset("images/default.png") }}" style="width: 120px;height: 120px"/>
    {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input class="form-control" 
           name="first_name" 
           type="text" id="first_name" 
           value="{{ old('first_name', optional($user)->first_name) }}" 
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="Enter first name" />
        {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input class="form-control" 
           name="last_name" 
           type="text" 
           id="last_name" 
           value="{{ old('last_name', optional($user)->last_name) }}" 
           minlength="1" 
           maxlength="255" 
           required="true" 
           placeholder="Enter last name">
    {!! $errors->first('last_name', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="Enter email">
    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <label for="password">Password</label>
    <div class="input-group">
        <input name="password" 
               class="form-control" 
               type="password" 
               value="{{ $user ? decrypt(old('password', optional($user)->password)) : old('password', optional($user)->password) }}" 
               placeholder="Enter Pssword">
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-flat">
                <i class="fa fa-eye"></i>
            </button>
        </span>
    </div>
    {!! $errors->first('password', '<span class="error invalid-feedback">:message</span>') !!}
</div>
<div class="form-group">
    <label for="role_id">Role</label>
    <select class="form-control" id="role_id" name="role_id" required="true">
        <option value="" style="display: none;" {{ old('role_id', optional(optional($user)->role)->id ?: '') == '' ? 'selected' : '' }} disabled selected>Select Role</option>
        @foreach ($roles as $role)
			    <option value="{{ $role->id }}" {{ old('role_id', optional(optional($user)->role)->id) == $role->id ? 'selected' : '' }}>
			    	{{ $role->title }}
			    </option>
		@endforeach
    </select>
    {!! $errors->first('role_id', '<p class="text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="status">Status</label>
    <div class="input-group">
        <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="active" {{ old('status', optional($user)->status) === "active" ? "selected=true":"" }}>Active</option>
            <option value="suspended" {{ old('status', optional($user)->status) === "suspended" ? "selected=true":"" }}>Suspended</option>
        </select>
        {!! $errors->first('status', '<p class="text-danger">:message</p>') !!}
    </div>
</div>

