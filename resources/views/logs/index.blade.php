@extends('layout.main')

@section('content')
  
    <div class="card card-primary card-outline mt-5">
        <div class="card-header">
            <div class="card-title">
                <h4>Logs</h4>
            </div>
        </div>

        <div class="card-card-body">
            @if(count($logs) == 0)
                <h4 class="text-center mb-5 mt-5">No Logs Available.</h4>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User</th>
                            <th>IP</th>
                            <th>User Action</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $index => $log)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $log->user->name }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->last_update }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('logs.show', $log->id ) }}" 
                                       class="btn btn-info btn-sm"
                                       title="Show Log">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>                        
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        @if($logs->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $logs->render() !!}
                </div>
            </div>
        @endif
    
    </div>
@endsection