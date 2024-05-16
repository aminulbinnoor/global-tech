@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("create", App\Models\User::class)
            <a href="{{ route('users.create') }}" class="btn btn-success" title="Create New User">
                <span class="fas fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Users</h4>
            </div>
        </div>
        <div class="card-body">
            @if(count($users) == 0)
                <div class=" text-center">
                    <h4>No Users Available.</h4>
                </div>
            @else
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td>
                                <img src="{{ $user->image }}" alt="{{ $user->name }}" style="width:50px;height:50px" />
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can("view", $user)
                                        <a href="{{ route('users.show', $user->id ) }}" 
                                        class="btn btn-info btn-sm"
                                        title="View User">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can("update", $user)
                                        <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-primary btn-sm"
                                        title="Edit User">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can("delete", $user)
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                title="ডিলেট করুন"
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
        @if($users->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div>
        @endif
    </div>
    @foreach($users as $index=>$user)
        @can("delete", $user)        
            <form method="POST" action="{!! route('users.destroy', $user->id) !!}" accept-charset="UTF-8">
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
                                <p> Delete {{$user->name}} ?</p>
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