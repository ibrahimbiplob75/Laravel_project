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


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('dashboard_assets/css/starlight.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Ibrahim <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60"></div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
            <input type="text" name="email" class="form-control" value="{{ old('email') }}"  placeholder="Enter your Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->

            <div class="form-group">
            <input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Enter your password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group center">
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                </div>

        </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block mt-5">Sign In</button>

            <div class="mt-2 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
        </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('dasboard_assets/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('dasboard_assets/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('dasboard_assts/lib/bootstrap/bootstrap.js')}}"></script>

</body>
</html>



