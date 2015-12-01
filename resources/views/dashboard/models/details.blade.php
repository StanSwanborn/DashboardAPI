@extends("dashboard.layout.layout")

@section('title', 'API - Model - ' . $modelName)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.model') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $modelName }} <small>Details <a href='{{ route('dashboard.model.edit', ['modelName' => $modelName]) }}'><span class="glyphicon glyphicon-edit"></span></a></small></h1>
            </div>
        </div>
        @include('dashboard.sections.search')
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th class="col-md-1">No</th>
                        <th>Property Name</th>
                        <th class="col-md-1"></th>
                        <th>Column Name</th>
                        <th class="col-md-1"></th>
                    </tr>
                    @foreach($properties as $property)
                        <tr @if($property['primaryKey']) class="info" @elseif($property['foreignKey']) class="active" @endif>
                            <th scope="row">{{ $property['propertyCount'] }}</th>
                            <td>{{ $property['propertyName'] }}</td>
                            <td><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-chevron-right"></span></td>
                            <td>{{ $property['columnName'] }}</td>
                            <td>@if($property['foreignKey']) <a href="{{ route('admin.model.details', ['modelName' => $property['foreignKeyModel']]) }}">{{ $property['foreignKey'] }}</a> @elseif($property['primaryKey']) Primary Key @endif</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection