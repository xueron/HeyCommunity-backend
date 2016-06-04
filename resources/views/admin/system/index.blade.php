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
                <li class="active">Info</li>
            </ol>


        </div>
    </div>
</div>
@endsection


