@extends('base')

@section('title', 'Броене на правоъгълни')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <div class="c-box__square c-box o-bolder o-shadow">
        @foreach($squares as $square)
            @php $ofBox = '';
                if ($square->quantity == 0)
                    $ofBox = 'c-box__of';
            @endphp
            <form class="c-box__img c-box__width-square c-box__image {{ $ofBox }}" method="POST">
                @csrf
                <img class="" src="images/square/{{ $square -> code }}thumb.{{ $square -> type }}" alt="">
                <input style="width: 4em; height: 2em; background-color: lightgreen; cursor: pointer;" type="submit" name="update" value="{{ $square->code }}">

                <input name="quantity" style="width: 40px;" value="{{ $square->quantity }}" onClick="this.select();">

                <label>каш
                    <input name="box" value="{{ $square->box }}" style="width: 25px;" aria-label="" onClick="this.select();"><br>
                </label>

                @php if ($square->quantity > 0) {
                    @endphp <input name="zeroedSquare" type="submit" value="н" style="background-color: red; font-weight: bold; cursor: pointer;">@php
                } @endphp

                <input type="hidden" name="id" value="{{ $square->id }}">
            </form>
        @endforeach

    </div>
@endsection

