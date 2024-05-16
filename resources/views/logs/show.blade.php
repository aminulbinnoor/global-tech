@extends('layout.main')

@section('content')
<div class="btn-group btn-group float-right mt-3" role="group">
    <a href="{{ route('logs.index') }}" class="btn btn-primary" title="Show All Log">
        <span class="fa fa-list" aria-hidden="true"></span>
    </a>
</div>
<p class="clearfix"></p>
<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="card-title">
            <h4>{{ $log->action }}</h4>
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ $log->user->name }}</dd>
            <dt>IP</dt>
            <dd>{{ $log->ip }}</dd>
            <dt>User Agent</dt>
            <dd>{{ $log->user_agent }}</dd>
            <dt>Action</dt>
            <dd>{{ $log->action }}</dd>
            <dt>Message</dt>
            <dd>{{ $log->message }}</dd>
            <dt>Last Update</dt>
            <dd>{{ $log->last_update }}</dd>
        </dl>
    </div>
</div>
@endsection