@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @include('admin.system._side_nav')
        </div>

        <div class="col-sm-10">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}">Home</a></li>
                <li><a href="{{ url('admin/system/index') }}">System</a></li>
                <li class="active">Edit</li>
            </ol>

            {!! Form::open(array('url' => 'admin/system/update', 'method' => 'post', 'class' => 'form form-horizontal')) !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="site_name">Site Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="site_name" id="site_name" value="{{ old('site_name', $system->site_name) }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection


