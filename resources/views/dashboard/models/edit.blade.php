@extends("dashboard.layout.layout")

@section('title', 'API - Model - ' . $modelName . ' - Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.model.details', ['modelName' => $modelName]) }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $modelName }}</h1>
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
                        <th>Foreign Key</th>
                        <th class="col-md-1"></th>
                    </tr>
                    @foreach($properties as $property)
                        <tr>
                            <form method="post" action="{{ route('dashboard.model.details', ['modelName' => $modelName]) }}">
                                <input type="hidden" name="oldPropertyName" value="{{ $property['propertyName'] }}">

                                <th scope="row">{{ $property['propertyCount'] }}</th>
                                <td><input class="form-control" type="text" name="propertyName" value="{{ $property['propertyName'] }}" placeholder="Property Name"></td>
                                <td><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-chevron-right"></span></td>
                                <td>
                                    <select name="columnName" class="form-control">
                                        <option selected>{{ $property['columnName'] }}</option>
                                        @foreach($columns as $column)
                                            <option>{{ $column }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="foreignKey" class="form-control">
                                        {{ $hasForeignKey = false }}
                                        @foreach($foreignKeys as $foreignKey)
                                            <option @if($foreignKey == $property['foreignKey']) {{$hasForeignKey = true }} selected @endif >{{ $foreignKey }}</option>
                                        @endforeach
                                        <option @if(!$hasForeignKey) selected @endif >None</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="submit" name="action" value="edit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="submit" name="action" value="delete" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    @if(count($columns) > 0)
                        <tr>
                            <form method="post" action="{{ route('dashboard.model.details', ['modelName' => $modelName]) }}">
                                <th scope="row">{{ end($properties)['propertyCount'] +1 }}</th>
                                <td><input class="form-control" type="text" name="propertyName" placeholder="Property Name"></td>
                                <td><span class="glyphicon glyphicon-chevron-left"></span></span><span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-chevron-right"></span></td>
                                <td>
                                    <select name="columnName" class="form-control">
                                        @foreach($columns as $column)
                                            <option>{{ $column }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="foreignKey" class="form-control">
                                        <option selected >None</option>
                                        @foreach($foreignKeys as $foreignKey)
                                            <option>{{ $foreignKey }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="submit" name="action" value="add" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection