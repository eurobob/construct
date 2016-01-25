@extends('build::layouts.master')


@section('content')

<p>This is the {{ $page }} page</p>

@role('author')
    <h1>author</h1>
@endrole

@permission('create-post')
    <h1>create-post</h1>
@endpermission

@scope('ecosystem')
    <h1>ecosystem</h1>
@endscope

@stop