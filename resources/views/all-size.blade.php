<div class="c-box o-bolder" id="lightgallery">
    @foreach($all as $article)
        @php
            $promoPrice = '';
            $promoBox = 'c-box__img';
            $size = 'square';
            $widthSize = $size;
             if($article->price < $article->price_old and $article->quantity > 0) {
                 $promoPrice = '-promo';
                 $promoBox = 'c-box__promo';
             }
             if($article -> size == 2) {
                 $size = 'slim';
                 $widthSize = 'slim';
             }
             if($article -> size == 3) {
                 $size = 'home';
                 if($article->width == 600)
                     $widthSize = 'slim';
                 if($article->width == 700)
                     $widthSize = 'homeLarge';
             }
             $dataSub = "<div class='lightGallery-captions'>
             <button><a href='/$article->code'>Линк</a></button></div>
             <div class='c-box-img-view-data'>цена: $article->price лв.  $article->info код: $article->code</div></div>";
        @endphp

        <a class="{{ $promoBox }} c-box__width-{{ $widthSize }} c-box__image item-gallery"
           href="/images/{{ $size }}/{{ $article->code }}.{{ $article->type }}" data-sub-html="{{ $dataSub }}">
            <div class="c-box__img-zoom">
                <img class="c-box__width-img" alt="{{ $article->code }}" src="/images/{{ $size }}/{{ $article -> code }}thumb.{{ $article -> type }}">
            </div>

            <span class="c-box__price{{ $promoPrice }}">цена: {{ $article -> price }} лв.</span>

            @if($article->price < $article->price_old and $article->quantity > 0)
                @php
                    $percent = ceil(100 - $article->price / $article->price_old * 100);
                @endphp

                <div class="c-box__promo-percent">-{{ $percent }}%</div>

                <span class="c-box__price-old"> {{ $article->price_old }} лв.</span>

                <span class="quantity">наличност: {{ $article->quantity}};</span>
            @endif
            <span class="price">{{ $article -> info }}</span>

            <span class="code">код: {{ $article -> code }}</span>
        </a>
    @endforeach
</div>

{{--no quantity--}}
@if (Route::current()->uri() == '/')
    <div class="c-box o-bolder">
        @foreach($noQuantities as $noQuantity)
            @php
                $size = 'square';
                $widthSize = $size;
                if($noQuantity -> size == 2) {
                    $size = 'slim';
                    $widthSize = 'slim';
                }
                if($noQuantity -> size == 3){
                    $size = 'home';
                    if($noQuantity->width == 600)
                        $widthSize = 'slim';
                    if($noQuantity->width == 700)
                        $widthSize = 'homeLarge';
                }
            @endphp
            <div class="c-box__width-{{ $widthSize }} c-box__image c-box__img c-box__of">
                <img src="/images/{{ $size }}/{{ $noQuantity->code }}thumb.{{ $noQuantity->type }}" alt="{{ $noQuantity->code }}"
                class="c-box__of-text c-box__width-img">
                <span class="c-box__price">цена: {{ $noQuantity -> price }} лв.</span>
                <span class="price">{{ $noQuantity -> info }}</span>
                <span class="code">код: {{ $noQuantity -> code }}</span>
                <div class="c-box__of-text">Няма<br>наличност</div>
            </div>
        @endforeach
    </div>
@endif

