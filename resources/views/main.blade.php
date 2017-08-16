<!DOCTYPE html>
<html lang="en">
<head>

@include('partials._head')

</head>

@include('partials._nav')

<body>

<div class="container">

    @include('partials._messages')


    {{ Auth::check()? "Logged In":"Logged out" }}

    @yield('content')

    @include('partials._footer')

</div> <!-- conteiner bitiş -->



@include('partials._javascripts')


@yield('scripts')

</body>
</html>