<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('dashboard_assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard_assets/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard_assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('dashboard_assets/css/starlight.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Ibrahim <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Web developer</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Enter your password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">

        </div><!-- form-group -->


        <button type="submit" class="btn btn-info btn-block mt-5">Sign Up</button>

        <div class="mg-t-40 tx-center">Already have an account? <a href="{{route('login')}}" class="tx-info">Sign In</a></div>
        </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('dashboard_assets/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('dashboard_assets/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('dashboard_assets/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('dashboard_assets/lib/select2/js/select2.min.js')}}"></script>
<script>
    $(function(){
        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>

</body>
</html{{asset('dashboard_assets')}}
