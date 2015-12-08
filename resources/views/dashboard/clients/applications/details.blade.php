@extends("dashboard.layout.layout")

@section('title', 'API - ' . $clientName . ' - ' . $application->ApplicationName)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $application->ApplicationName }} <small>from <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}">{{ $clientName }}</a></small></h1>
            </div>
            <a href="{{ route('dashboard.client.application.edit', ['clientId' => $clientId, 'applicationId' => $applicationId]) }}" class="btn btn-default pull-left"><i class="glyphicon glyphicon-edit"></i></a>
            <a href="{{ route('dashboard.client.application.delete', ['clientId' => $clientId, 'applicationId' => $applicationId]) }}" class="btn btn-danger pull-left"><i class="glyphicon glyphicon-remove"></i></a>
        </div>

        <div class="row">
            {!! render_status() !!}
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
    </div>
@endsection