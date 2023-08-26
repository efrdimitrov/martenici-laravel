<ul class="c-nav" id="navbar">
    <li class="c-nav__lists">
        <a href="/promo" class="c-nav__list"
           @if (Route::current()->uri() == 'promo')
               style="background-color: #FEF2F2; color: #7F1D1D;"
           @endif>ПРОМО
        </a>
    </li>
    <li class="c-nav__lists">
        <a href="/" class="c-nav__list"
           @if (Route::current()->uri() == '/')
               style="background-color: #FEF2F2; color: #7F1D1D;"
           @endif>ВСИЧКИ
        </a>
    </li>
    <li class="c-nav__lists">
        <a class="c-nav__list c-nav__category">КАТЕГОРИИ</a>
        <ul class="c-nav__drop">
            <li class="c-nav__drop-lists">
                <a href="/bracelets" class="c-nav__drop-list"
                    @if (Route::current()->uri() == 'bracelets')
                        style="background: #BF3830; color: #fff;"
                    @endif>гривни ({{ $braceletsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/ladies" class="c-nav__drop-list"
                    @if (Route::current()->uri() == 'ladies')
                        style="background: #BF3830; color: #fff;"
                    @endif>дамски ({{ $ladiesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/kids" class="c-nav__drop-list"
                   @if (Route::current()->uri() == 'kids')
                       style="background: #BF3830; color: #fff;"
                   @endif>
                    детски ({{ $kidsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/homes" class="c-nav__drop-list"
                   @if (Route::current()->uri() == 'homes')
                       style="background: #BF3830; color: #fff;"
                   @endif>
                    за дома ({{ $homesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/hangings" class="c-nav__drop-list"
                   @if (Route::current()->uri() == 'hangings')
                        style="background: #BF3830; color: #fff;"
                   @endif>
                    закачащи ({{ $hangingsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/medallions" class="c-nav__drop-list"
                   @if (Route::current()->uri() == 'medallions')
                       style="background: #BF3830; color: #fff;"
                   @endif>
                    медальони ({{ $medallionsCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
            <li class="c-nav__drop-lists">
                <a href="/packages" class="c-nav__drop-list"
                   @if (Route::current()->uri() == 'packages')
                       style="background: #BF3830; color: #fff;"
                   @endif>
                    повече бройки ({{ $packagesCount }} <span class="c-nav__models">модела</span>)
                </a>
            </li>
        </ul>
    </li>
</ul>
<div style="margin:4em auto;"></div>
