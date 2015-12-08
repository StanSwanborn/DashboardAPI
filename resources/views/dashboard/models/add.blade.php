@extends("dashboard.layout.layout")

@section('title', 'API - Models')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.model') }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>New model</h1>
            </div>
        </div>

        <div class="row">
            {!! render_status() !!}
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    <form method="post">
                        <tr>
                            <th><label for="modelName">ModelName</label></th>
                            <td><input class="form-control" type="text" id="modelName" name="modelName" required></td>
                        </tr>
                        <tr>
                            <th><label for="tableName">TableName</label></th>
                            <td><input class="form-control" type="text" id="tableName" name="tableName" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="submit" name="action" value="save" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Add</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
@endsection