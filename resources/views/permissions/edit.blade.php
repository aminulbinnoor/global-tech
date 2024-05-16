@extends('layout.main')

@section('content')
<div class="btn-group btn-group float-right mt-3" role="group">
    @can("viewAny", App\Models\Permission::class)
        <a href="{{ route('permissions.index') }}" class="btn btn-primary" title="Show All Permissions">
            <span class="fa fa-list" aria-hidden="true"></span>
        </a>
    @endcan
    @can("delete", App\Models\Permission::class)
        <a type="submit" class="btn btn-danger" title="Delete Permissions" data-toggle="modal" data-target="#delete">
            <span class="fa fa-trash" aria-hidden="true"></span>
        </a>
    @endcan
</div>
<p class="clearfix"></p>
<form method="POST" action="{{ route('permissions.update', $role->id) }}" accept-charset="UTF-8">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>{{ $role->title}}</h4>
            </div>
        </div>
        <div class="card-body">
            @csrf
            @method("PUT")
            @include ('permissions.form', ["available_permissions" => $available_permissions, "permissions" => $permissions])
        </div>
        <div class="card-footer">
            <input class="btn btn-primary float-right" type="submit" value="Submit">
            <p class="clearfix"></p>
        </div>
    </div>
</form>
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
                <form method="POST" action="{{ route('permissions.destroy', $role->id) }}" accept-charset="UTF-8">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection