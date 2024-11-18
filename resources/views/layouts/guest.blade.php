<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--css-->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">


<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>
    <div class="back-blue p-5 mp-5 login-page">
        @yield('content')
        <p class="text-center white-text mt-5 mt-20 copyright">&copy; [{{ date('Y') }}] Bot Services Ltd. All rights reserved.</p>

    </div>

</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
