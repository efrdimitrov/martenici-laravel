@extends('base')

@section('title', 'Редактиране правоъгълни')

@section('menu-edit')
    @include('layouts.menu-edit')
@endsection

@section('all')
    <form method="POST">
        @csrf
        <input name="zeroedAllSquare" type="submit" value="Занули кашоните на всички правоъгълни" style="background-color: red; font-weight: bold; cursor: pointer;" onclick="return confirm('!!! ЩЕ ЗАНУЛИ ВСЧИКИ ПРАВОЪГЪЛНИ !!!')">
    </form>
    <div class="c-box__square c-box o-bolder o-shadow">
        @foreach($squares as $square)
            @php
                $promoBox = 'c-box__img';
            @endphp

            @if($square->price < $square->price_old and $square->quantity > 0)
                @php
                    $promoBox = 'c-box__promo';
                @endphp
            @endif
            @php
                $category = $square->category;
                $editBracelet = 'гривна';
                $editLady = 'дамска';
                $editKid = 'детска';
                $editHanging = 'закачаща';
                $editMedallion = 'медальон';
                $editPaket = 'повече бройки';
            @endphp
            <div class="{{ $promoBox }} c-box__width-square c-box__image">
                <form method="POST">
                    @csrf
                    <img src="images/square/{{ $square -> code }}thumb.{{ $square -> type }}" alt="">

                    <input name="update" type="submit" value="{{ $square->code }}" style="width: 4em; height: 2em; background-color: lightgreen; cursor: pointer;">

                    <input name="zeroedSquare"  type="submit" value="0" style="background-color: red; font-weight: bold; cursor: pointer;"
                           onclick="return confirm('Ще занули код: {{ $square->code }} !!!')">

                    <input  name="price" placeholder="цена" value="{{ $square->price }}" style="width: 45px;" id="{{ $square->id . $square->price }}">

                    <input name="price_old" placeholder="стара цена" value="{{ $square->price_old }}" style="width: 45px;"
                           id="{{ $square->id . $square->price_old }}"><br>

                    <label for="{{ $square->id . $square->quantity }}">кол.
                        <input name="quantity" style="width: 40px;" value="{{ $square->quantity }}"
                           id="{{ $square->id . $square->quantity }}" onClick="this.select();">
                    </label>

                    <label for="{{ $square->id . $square->box }}">кашон
                        <input name="box" value="{{ $square->box }}" style="width: 25px;" aria-label="" onClick="this.select();"><br>
                    </label>

                    <textarea aria-label="" style="width: 95px;" name="info" placeholder="инфо">{{ $square->info }}</textarea>

                    <label style="float: left;">гр
                        <input type="checkbox" name="bracelet" style="height:12px" @if(preg_match("/{$editBracelet}/i", $category)) {{ "checked" }} @endif>
                    </label>

                    <label style="float: right;">дам
                        <input type="checkbox" name="lady" style="height:12px" @if(preg_match("/{$editLady}/i", $category)) {{ "checked" }} @endif>
                    </label><br>

                    <label style="float: left;">дет
                        <input type="checkbox" name="kid" style="height:12px" @if(preg_match("/{$editKid}/i", $category)) {{ "checked" }} @endif>
                    </label>

                    <label style="float: right;">зак
                        <input type="checkbox" name="hanging" style="height:12px" @if(preg_match("/{$editHanging}/i", $category)) {{ "checked" }} @endif>
                    </label>

                    <label style="float: left;">мед
                        <input type="checkbox" name="medallion" style="height:12px" @if(preg_match("/{$editMedallion}/i", $category)) {{ "checked" }} @endif>
                    </label><br>

                    <label style="float: right;">пов
                        <input type="checkbox" name="paket" style="height:12px" @if(preg_match("/{$editPaket}/i", $category)) {{ "checked" }} @endif>
                    </label>

                    <textarea aria-label="" style="width: 95px;" name="sorting" placeholder="сортиране">{{ $square->sorting }}</textarea>

                    <input type="hidden" name="id" value="{{ $square->id }}">
                    <input name="deleteSquare" type="submit" value="DEL:{{ $square->code }}" style="background-color: red; font-weight: bold; cursor: pointer;"
                        onclick="return confirm('!!! ЩЕ ИЗТРИЕ КОД: {{ $square->code }} !!!')">
                </form>
            </div>
        @endforeach
    </div>
@endsection
