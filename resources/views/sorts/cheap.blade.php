@extends('base')

@section('title', 'Най-евтини')

@section('menu')
    @include('layouts.menu')
    @include('layouts.menu-sort')
@endsection

@section('all')
    @include('all-size')
@endsection
