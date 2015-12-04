@extends("dashboard.layout.layout")

@section('title', 'API - ' . $clientName . ' - ' . $application->ApplicationName . ' - Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.client.application.details', ["clientId" => $clientId, 'applicationId' => $applicationId]) }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $application->ApplicationName }} <small>from <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}">{{ $clientName }}</a></small></h1>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    <form method="post" action="">
                    @foreach($application as $key => $value)
                        <tr>
                            <th>{{ $key }}</th>
                            <td><input class="form-control" type="text" name="{{ $key }}" value="{{ $value }}" placeholder="Value"></td>
                        </tr>
                    @endforeach
                        <tr>
                            <th></th>
                            <td>
                                <button type="submit" name="action" value="save" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-save"></span> Save</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection