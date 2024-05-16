@extends('layout.main')

@section('content')
<div class="btn-group btn-group float-right mt-3" role="group">
    @can("viewAny", App\Models\Role::class)
        <a href="{{ route('roles.index') }}" class="btn btn-primary" title="Show All Role">
            <span class="fa fa-list" aria-hidden="true"></span>
        </a>
    @endcan
    @can("create", App\Models\Role::class)
        <a href="{{ route('roles.create') }}" class="btn btn-success" title="Create New Role">
            <span class="fa fa-plus" aria-hidden="true"></span>
        </a>
    @endcan
    @can("update", $role)
        <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary" title="Edit Role">
            <span class="fa fa-edit" aria-hidden="true"></span>
        </a>
    @endcan
    @can("delete", $role)
        <a type="submit" class="btn btn-danger" title="Delete Role" data-toggle="modal" data-target="#delete">
            <span class="fa fa-trash" aria-hidden="true"></span>
        </a>
    @endcan
</div>
<p class="clearfix"></p>
<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="card-title">
            <h4>{{ $role->title }}</h4>
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $role->title }}</dd>
            <dt>Description</dt>
            <dd>{{ $role->description }}</dd>
        </dl>
    </div>
</div>
@can("delete", $role)
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
                    <p> Delete {{ $role->title }} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" accept-charset="UTF-8">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan
@endsection