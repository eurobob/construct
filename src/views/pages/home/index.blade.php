@extends('build::layouts.master')


@section('content')

<p>Build something {{ $page }}</p>

@role('admin')
    <h1>admin</h1>
@endrole

@permission('create-post')
    <h1>create-post</h1>
@endpermission

@scope('ecosystem')
    <h1>ecosystem</h1>
@endscope

@stop