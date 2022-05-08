<!DOCTYPE html>

<html lang="ar" dir="rtl" style="direction: rtl;">
	<head><base href="../../../">
		<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
        .me-n2 {
    margin-left: 1.5rem!important;
}
.end-0 {
     left: 0!important; 
}
        .close{
            float: left;
    border: none;
    margin-top: -12px;
    margin-left: -10px;
    font-size: 20pt;
    background: none;
        }
        .notEmpty{
            display:none;
        }
        [data-validator="notEmpty"]{
        display:none;
        }
        [data-validator="emailAddress"]{
        display:none;
        }
        </style>
    </head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/development-hd.png)">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--<a href="../../demo1/dist/index.html" class="mb-12">
						<img alt="Logo" src="assets/media/logos/logo-2-dark.svg" class="h-45px" />
					</a>-->
                    
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{route('client.login.post')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="text-center mb-10">
								<h1 class="text-dark mb-3">{{__('signup.signin')}}</h1>
								<div class="text-gray-400 fw-bold fs-4">{{__('signup.new')}}
								<a href="{{route('client.signup')}}" class="link-primary fw-bolder">{{__('signup.register')}}</a></div>
							</div>
                            <div class="alert_msg">
                                @include("_msg")
                            </div>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">{{__('signup.Email')}}</label>
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
                                @if ($errors->has('email'))
                                    <span class="fv-plugins-message-container invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">{{__('signup.Password')}}</label>
                                    
                                    <!--<a href="../../demo1/dist/authentication/flows/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>-->
								</div>
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                @if ($errors->has('password'))
                                        <span class="fv-plugins-message-container invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">{{__('signup.enter')}}</span>
									<!--<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>-->
								</button>
								<!--<div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
								<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
								<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
								<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>-->
							</div>
						</form>
					</div>
				</div>
				<!--<div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div>-->
			</div>
		</div>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		
		<script src="assets/js/custom/authentication/sign-in/general.js"></script>
		
	</body>
</html>
