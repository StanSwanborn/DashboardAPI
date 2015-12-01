@extends("dashboard.layout.layout")

@section('title', 'API - ' . $clientName . ' - ' . $application['ApplicationName'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}" class="btn btn-primary pull-left"><i class="glyphicon  glyphicon glyphicon-menu-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $application['ApplicationName'] }} <small>from <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}">{{ $clientName }}</a></small></h1>
            </div>
        </div>

        <table class="table">
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            @foreach($application as $key => $value)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection