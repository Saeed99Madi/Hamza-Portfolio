
<!DOCTYPE html>
<html lang="ar">
	<head>
		<meta charset="utf-8" />
		<title>Login Page 2 | Keenthemes</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link href="{{asset('login/login-2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('login/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('login/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('login/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{asset('login/favicon.ico')}}" />

        <style>
            @font-face {
    font-family: 'Cairo';
    src: url('{{asset('fonts/cairo/Cairo-Bold.woff2')}}') format('woff2'),
        url('{{asset('fonts/cairo/Cairo-Bold.woff')}}') format('woff');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Cairo';
            src: url('{{asset('fonts/cairo/Cairo-Light.woff2')}}') format('woff2'),
                url('{{asset('fonts/cairo/Cairo-Light.woff')}}') format('woff');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Cairo';
            src: url('{{asset('fonts/cairo/Cairo-Regular.woff2')}}') format('woff2'),
                url('{{asset('fonts/cairo/Cairo-Regular.woff')}}') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        .alert_msg{
            direction: rtl;
            text-align: right;
            margin-bottom: 0;
            padding-top: 20px;
        }
        *{
            font-family: 'Cairo';
        }
        </style>
     </head>
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		<div class="d-flex flex-column flex-root">
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
					<div class="d-flex flex-row-fluid flex-column justify-content-between">
						<div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
							<a href="#" class="mb-15 text-center">
								<img src="{{asset('login/logo-letter-1.png')}}" class="max-h-75px" alt="" />
							</a>
							<div class="login-form login-signin">
								<div class="text-center mb-10 mb-lg-20">
									<h2 class="font-weight-bold">{{__('login.signin')}}</h2>
									<p class="text-muted font-weight-bold">{{__('login.sign')}}</p>
								</div>
                                
                                <div class="alert_msg">
                                    @include("_msg")
                                </div>
                                
								<form action="{{route('login.post')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <div class="form-group py-3 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="{{__('login.email')}}" value='{{ old("email") }}' name="email" autocomplete="off" />
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
									<div class="form-group py-3 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="Password" value='{{ old("password") }}' placeholder="{{__('login.password')}}" name="password" />
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
								    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
										<div class="checkbox-inline">
											<label class="checkbox checkbox-outline m-0 text-muted">
											<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
											<span></span>{{__('login.RememberMe')}}</label>
										</div>
                                        @if (Route::has('password.request'))
										<a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">{{__('login.ForgotPassword')}}</a>
                                        @endif
									</div>
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
										<!--<div class="my-3 mr-2">
											<span class="text-muted mr-2">Don't have an account?</span>
											<a href="javascript:;" id="kt_login_signup" class="font-weight-bold">Signup</a>
										</div>-->
                                        <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">
                                              {{__('login.signinbtn')}}
                                        </button>
									</div>
								</form>
							</div>
						</div>
						<div class="d-flex flex-column-auto justify-content-between mt-15">
							<!--<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2021 Metronic</div>-->
							<!--<div class="d-flex order-1 order-sm-2 my-2">
								<a href="#" class="text-muted text-hover-primary">Privacy</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
							</div>-->
						</div>
					</div>
				</div>
				<div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url({{asset('login/bg-4.jpg')}});">
					<div class="d-flex flex-column-fluid flex-lg-center">
						<div class="d-flex flex-column justify-content-center">
							<h3 class="display-3 font-weight-bold my-7 text-white">{{__('login.welcome')}}</h3>
							<p class="font-weight-bold font-size-lg text-white opacity-80">
                            The ultimate Bootstrap, Angular 8, React &amp; VueJS admin theme 
							<br />framework for next generation web apps.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
