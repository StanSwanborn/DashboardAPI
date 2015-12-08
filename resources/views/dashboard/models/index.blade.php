@extends("dashboard.layout.layout")

@section('title', 'API - Models')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>Models <small><a href='{{ route('dashboard.model.export') }}'><span class="glyphicon glyphicon-export"></span></a></small></h1>
            </div>
            <a href="{{ route('dashboard.model.add') }}" class="btn btn-default pull-left"><i class="glyphicon glyphicon-plus"></i></a>
        </div>

        @include('dashboard.sections.search')
        <div class="row">
            {!! render_status()  !!}
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Model Name</th>
                        <th>Table Name</th>
                        <th class="col-md-1">Properties</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1">Columns</th>
                        <th class="col-md-2">Dynamic Attributes</th>
                        <th class="col-md-2">Foreign Keys</th>
                    </tr>
                    @foreach($models as $model)
                        <tr @if(!is_numeric($model->columnCount)) class="navbar-default" @endif>
                            <th scope="row">{{ $model->modelCount }}</th>
                            <td><a href='{{ route('dashboard.model.details', ['modelName' => $model->modelName]) }}'>{{ $model->modelName }}</a></td>
                            <td>{{ $model->tableName }}</td>
                            <td>{{ $model->propertyCount }}</td>
                            <td>
                                @if(is_numeric($model->columnCount))
                                    @if($model->propertyCount < $model->columnCount)
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    @elseif($model->propertyCount > $model->columnCount)
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    @else
                                        <span class="glyphicon glyphicon-minus"></span>
                                    @endif
                                @endif
                            </td>
                            <td>@if(!is_numeric($model->columnCount))
                                    <span class="badge badge-transparent tooltip-error" title="The table associated to the model does not exist!">
									    <i class="ace-icon fa fa-exclamation-triangle orange bigger-130"></i>
								    </span>
                                @else {{ $model->columnCount }} @endif
                            </td>
                            <td>@if($model->dynamicAttributes) <span class="glyphicon glyphicon-ok"></span> @else <span class="glyphicon glyphicon-remove"></span> @endif</td>
                            <td>{{ $model->foreignKeyCount }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
