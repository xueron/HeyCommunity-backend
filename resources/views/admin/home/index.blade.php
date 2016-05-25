@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="text-center">
        <h2>Hey Community <small>trend</small></h2>
    </div>

    <!-- Login panel -->
    <div class="row" style="margin-top:30px;">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Notice</th>
                        <th>Timeline</th>
                        <th>Topic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>最近7天</td>
                        <td>{{ $week['user_num'] }}</td>
                        <td>{{ $week['notice_num'] }}</td>
                        <td>{{ $week['timeline_num'] }}</td>
                        <td>{{ $week['topic_num'] }}</td>
                    </tr>
                    <tr>
                        <td>最近一个月</td>
                        <td>{{ $month['user_num'] }}</td>
                        <td>{{ $month['notice_num'] }}</td>
                        <td>{{ $month['timeline_num'] }}</td>
                        <td>{{ $month['topic_num'] }}</td>
                    </tr>
                    <tr>
                        <td>全部</td>
                        <td>{{ $all['user_num'] }}</td>
                        <td>{{ $all['notice_num'] }}</td>
                        <td>{{ $all['timeline_num'] }}</td>
                        <td>{{ $all['topic_num'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

