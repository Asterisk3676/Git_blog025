<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Vote</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/radio.css')}}">

    <script> var $url = {!! json_encode(url('/')) !!}; </script>

</head>

<body>

    <div class="container pt-5">

        <h1>Create Vote</h1>

        <form action="{{ url('/vote/' . $contents->id) }}" method="post">

            @csrf

            <div class="vote my-3">
                <div class="vote p-1"><h5>Content ID: {{ $contents->id }}</h5></div>
                <input type="radio" name="vote" id="like" value="1" checked>
                <label for="like">Like</label>

                <input type="radio" name="vote" id="dislike" value="0">
                <label for="dislike">Dislike</label>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger">Back</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
