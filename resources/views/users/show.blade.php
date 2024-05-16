@extends('layout.main')

@section('content')
    <div class="btn-group btn-group mt-3 float-right" role="group">
        @can("viewAny", App\Models\User::class)
            <a href="{{ route('users.index') }}" class="btn btn-primary" title="Show All User">
                <span class="fa fa-list" aria-hidden="true"></span>
            </a>
        @endcan
        @can("create", App\Models\User::class)
            <a href="{{ route('users.create') }}" class="btn btn-success" title="Create New User">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
        @can("update", $user)
            <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
                <span class="fa fa-edit" aria-hidden="true"></span>
            </a>
        @endcan
        @can("delete", $user)
            <button type="submit" class="btn btn-danger" title="Delete User" data-toggle="modal" data-target="#delete">
                <span class="fa fa-trash" aria-hidden="true"></span>
            </button>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4 >{{ $user->name }}</h4>
            </div>
        </div>    
        <div class="card-body">
            <dl class="dl-horizontal">
                <dt>Image</dt>
                <dd>
                    <img src="{{ $user->image }}" alt="{{ $user->name }}" style="width:80px;height:80px">
                </dd>
                <dt>First Name</dt>
                <dd>{{ $user->first_name }}</dd>
                <dt>Last Name</dt>
                <dd>{{ $user->last_name }}</dd>
                <dt>Email</dt>
                <dd>{{ $user->email }}</dd>
                <dt>Username</dt>
                <dd>{{ $user->username }}</dd>
                <dt>Phone</dt>
                <dd>{{ $user->phone }}</dd>
                <dt>Role</dt>
                <dd>{{ $user->status }}</dd>
                <dt>Status</dt>
                <dd>{{ $user->role->title }}</dd>
            </dl>
        </div>
    </div>
    @can("delete", $user)
        <div class="modal fade in" id="delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Delete {{ $user->name }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <form method="POST" action="{!! route('users.destroy', $user->id) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            @csrf
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection