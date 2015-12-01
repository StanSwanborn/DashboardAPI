<div class="row">
    <div class="form-group">
        <div class="col-sm-12 controls">
            <ul class="pagination pull-right">
                <li><a href="?page={{ (app('request')->input('page') ?: 1) - 1 }}">«</a></li>
                <li class="active"><a href="#">{{ (app('request')->input('page') ?: 1) }}</a></li>
                <li><a href="?page={{ (app('request')->input('page') ?: 1) + 1 }}">»</a></li>
            </ul>
        </div>
    </div>
</div>