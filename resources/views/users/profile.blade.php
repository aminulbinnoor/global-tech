@extends('layout.main')

@section('content')

    <form method="POST" action="{{ route('profile.save') }}" enctype="multipart/form-data">
        <div class="card card-primary card-outline mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h4>{{ $user->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf
                @method("POST")

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
                    <label for="username">Username</label>
                    <input class="form-control" 
                        name="username" 
                        type="text" 
                        id="username" 
                        value="{{ old('username', optional($user)->username) }}" 
                        minlength="1" 
                        maxlength="255" 
                        required="true" 
                        placeholder="Enter username">
                    {!! $errors->first('username', '<p class="text-danger">:message</p>') !!}
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" 
                        name="phone" 
                        type="text" 
                        id="phone" 
                        value="{{ old('phone', optional($user)->phone) }}" 
                        minlength="1" 
                        maxlength="255" 
                        required="true" 
                        placeholder="Enter phone">
                    {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
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
                <input type="hidden" name="role_id" value="{{ $user->role->id }}" />
                <input type="hidden" name="status" value="{{ $user->status }}" />

            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Submit">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>

@endsection