@extends('base')

@section('title', 'Броене за дома')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <div class="c-box__home c-box o-bolder">
        @foreach($homes as $home)
            @php
                $width = $home->width / 3;
                $ofBox = '';
                if ($home->quantity == 0)
                    $ofBox = 'c-box__of';
            @endphp

            <form class="c-box__img c-box__width-small c-box__image {{ $ofBox }}" method="POST" style="width:{{ $width }}px">
                @csrf
                <img class="" src="images/home/{{ $home -> code }}thumb.{{ $home -> type }}" alt="">
                <input style="width: 4em; height: 2em; background-color: lightgreen; cursor: pointer;" type="submit" name="update" value="{{ $home->code }}">

                <label>кол
                    <input name="quantity" style="width: 40px;" value="{{ $home->quantity }}" onClick="this.select();">
                </label>

                <label>каш
                    <input name="box" value="{{ $home->box }}" style="width: 25px;" aria-label="" onClick="this.select();">
                </label>

                <input type="hidden" name="id" value="{{ $home->id }}">
                @php if ($home->quantity > 0) {
                    @endphp <input name="zeroedHome" type="submit" value="н" style="background-color: red; font-weight: bold; cursor: pointer;"> @php
                } @endphp
            </form>
        @endforeach

    </div>
@endsection


