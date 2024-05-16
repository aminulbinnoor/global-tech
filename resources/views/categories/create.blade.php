@extends('layout.main')

@section('content')

    <div class="btn-group btn-group float-right mt-3" role="group">      
        <a href="{{ route('categories.index') }}" class="btn btn-primary" title="Show All Category">
            <span class="fa fa-list" aria-hidden="true"></span>
        </a>
      
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('categories.store') }}" accept-charset="UTF-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <h4>Create New Category Or SubCategory</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf()
                @include ('categories.form', ['role' => null ])
            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Submit">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>
@endsection


