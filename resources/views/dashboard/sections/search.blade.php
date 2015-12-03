<div class="row">
    <form class="search-form">
        <div class="form-group has-feedback">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" name="where" id="where" value="{{ app('request')->input('where') }}">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </form>
</div>