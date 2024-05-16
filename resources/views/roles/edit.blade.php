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
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <h4>{{ $role->title }}</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf
                @method("PUT")
                @include ('roles.form', ['role' => $role])
            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Submit">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>

@endsection