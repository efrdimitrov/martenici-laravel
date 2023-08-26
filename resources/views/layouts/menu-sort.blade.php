<ul class="c-sort o-container">
{{--    <h5 class="c-sort__heading o-centering">Подреди по</h5>--}}
    @php
        $cheapCurrent = '';
        $expensiveCurrent = '';
        $recentCurrent = '';
    @endphp
    @if (Route::current()->uri() == 'cheap')
        @php $cheapCurrent = "background-color: #f8dcdc; color: #356352; border: 2px #356352 solid;"; @endphp
    @endif
    @if (Route::current()->uri() == 'expensive')
        @php $expensiveCurrent = "background-color: #f8dcdc; color: #356352; border: 2px #356352 solid;"; @endphp
    @endif
    @if (Route::current()->uri() == 'recent')
        @php $recentCurrent = "background-color: #f8dcdc; color: #356352; border: 2px #356352 solid;"; @endphp
    @endif

    <a href="/cheap" style="{{ $cheapCurrent }}" class="c-sort__list">най-евтини</a>
    <a href="/expensive" style="{{ $expensiveCurrent }}" class="c-sort__list">най-скъпи</a>
    <a href="/recent" style="{{ $recentCurrent }}" class="c-sort__list">най-нови</a>
</ul>
