@extends('admin.layout.adminMasterLayout')

@section('title', 'Menu Config')

@section('content')

<div class="content-wrapper">
    {!! Menu::render() !!}
</div>

    {!! Menu::scripts() !!}
@endsection




