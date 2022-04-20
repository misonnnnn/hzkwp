<!DOCTYPE html>
<html>
<head>
  <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
  <title>New Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
  <div class="container-fluid">
    <img class = "mainLoginBackground" src="https://hezekiah.com.ph/public/images/slides/1.png">
    <img class="loginIcon" src="{{ url('/resources/icon2.png') }}">
    <p class="mainText">Welcome!</p>
    <p class="subText1">Hezekiah Accounting Services Co. </p>
    <span class="subText2">This is a prototype Web Based Company Tools for monitoring Purposes. </span>
  </div>
  <div class="container">
    <div class="loginFormOuter">
      <div class="loginFormDiv">
        <form method="POST" action="{{ route('login') }}">
      @csrf
      @if(!empty($accError))
         <div class="alert alert-danger"> {{ $accError }}</div>
      @endif
      @if(!empty($accCreated))
         <div class="alert alert-success"> {{ $accCreated }}</div>
      @endif
      @error('email')
            <span class="" role="alert" style="color:#700">
                <strong>{{ $message }}</strong>
            </span>
      @enderror

      @error('password')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
      @enderror
          <h4>LOGIN <i class="fa fa-user"></i></h4>
          <div class="form-group">
            <label>User email</label>
            <input id="email" type="email" class="form-control form-control-sm input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">         
          </div>
          <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control form-control-sm input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">  
          </div>

          <div class="form-group">
            <a href="{{ url('register') }}">Sign Up here</a>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary button" id="submit">Login</button>          
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<style type="text/css">
  body {
    background: #000;
    color:#fff;
  }
  .mainLoginBackground {
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100%;
    height: 100%;
    opacity: .5;
    z-index: -99;
  }
  .loginFormOuter {
    width: 400px;
    background: #fff;
    height: 100%;
    position: fixed;
    right: 0px;
    top: 0px;
    bottom:0px;
    color: #444;
  }
  .mainText{
    font-size: 4rem;
    margin:0px;
    margin-top: 10px;
    width: 100%;
    float: left;
  }
  .subText1 {
    float: left;
    width: 100%;
    margin:0px;
  }
  .subText2 {
    float: left;
    width: 100%;
    margin:0px;
    font-size: 13px;
  }
  .loginIcon {
    float: left;
    height: 200px;
    margin-top: 20px;
  }
  .loginFormDiv{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    padding:10px;
  }
  .loginFormDiv h4{

  }
</style>
