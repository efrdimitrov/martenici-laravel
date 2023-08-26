@extends('base')

@section('title', 'Броене на тънки')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <div class="c-box__slim c-box o-bolder o-shadow">
        @foreach($slims as $slim)
            @php $ofBox = '';
                if ($slim->quantity == 0)
                    $ofBox = 'c-box__of';
            @endphp
            <form class="c-box__img c-box__width-slim c-box__image {{ $ofBox }}" method="POST">
                @csrf
                <img class="" src="images/slim/{{ $slim -> code }}thumb.{{ $slim -> type }}" alt="">
                <input style="width: 4em; height: 2em; background-color: lightgreen; cursor: pointer;" type="submit" name="update" value="{{ $slim->code }}">

                <label>кол
                    <input name="quantity" style="width: 40px;" value="{{ $slim->quantity }}" onClick="this.select();">
                </label>

                <label>каш
                    <input name="box" value="{{ $slim->box }}" style="width: 25px;" aria-label="" onClick="this.select();">
                </label>

                <input type="hidden" name="id" value="{{ $slim->id }}">
                @php if ($slim->quantity > 0) {
                    @endphp <input name="zeroedSlim" type="submit" value="н" style="background-color: red; font-weight: bold; cursor: pointer;">@php
                } @endphp
            </form>
        @endforeach

    </div>
@endsection


