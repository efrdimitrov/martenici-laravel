@extends('base')

@section('title', 'Редактиране тънки')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <form method="POST">
        @csrf
        <input name="zeroedAllSlim" type="submit" value="Занули кошоните на всички тънки" style="background-color: red; font-weight: bold; cursor: pointer;"  onclick="return confirm('!!! ЩЕ ЗАНУЛИ ВСЧИКИ ТЪНКИ !!!')">
    </form>
    <div class="c-box__slim c-box o-bolder">
        @foreach($slims as $slim)
            @php
                $promoBox = 'c-box__img';
            @endphp

            @if($slim->price < $slim->price_old and $slim->quantity > 0)
                @php
                    $promoBox = 'c-box__promo';
                @endphp
            @endif

            @php
                $category = $slim->category;
                $bracelet = 'гривна';
                $lady = 'дамска';
                $kid = 'детска';
            @endphp

            <form class="{{ $promoBox }} c-box__width-slim c-box__image" method="POST">
                @csrf
                <img class="" src="images/slim/{{ $slim -> code }}thumb.{{ $slim -> type }}" alt="">

                <input name="update" type="submit" value="Зап:{{ $slim->code }}" style="width: 7em; height: 2em; background-color: lightgreen; cursor: pointer;">

                <label>цена
                    <input name="price" placeholder="цена" value="{{ $slim->price }}" style="width: 50px;" id="{{ $slim->id . $slim->price }}"><br>
                </label>

                <label>ст
                    <input name="price_old" placeholder="стара цена" value="{{ $slim->price_old }}" style="width: 50px;"
                       id="{{ $slim->id . $slim->price_old }}">
                </label>

                <label>кол.
                    <input name="quantity" style="width: 40px;" placeholder="количество" value="{{ $slim->quantity }}"
                       id="{{ $slim->id . $slim->quantity }}" onClick="this.select();">
                </label>

                <label>каш
                    <input name="box" value="{{ $slim->box }}" style="width: 25px;" aria-label="" onClick="this.select();">
                </label>

                <textarea name="info" aria-label="" style="width: 95px;" id="info" placeholder="инфо">{{ $slim->info }}</textarea>

                <textarea name="sorting" aria-label="" style="width: 95px; text-align: left;" id="sorting" placeholder="сорт">{{ $slim->sorting }}</textarea><br>

                <label>гр
                    <input type="checkbox" name="bracelet" id="{{$slim->id}}bracelet" style="height:12px"
                    @if(preg_match("/{$bracelet}/i", $category)) {{"checked"}} @endif>
                </label>

                <label>дам
                    <input type="checkbox" name="lady" id="{{$slim->id}}lady" style="height:12px"
                    @if(preg_match("/{$lady}/i", $category))  {{ "checked" }} @endif>
                </label>

                <label>дет
                    <input type="checkbox" name="kid" id="{{$slim->id}}kid" style="height:12px"
                    @if(preg_match("/{$kid}/i", $category)) {{ "checked" }}@endif>
                </label>

                <input name="zeroedSlim" type="submit" value="Занули" style="background-color: red; font-weight: bold; cursor: pointer;">

                <input type="submit" name="deleteSlim" value="DEL:{{ $slim->code }}" style="background-color: red; font-weight: bold; cursor: pointer;"
                       onclick="return confirm('!!! ЩЕ ИЗТРИЕ КОД: {{ $slim->code }} !!!')">

                <input type="hidden" name="id" value="{{ $slim->id }}">
            </form>
        @endforeach

    </div>
@endsection
