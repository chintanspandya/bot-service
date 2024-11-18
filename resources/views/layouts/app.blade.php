<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="/images/logo.ico">
<!--css-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
<link rel="stylesheet" href="css/menu.style.css">


<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>
    <!-- Unicons CSS -->
    <!-- partial:index.partial.html -->
    <header class="header back-blue" id="header">
        <nav class="navbar container">
            <a href="{{ route('home') }}" class="logo col-7"><img src="images/logo.png"></a>
            <div class="search">
                <form class="search-form">
                    <input type="text" name="search" class="search-input" placeholder="Search for Destinations"
                        >
                    <div type="submit" class="search-submit" disabled><i
                            class="uil uil-search search-icon  white-text"></i></div>
                </form>
            </div>
            @include('includes.menu')
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="text-center">
        <p class="text-center mt-5 mt-20 copyright">&copy; [{{ date('Y') }}] Bot Services Ltd. All rights reserved.</p>
    </footer>


</body>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>
