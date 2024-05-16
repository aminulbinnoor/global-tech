@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("create", App\Models\Role::class)
            <a href="{{ route('roles.create') }}" class="btn btn-success" title="Create New Role">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Roles</h4>
            </div>
        </div>
        <div class="card-card-body">
            @if(count($roles) == 0)
                <h4 class="text-center mb-5 mt-5">No Roles Available.</h4>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->title }}</td>

                            <td style="width: 20%;">
                                <div class="btn-group" role="group">
                                    @can("view", $role)
                                        <a href="{{ route('roles.show', $role->id ) }}" 
                                        class="btn btn-info btn-sm"
                                        title="Show Role">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can("update", $role)
                                        <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary btn-sm"
                                        title="Edit Role">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can("delete", $role)
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                title="Delete Role"
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
            @endif
        </div>
        @if($roles->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $roles->render() !!}
                </div>
            </div>
        @endif
    
    </div>
      @foreach($roles as $index => $role)
        @can("delete", $role)
            <form method="POST" action="{!! route('roles.destroy', $role->id) !!}" accept-charset="UTF-8">
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