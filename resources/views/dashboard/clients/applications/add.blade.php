@extends("dashboard.layout.layout")

@section('title', 'API - ' . $clientName . ' - Applications - Add')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-md-offset-0">
                <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1>New application <small>for <a href="{{ route('dashboard.client.application', ["clientId" => $clientId]) }}">{{ $clientName }}</a></small></h1>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    <form method="post">
                        <input type="hidden" name="ClientId" value="{{$clientId}}">
                        <tr>
                            <th><label for="ApplicationName">ApplicationName</label></th>
                            <td><input class="form-control" type="text" id="ApplicationName" name="ApplicationName" required></td>
                        </tr>
                        <tr>
                            <th><label for="ApplicationDescription">ApplicationDescription</label></th>
                            <td>
                                <textarea id="ApplicationDescription" class="form-control" name="ApplicationDescription" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="ApplicationVersion">ApplicationVersion</label></th>
                            <td><input class="form-control" type="text" id="ApplicationVersion" name="ApplicationVersion" required></td>
                        </tr>
                        <tr>
                            <th><label for="ApplicationSecret">ApplicationSecret</label> <a onclick="$('#ApplicationSecret').val(generateId());"><span class="glyphicon glyphicon-random"></span></a></th>
                            <td><input class="form-control" type="text" id="ApplicationSecret" name="ApplicationSecret" required></td>
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

    <script>
        function generateId()
        {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 128; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }
    </script>
@endsection