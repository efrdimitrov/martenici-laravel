<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Image Upload Example - Tutsmake.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @php
                $lastCode = \App\Http\Controllers\UploadController::getLastCode()->code;
                $nextCode = $lastCode + 1;
                $imgType = \App\Http\Controllers\UploadController::getLastCode()->type;
                $price = \App\Http\Controllers\UploadController::getLastCode()->price;
                $size = \App\Http\Controllers\UploadController::getLastCode()->size;
                $category = \App\Http\Controllers\UploadController::getLastCode()->category;
                $info = \App\Http\Controllers\UploadController::getLastCode()->info;
                $width = \App\Http\Controllers\UploadController::getLastCode()->width;
                $height = \App\Http\Controllers\UploadController::getLastCode()->height;
                $part = 'square';
                if ($size == 2)
                    $part = 'slim';
                elseif ($size == 3)
                    $part = 'home';
            @endphp

            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <img src="/images/{{$part . '/' . $lastCode . '.' . $imgType}}" alt="" width="50%">
                    <input
                        type="file"
                        name="image"
                        id="inputImage"
                        class="form-control @error('image') is-invalid @enderror">
                    <br>
                    <label class="font-weight-bold md" for="code">Код:</label>
                    <input name="code" value="{{ $nextCode }}" id="code">

                    <br>
                    <label class="font-weight-bold" for="price">Цена:</label>
                    <input name="price" value="{{ $price }}">
                    <div class='models container'>
                        <input type="radio" name="size" value="1" {{$size == 1 ? 'checked' : ''}} id="square">
                        <label for="square">правоъгълни</label>
                        <div class='more hidden' style="display: none;">
                            <input type='checkbox' name='five_pieces' value='5 бр. в пакет' class='mini_inp_size'
                                   {{ str_contains($info, '5 бр. в пакет') ? 'checked' : '' }} id="five_pieces">
                            <label for="five_pieces" class='span_font'>5 бр. в пакет</label>
                            <input type='checkbox' name='ten_pieces' value='10 бр. в пакет' class='mini_inp_size'
                                   {{ str_contains($info, '10 бр. в пакет') ? 'checked' : '' }} id="ten_pieces">
                            <label for="ten_pieces" class='span_font'>10 бр. в пакет</label><br>
                        </div>
                        <br>
                        <input type="radio" name="size" value="2" {{$size == 2 ? 'checked' : ''}} id="slim">
                        <label for="slim">тънки</label>
                        <br>
                        <input type="radio" name="size" value="3" {{$size == 3 ? 'checked' : ''}} id="home">
                        <label for="home">за дома</label>
                        <div class='size hidden' style="display: block;">
                            <label class='label_font20' for='size'>Размери:</label>

                            <select class='label_font20' name='size_home' id='size'>
                                <option value='600900' {{$width == 600 && $height == 900 ? 'selected' : ''}}>
                                    600 x 900 (0.66)
                                </option>
                                <option value='7001050' {{$width == 700 && $height == 1050 ? 'selected' : ''}}>
                                    700 x 1050 големи(0.66)
                                </option>
                                <option value='3001000' {{$width == 300 && $height == 1000 ? 'selected' : ''}}>
                                    300 x 1000 цв. лъж. големи(0.33)
                                </option>
                                <option value='200900' {{$width == 200 && $height == 900 ? 'selected' : ''}}>
                                    200 x 900 лъжици малки(0.22)
                                </option>
                                <option value='600600' {{$width == 600 && $height == 600 ? 'selected' : ''}}>
                                    600 x 600 средни(1)
                                </option>
                            </select>
                        </div>
                        <div class='category'>
                            <input type="checkbox" name="bracelet" value="гривна" id="bracelet"
                                {{ str_contains($category, 'гривна') ? 'checked' : '' }}>
                            <label for="bracelet">гривна</label>
                            <br>
                            <input type="checkbox" name="lady" value="дамска" id="lady"
                                {{ str_contains($category, 'дамска') ? 'checked' : '' }}>
                            <label for="lady">дамска</label>
                            <br>
                            <input type="checkbox" name="kid" value="детска" id="kid"
                                {{ str_contains($category, 'детска') ? 'checked' : '' }}>
                            <label for="kid">детска</label>
                            <br>
                            <input type="checkbox" name="hanging" value="закачаща" id="hanging"
                                {{ str_contains($category, 'закачаща') ? 'checked' : '' }}>
                            <label for="hanging">закачаща</label>
                            <br>
                            <input type="checkbox" name="medallion" value="медальон" id="medallion"
                                {{ str_contains($category, 'медальон') ? 'checked' : '' }}>
                            <label for="medallion">медальон</label>
                        </div>
                    </div>
                    <label for="info">Информация:</label>
                    <input name="info" value="{{ $info }}" id="info">
                    <br>
                    <label for="quantity">Количество:</label>
                    <input name="quantity" placeholder="1бр." id="quantity">
                    <br>
                    <label for="gif">GIF</label>
                    <input type="checkbox" name="type" value="gif" {{$imgType == 'gif' ? 'checked' : ''}} id="gif">

                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Качи</button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>

<script>
    // за почвече бройки
    $(function () {
        $("input[type=radio]").change(function () {
            // Get the value of the currently changed radio button
            var val = $(this).val();

            $(this)
                .parent(".models")    // models									// Gets the parent div
                .find(".more")        // more									// Find the p element within the div
                .css("display", (val === '1') ? "block" : "none"); // square Show/Hide according to the radio value
            $(this)
                .parent(".models")    // models
                .find(".size")        // more									// Find the p element within the div
                .css("display", (val === "3") ? "block" : "none"); // square Show/Hide according to the radio value
            $(this)
                .parent(".models")
                .find(".category")
                .css("display", (val === "3") ? "none" : "block");

        });
    })

</script>

</html>
