@extends('layouts.main')
@section('content')
<div class="panel-body">
    <form action="/article" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-3 control-label">Content</label>

            <div class="col-sm-6">
                <input type="text" name="content" id="content" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Submit
                </button>
            </div>
        </div>
    </form>
</div>
@endsection