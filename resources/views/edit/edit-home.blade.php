@extends('base')

@section('title', 'Редактиране за дома')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <form method="POST">
        @csrf
        <input name="zeroedAllHome" type="submit" value="Занули кашоните на всички за дома" style="background-color: red; font-weight: bold; cursor: pointer;"  onclick="return confirm('!!! ЩЕ ЗАНУЛИ ВСЧИКИ ЗА ДОМА !!!')">
    </form>
    <div class="c-box__home c-box o-bolder">
        @foreach($homes as $home)
            @php
                $width = $home->width / 3;
            @endphp

            <form class="c-box__img c-box__width-small c-box__image" action="/edit-home" method="POST" style="width:{{ $width }}px">
                @csrf
                <img class="" src="images/home/{{ $home->code }}thumb.{{ $home -> type }}" alt="">

                <input name="update" type="submit" value="{{$home->code}}" style="width: 4em; height: 2em; background-color: lightgreen; cursor: pointer;">

                <label>цена
                    <input name="price" placeholder="цена" value="{{ $home->price }}" style="width: 50px;" id="{{ $home->id . $home->price }}">
                </label>

                <input name="zeroedHome" type="submit" value="0" style="background-color: red; font-weight: bold; cursor: pointer;"><br>

                <label>ст
                    <input name="price_old" placeholder="стара цена" value="{{ $home->price_old }}" style="width: 40px;"
                       id="{{ $home->id . $home->price_old }}">
                </label>

                <label>кол.
                    <input style="width: 40px;" placeholder="количество" value="{{ $home->quantity }}" name="quantity"
                       id="{{ $home->id . $home->quantity }}" onClick="this.select();">
                </label>

                <label>каш
                    <input name="box" value="{{ $home->box }}" style="width: 25px;" aria-label="" onClick="this.select();">
                </label><br>

                <textarea aria-label="" style="width: 95px;" name="sorting" placeholder="сортиране">{{ $home->sorting }}</textarea>

                <textarea aria-label="" style="width: 95px;" name="info" placeholder="инфо">{{ $home->info }}</textarea><br>

                <input type="hidden" name="id" value="{{ $home->id }}">

                <input name="deleteHome" type="submit" value="DEL:{{ $home->code }}" style="background-color: red; font-weight: bold; cursor: pointer;"
                       onclick="return confirm('!!! ЩЕ ИЗТРИЕ КОД: {{ $home->code }} !!!')">
            </form>
        @endforeach

    </div>
@endsection

