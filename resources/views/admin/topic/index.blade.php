@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @include('admin.topic._side_nav')
        </div>

        <div class="col-sm-10">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}">Home</a></li>
                <li><a href="{{ route('admin.topic.index') }}">Topic</a></li>
                <li class="active">List</li>
            </ol>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Avatar</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th class="hide">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td style="white-space:nowrap;">{{ $item->author->nickname }}</td>
                        <td><img style="height:60px;" src="{{ $item->avatar }}"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td class="hide" style="white-space:nowrap;">
                            <a class="btn btn-sm btn-default" href="{{ route('admin.topic.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.topic.destroy', $item->id], 'onsubmit' => 'return myConfirmDelete()', 'style' => 'display:inline-block']) !!}
                                {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $topics->render() !!}
        </div>
    </div>
</div>
@endsection

