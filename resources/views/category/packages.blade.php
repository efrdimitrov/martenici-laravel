@extends('base')

@section('title', 'Повече бройки')

@section('menu')
    @include('layouts.menu')
    @include('layouts.menu-sort')
@endsection

@section('all')
    @include('all-size')
@endsection
