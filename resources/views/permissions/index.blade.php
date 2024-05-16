@extends('layout.main')

@section('content')

<div class="card card-primary card-outline mt-5">
    <div class="card-header">
        <div class="card-title">
            <h4>Permissions</h4>
        </div>
    </div>
        <div class="card-card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Total Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->total_permissions }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can("view", App\Models\Permission::class)
                                        <a href="{{ route('permissions.show', $role->id ) }}" 
                                        class="btn btn-info btn-sm"
                                        title="Show Designation">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can("update", App\Models\Permission::class)
                                        <a href="{{ route('permissions.edit', $role->id ) }}" 
                                        class="btn btn-primary btn-sm"
                                        title="Edit Permission">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can("delete", App\Models\Permission::class)
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                title="Delete Permission"
                                                data-toggle="modal"
                                                data-target="#delete-{{$index}}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endcan
                                </div>     
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@foreach($roles as $index=>$role)
    @can("delete", App\Models\Permission::class)
        <form method="POST" action="{!! route('permissions.destroy', $role->id) !!}" accept-charset="UTF-8">
            @method("DELETE")
            @csrf
            <div class="modal fade in" id="delete-{{$index}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Delete {{$role->title}} ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endcan
@endforeach

@endsection