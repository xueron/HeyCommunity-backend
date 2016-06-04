<ul class="nav nav-pills nav-stacked">
    <li class="{{ Request::is('*index') ? 'active' : '' }}"><a href="{{ url('admin/system/index') }}">Info</a></li>
    <li class="{{ Request::is('*edit') ? 'active' : '' }}"><a href="{{ url('admin/system/edit') }}">Edit</a></li>
</ul>
