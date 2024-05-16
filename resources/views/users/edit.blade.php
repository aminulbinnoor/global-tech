@extends('layout.main')

@section('content')

    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("viewAny", App\Models\User::class)
            <a href="{{ route('users.index') }}" class="btn btn-primary" title="Show All User">
                <span class="fa fa-list" aria-hidden="true"></span>
            </a>
        @endcan
        @can("viewAny", App\Models\User::class)
            <a href="{{ route('users.create') }}" class="btn btn-success" title="Create New User">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <h4>{{ "{$user->first_name} {$user->last_name}" }}</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf
                @method("PUT")
                @include ('users.form', ['user' => $user])
            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Submit">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>

@endsection