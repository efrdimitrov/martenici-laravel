@extends('base')

@section('title', 'Грешна страница')

@section('menu')
    @include('layouts.menu')
    @include('layouts.menu-sort')
@endsection

@section('all')
    <br>
    <h2 style="text-align: center">Не съществува такъв артикул.</h2>
    <h2 style="text-align: center">Проверете кода отново!</h2>
@endsection
