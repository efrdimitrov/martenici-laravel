<ul class="c-sort o-container c-sort-edit">

    @php
        $countSquarePositive = \App\Http\Controllers\Edit\EditSquareController::getCountSquarePositive()->count();
        $countSquareNegative = \App\Http\Controllers\Edit\EditSquareController::getCountSquareNegative()->count();
        $countSlimPositive = \App\Http\Controllers\Edit\EditSlimController::getCountSlimPositive()->count();
        $countSlimNegative = \App\Http\Controllers\Edit\EditSlimController::getCountSlimNegative()->count();
        $countHomePositive = \App\Http\Controllers\Edit\EditHomeController::getCountHomePositive()->count();
        $countHomeNegative = \App\Http\Controllers\Edit\EditHomeController::getCountHomeNegative()->count();
    @endphp

    <li class="c-sort__list">
        <a href="/edit-square">Правоъгълни</a>
    </li>

    <li class="c-sort__list">
        <a href="/edit-slim">Тънки</a>
    </li>

    <li class="c-sort__list">
        <a href="/edit-home">За дома</a>
    </li>
    <li class="c-sort__list">
        <a href="/edit-square-quantity">Броене пр. {{ $countSquarePositive . '/' . $countSquareNegative}}нул.</a>
    </li>
    <li class="c-sort__list">
        <a href="/edit-slim-quantity">Броене тън. {{ $countSlimPositive . '/' . $countSlimNegative}}нул.</a>
    </li>
    <li class="c-sort__list">
        <a href="/edit-home-quantity">Броене дом. {{ $countHomePositive . '/' . $countHomeNegative}}нул.</a>
    </li>

    <li class="c-sort__list">
        <a href="/">Всички</a>
    </li>
</ul>
