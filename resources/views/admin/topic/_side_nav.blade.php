<ul class="nav nav-pills nav-stacked">
    <li class="{{ Request::is('*topic') ? 'active' : '' }}"><a href="{{ route('admin.topic.index') }}">List</a></li>
    <li class="hide {{ Request::is('*create') ? 'active' : '' }}"><a href="{{ route('admin.topic.create') }}">Create</a></li>
</ul>
