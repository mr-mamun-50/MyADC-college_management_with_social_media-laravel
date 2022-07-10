{{-- @component('mail::message')
# Congratulations! Your admission has been confirmed.

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="bg-light">

    {{-- <div class="d-flex justify-content-center my-4">
        <img src="{{ asset('images/logos/logo.png') }}" alt="MyADC" style="width:150px">
    </div> --}}

    <div class="row d-flex justify-content-center">
        <div class="card col-12 col-lg-5 col-md-7">
            <div class="card-body">

                <br> Hi, {{ $name }}
                <p class="text-success" style="color: #198754; font-size:16px"> Your admission of Al-Emdad Degree
                    College has been <b>confirmed</b>.
                </p>
                <br>
                Note the following information - <br>
                <table class="table table-borderless table-hover mt-3" style="margin-top: 5px">
                    <tr>
                        <th style="text-align: left">Student ID</th>
                        <td>:</td>
                        <td>{{ $st_id }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: left">Session</th>
                        <td>:</td>
                        <td>{{ $session }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: left">Class</th>
                        <td>:</td>
                        <td>{{ $c_class }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: left">Group</th>
                        <td>:</td>
                        <td>{{ $department }}</td>
                    </tr>
                </table>
                <br><br>

                <div class="text-center">
                    Visit MyADC to get more information- <br>
                    <a href="{{ route('home') }}" class="btn btn-primary text-white">Go to MyADC</a>
                </div>
                <br>
                Thanks,<br>
                {{ config('app.name') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
