@extends("dashboard.layout.layout")

@section('title', 'API - Applications of ' . $clientName)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.client') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>Applications <small>of {{ $clientName }}</small></h1>
            </div>
        </div>

        @include('dashboard.sections.search')
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Version</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    @foreach($applications as $application)
                        <tr>
                            <th scope="row">{{ $application->ApplicationId }}</th>
                            <td>{{ $application->ApplicationVersion }}</td>
                            <td>
                                <a href="{{ route('dashboard.client.application.details', ['clientId' => $clientId, 'applicationId' => $application->ApplicationId ]) }}">{{ $application->ApplicationName }}</a>
                            </td>
                            <td>{{ $application->ApplicationDescription }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('dashboard.sections.paging')
    </div>
@endsection