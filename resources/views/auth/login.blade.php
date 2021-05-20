<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="login.css">


    <style type="text/css">
    body {
  background: #000;
}
.main-content{
  width: 50%;
  border-radius: 3px;
  box-shadow: 0 5px 5px rgba(0,0,0,.4);
  margin: 5em auto;
  display: flex;
}
.company__info{
  background-color: #59abc3;
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: #fff;

}
.company__info > img {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
}
.fa-cubes{
  font-size:3em;
  color:#fff;
  z-index: 99;
  position: absolute;
  top: 10px;
  right: 0px;
}
.company_title{
z-index: 99;
  position: absolute;
  bottom: 0px;
  left: 10px;
}
@media screen and (max-width: 640px) {
  .main-content{width: 90%;}
  .company__info{
    display: none;
  }
  .login_form{
    border-top-left-radius:3px;
    border-bottom-left-radius:3px;
  }
}
@media screen and (min-width: 642px) and (max-width:800px){
  .main-content{width: 70%;}
}
.row > h2{
  color:#59abc3;
}
.login_form{
  background-color: #fff;
  border-top-right-radius:3px;
  border-bottom-right-radius:3px;
  border-top:1px solid #ccc;
  border-right:1px solid #ccc;
}
form{
  padding: 0 2em;
}
.form__input{
  width: 100%;
  border:0px solid transparent;
  border-radius: 0;
  border-bottom: 1px solid #aaa;
  padding: 1em .5em .5em;
  padding-left: 2em;
  outline:none;
  margin:1.5em auto;
  transition: all .5s ease;
}
.form__input:focus{
  border-bottom-color: #59abc3;
  box-shadow: 0 0 5px rgba(0,80,80,.4); 
  border-radius: 4px;
}
.btn{
  transition: all .5s ease;
  width: 70%;
  border-radius: 3px;
  color:#59abc3;
  font-weight: 600;
  background-color: #fff;
  border: 1px solid #59abc3;
  margin-top: 1.5em;
  margin-bottom: 1em;
}
.btn:hover, .btn:focus{
  background-color: #59abc3;
  color:#fff;
}
.login_bg {
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom:0px;
  width: 100%;
  z-index: -99;
  background: #000;
  filter: brightness(50%);
}
.login_bg2 {
  position: fixed;
  left: 0px;
  right: 0px;
  bottom:0px;
  width: 100%;
  z-index: -999;
  background: #000;
  filter: brightness(50%);
}




/*loading*/
body {
  font-family: Montserrat;
}

.loading_wrap {
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  width: 100%;
  height: 100%;
  background:#fff;
  z-index: 99;
}
.loading{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}

.text {
  color: #fbae17;
  display: inline-block;
  margin-left: 5px;
}

.bounceball {
  position: relative;
  display: inline-block;
  height: 37px;
  width: 15px;
}
.bounceball:before {
  position: absolute;
  content: "";
  display: block;
  top: 0;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background-color: #fbae17;
  transform-origin: 50%;
  -webkit-animation: bounce 500ms alternate infinite ease;
          animation: bounce 500ms alternate infinite ease;
}

@-webkit-keyframes bounce {
  0% {
    top: 30px;
    height: 5px;
    border-radius: 60px 60px 20px 20px;
    transform: scaleX(2);
  }
  35% {
    height: 15px;
    border-radius: 50%;
    transform: scaleX(1);
  }
  100% {
    top: 0;
  }
}

@keyframes bounce {
  0% {
    top: 30px;
    height: 5px;
    border-radius: 60px 60px 20px 20px;
    transform: scaleX(2);
  }
  35% {
    height: 15px;
    border-radius: 50%;
    transform: scaleX(1);
  }
  100% {
    top: 0;
  }
}

.loginbtn-clicked {
}
</style>
</head>
    
<body>
    


    <img src="https://hezekiah.com.ph/public/images/slides/3.png" class="login_bg">
    <img src="https://hezekiah.com.ph/public/images/slides/1.png" class="login_bg2">
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <img src="{{ asset('resources/company_bg.jpg') }}">
                <span class="company__logo"><h2><span class="fa fa-cubes"></span></h2></span>
                <h4 class="company_title">HZK Web Portal</h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2><i class="fa fa-user"></i> Log In</h2>
                    </div>
                    <div class="row">
   
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:#700">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="row">
                                <input id="email" type="email" class=" form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                
                            </div>
                            <div class="row">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember_me">Remember Me!</label>
                            </div>
                            <div class="row">
                                <input type="submit" value="Submit" class="btn loginbtn">
                                @if (Route::has('password.request'))
                                    <a class="#" href="{{ route('password.request') }}" style="width: 100%;float:left">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p>Don't have an account? <a href="#">Register Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- <div class="container-fluid text-center footer">
        Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p>
    </div> -->

    








</body>

</html>



<!-- <script>
$('body').append('<div class="loading_wrap">'
      +'<div class="loading">'
        +'<div class="bounceball"></div>'
        +'<div class="text">NOW LOADING</div>'
      +'</div>'
    +'</div>');
$(window).on('load', function(){
  setTimeout(removeLoader, 1500); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( ".loading_wrap" ).fadeOut(500, function() {
      // fadeOut complete. Remove the loading div
      $( ".loading_wrap" ).remove(); //makes page more lightweight 
  });  
}
</script> -->



