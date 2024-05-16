@extends('layout.main')

@section('content')
<div class="btn-group btn-group float-right mt-3" role="group">
    @can("viewAny", App\Models\Permission::class)
        <a href="{{ route('permissions.index') }}" class="btn btn-primary" title="Show All Permission">
            <span class="fa fa-list" aria-hidden="true"></span>
        </a>
    @endcan
    @can("update", App\Models\Permission::class)
        <a href="{{ route('permissions.edit', $role->id ) }}" class="btn btn-primary" title="Edit Permission">
            <span class="fa fa-edit" aria-hidden="true"></span>
        </a>
    @endcan
    @can("delete", App\Models\Permission::class)
        <a type="submit" class="btn btn-danger" title="Delete Permission" data-toggle="modal" data-target="#delete">
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
        @foreach($available_permissions as $key => $values)
            <h5>{{ str_replace("_", " ", ucwords($key)) }}</h5>
            @foreach($values as $value)
                <p class="ml-4 mt-0 mb-0">{{ str_replace("_", "", ucwords($value)) }}: <b>{{ in_array("{$key}_{$value}", $permissions) ? "YES" : "NO" }}</b></p>
            @endforeach
            @if(!$loop->last)
                <hr/>
            @endif
        @endforeach
    </div>
</div>
@can("delete", App\Models\Permission::class)
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
@endcan
@endsection