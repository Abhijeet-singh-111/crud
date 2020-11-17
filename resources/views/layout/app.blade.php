<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='{{asset("../datatable/datatables.min.css")}}' rel='stylesheet' />
    <link href='{{asset("../datatable/DataTables-1.10.22/images/sort_both.png")}}' rel='image' />
    <link href='{{asset("../datatable/DataTables-1.10.22/css/dataTables.jqueryui.css")}}' rel='stylesheet' />
    <link rel="stylesheet" href='{{asset("../fontawesome-free-5/css/all.min.css")}}'>
    <link href='{{asset("../css/style.css")}}' rel='stylesheet' />

</head>
<body>
    @unless(Auth::check())
    @include("layout.header")
    @endunless
<div class='container'>
    @include('layout.messages')
    @yield('content')
</div>
<script src='{{asset("../js/jquery-3.5.1.js")}}'></script>
<script src='{{asset("../datatable/datatables.min.js")}}'></script>
<script src='{{asset("../datatable/DataTables-1.10.22/js/dataTables.jqueryui.js")}}'></script>
<script src='{{asset("../fontawesome-free-5/js/all.min.js")}}'></script>
<script src='{{asset("../js/js-validation.js")}}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{'../js/cus.js'}}"></script>
</body>
</html>