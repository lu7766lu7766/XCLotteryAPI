@extends('copywriting::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('copywriting.name') !!}
    </p>
@stop
