@php
    $currPromo = '';
    if (Route::current()->uri() == 'promo')
        $currPromo = 'current';
    $currAll = '';
    if (Route::current()->uri() == '/')
        $currAll = 'current';
    $currCategory = '';
    if (Route::current()->uri() == 'bracelets' || Route::current()->uri() == 'ladies' ||
    Route::current()->uri() == 'kids' || Route::current()->uri() == 'homes' || Route::current()->uri() == 'hangings'
    || Route::current()->uri() == 'medallions' || Route::current()->uri() == 'packages')
        $currCategory = 'current';
@endphp
<ul class="c-nav" id="navbar">
    <li class="c-nav__lists">
        <a href="/promo" class="c-nav__list c-nav__list-{{ $currPromo }}">ПРОМО</a>
    </li>
    <li class="c-nav__lists">
        <a href="/" class="c-nav__list c-nav__list-{{ $currAll }}">ВСИЧКИ</a>
    </li>
    @php
        $currentLink = 'КАТЕГОРИИ';
        $hideBracelet = '';
        if (Route::current()->uri() == 'bracelets') {
            $currentLink = 'ГРИВНИ';
            $hideBracelet = 'hide';
        }
        $hideLady = '';
        if (Route::current()->uri() == 'ladies') {
            $currentLink = 'ДАМСКИ';
            $hideLady = 'hide';
        }
        $hideKid = '';
        if (Route::current()->uri() == 'kids') {
            $currentLink = 'ДЕТСКИ';
            $hideKid = 'hide';
        }
        $hideHome = '';
        if (Route::current()->uri() == 'homes') {
            $currentLink = 'ЗА ДОМА';
            $hideHome = 'hide';
        }
        $hideHanding = '';
        if (Route::current()->uri() == 'hangings') {
            $currentLink = 'ЗАКАЧАЩИ';
            $hideHanging = 'hide';
        }
        $hideMedallion = '';
        if (Route::current()->uri() == 'medallions') {
            $currentLink = 'МЕДАЛИОНИ';
            $hideMedallion = 'hide';
        }
        $hidePackage = '';
        if (Route::current()->uri() == 'packages') {
            $currentLink = 'ПОВЕЧЕ БРОЙКИ';
            $hidePackage = 'hide';
        }
    @endphp
    <li class="c-nav__lists">
        <a class="c-nav__list c-nav__category c-nav__list-{{ $currCategory }}">{{ $currentLink }}</a>
        <ul class="c-nav__drop">
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideBracelet }}">
                <a href="/bracelets" class="c-nav__drop-list">
                    гривни({{ $braceletsCount }}<span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideLady }}">
                <a href="/ladies" class="c-nav__drop-list">
                    дамски ({{ $ladiesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideKid }}">
                <a href="/kids" class="c-nav__drop-list">
                    детски ({{ $kidsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideHome }}">
                <a href="/homes" class="c-nav__drop-list">
                    за дома ({{ $homesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideHanding }}">
                <a href="/hangings" class="c-nav__drop-list">
                    закачащи ({{ $hangingsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hideMedallion }}">
                <a href="/medallions" class="c-nav__drop-list">
                    медальони ({{ $medallionsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists c-nav__drop-list-{{ $hidePackage }}">
                <a href="/packages" class="c-nav__drop-list">
                    повече бройки ({{ $packagesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
        </ul>
    </li>
</ul>
<div style="margin:4em auto;"></div>
