<div class="row">
    <form class="search-form">
        <div class="form-group has-feedback">
            <label for="search" class="sr-only">Search</label>
            <input type="text" class="form-control" name="search" id="search" placeholder="search" value="{{ app('request')->input('search') }}">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </form>
</div>