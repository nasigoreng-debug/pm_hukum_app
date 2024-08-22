<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Register</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/xenon-core.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/xenon-components.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="{{ asset('template')}}/assets/css/custom.css">
    <link rel="shortcut icon" href="{{{ asset('favicon/favicon.ico') }}}">

    <script src="{{ asset('template')}}/assets/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>

<body class="page-body login-page login-light">


    <div class="login-container">

        <div class="row">

            <div class="col-sm-6">

                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        // Reveal Login form
                        setTimeout(function() {
                            $(".fade-in-effect").addClass('in');
                        }, 1);


                        // Validation and Ajax action
                        $("form#login").validate({
                            rules: {
                                username: {
                                    required: true
                                },

                                passwd: {
                                    required: true
                                }
                            },

                            messages: {
                                username: {
                                    required: 'Please enter your username.'
                                },

                                passwd: {
                                    required: 'Please enter your password.'
                                }
                            },

                            // Form Processing via AJAX
                            submitHandler: function(form) {
                                show_loading_bar(70); // Fill progress bar to 70% (just a given value)

                                var opts = {
                                    "closeButton": true,
                                    "debug": false,
                                    "positionClass": "toast-top-full-width",
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };

                                $.ajax({
                                    url: "data/login-check.php",
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {
                                        do_login: true,
                                        username: $(form).find('#username').val(),
                                        passwd: $(form).find('#passwd').val(),
                                    },
                                    success: function(resp) {
                                        show_loading_bar({
                                            delay: .5,
                                            pct: 100,
                                            finish: function() {

                                                // Redirect after successful login page (when progress bar reaches 100%)
                                                if (resp.accessGranted) {
                                                    window.location.href = 'dashboard-1.html';
                                                }
                                            }
                                        });


                                        // Remove any alert
                                        $(".errors-container .alert").slideUp('fast');


                                        // Show errors
                                        if (resp.accessGranted == false) {
                                            $(".errors-container").html('<div class="alert alert-danger">\
												<button type="button" class="close" data-dismiss="alert">\
													<span aria-hidden="true">&times;</span>\
													<span class="sr-only">Close</span>\
												</button>\
												' + resp.errors + '\
											</div>');


                                            $(".errors-container .alert").hide().slideDown();
                                            $(form).find('#passwd').select();
                                        }
                                    }
                                });

                            }
                        });

                        // Set Form focus
                        $("form#login .form-group:has(.form-control):first .form-control").focus();
                    });
                </script>

                <!-- Errors container -->
                <div class="errors-container">


                </div>

                <!-- Add class "fade-in-effect" for login form effect -->
                <form method="POST" action="{{ route('register') }}" class="login-form fade-in-effect">
                    @csrf
                    <div class="login-header">
                        <a href="#" class="logo">
                            <h3>Register</h3>
                        </a>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block text-left">
                            <i class="fa-lock"></i>
                            {{ __('Register') }}
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>



    <!-- Bottom Scripts -->
    <script src="{{ asset('template')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('template')}}/assets/js/TweenMax.min.js"></script>
    <script src="{{ asset('template')}}/assets/js/resizeable.js"></script>
    <script src="{{ asset('template')}}/assets/js/joinable.js"></script>
    <script src="{{ asset('template')}}/assets/js/xenon-api.js"></script>
    <script src="{{ asset('template')}}/assets/js/xenon-toggles.js"></script>
    <script src="{{ asset('template')}}/assets/js/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ asset('template')}}/assets/js/toastr/toastr.min.js"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('template')}}/assets/js/xenon-custom.js"></script>

</body>

</html>