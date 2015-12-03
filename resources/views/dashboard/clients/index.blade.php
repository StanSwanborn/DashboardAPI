@extends("dashboard.layout.layout")

@section('title', 'API - Clients')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>Clients</h1>
            </div>
        </div>

        @include('dashboard.sections.search')
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Application Count</th>
                    </tr>
                    @foreach($clients as $client)
                        <tr>
                            <th scope="row">{{ $client->mid }}</th>
                            <td>
                                <a href="{{ route('dashboard.client.application', [ 'clientId' => $client->mid ]) }}">{{ $client->name_mandant }}</a>
                            </td>
                            <td>{{ $client->count }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('dashboard.sections.paging')
    </div>
@endsection