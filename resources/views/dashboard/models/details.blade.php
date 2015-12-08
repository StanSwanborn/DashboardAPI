@extends("dashboard.layout.layout")

@section('title', 'API - Model - ' . $model->modelName)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.model') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $model->modelName }} <small>Details</small></h1>
            </div>
            <a href="{{ route('dashboard.model.delete', ['modelName' => $model->modelName]) }}" class="btn btn-danger pull-left"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    @foreach($model as $key => $value)
                        <tr>
                            <th>{{ ucfirst($key) }}</th>
                            @if(is_bool($value))
                                <td>{{ $value ? 'true' : 'false' }}</td>
                            @elseif(is_null($value))
                                <td>-</td>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection