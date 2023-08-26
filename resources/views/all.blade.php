@extends('base')

@section('title', 'Всички')

@section('menu')
    @include('layouts.menu')
    @include('layouts.legend')
    @include('layouts.menu-sort')
@endsection

@section('all')
    @include('all-size')
@endsection



