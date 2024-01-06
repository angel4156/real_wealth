<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Andis Dev</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/mark.png">

    {{-- <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/sign.css">

</head>

<body class="hold-transition register-page sign-back">
    <div class="sign-over-back">
        @include('sweetalert::alert')
    </div>
    <div class="login-dark">
        <form method="post" id="ajax-signup-form">
            @csrf
            <h2 style='text-align: center'>REAL WEALTH</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="User Name" id='signup-name'>
                <div id='signup-name-error'></div>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email"  id='signup-email'>
                <div id='signup-email-error'></div>
            </div>
            <div class="form-group" >
                <input class="form-control" type="password" name="password" placeholder="Password" id='signup-password'>
                <div id='signup-password-error'></div>
            </div>
            <div class="form-group" >
                <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" id='signup-cpassword'>
                <div id='signup-cpassword-error'></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
        </form>
    </div>


{{--  

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Real</b> Wealth</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form class="needs-validation" novalidate action="/register" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Full name" value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="passwordConfirm" id="passwordConfirm"
                            class="form-control @error('passwordConfirm') is-invalid @enderror"
                            placeholder="Retype password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('passwordConfirm')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>
                <a href="/login" class="text-center">I already have a membership</a>
            </div>

        </div>
    </div>  --}}


    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="/assets/dist/js/adminlte.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
            $(document).ready(function () {
                $('#ajax-signup-form').submit(function (e) {
                    e.preventDefault();
                    sw = true;
                    if($('#signup-name').val().trim() === ''){
                        var element = $('#signup-name');  
                        element.addClass('is-invalid');
                        sw = false;
                    } else{
                        var element = $('#signup-name');  
                        element.removeClass('is-invalid');
                    }
                    if($('#signup-email').val().trim() === ''){
                        console.log('invalid')
                        var element = $('#signup-email');  
                        element.addClass('is-invalid');
                        sw = false;
                    } else{
                        var element = $('#signup-email');  
                        element.removeClass('is-invalid');
                    }
                    if($('#signup-password').val().trim() === ''){
                        var element = $('#signup-password');  
                        element.addClass('is-invalid');
                        sw = false;
                    } else {
                        var element = $('#signup-password');  
                        element.removeClass('is-invalid');
                    }
                    if($('#signup-cpassword').val().trim() === '' 
                    || $('#signup-cpassword').val().trim() !== $('#signup-password').val().trim() ){
                        var element = $('#signup-cpassword');  
                        element.addClass('is-invalid');
                        sw = false;
                    } else {
                        var element = $('#signup-cpassword');  
                        element.removeClass('is-invalid');
                    }
                    if(!sw) return;
                    $.ajax({
                        type: 'POST',
                        url: '/register',
                        data: $(this).serialize(),
                        success: function (response) {
                            if(response.status){
                                window.location = response.redirect;
                            }
                        },
                        error: function(xhr, status, error) {
                            if (status === 'timeout') {
                              alert('The request timed out. Please try again later.');
                            } else if (status === 'error') {
                                const errors = xhr.responseJSON.errors;
                                if(errors.name){
                                    $('#signup-name-error').html(errors.name[0]);
                                    $('#signup-name-error').css('display', 'block');
                                }
                                else{
                                    $('#signup-name-error').html('');
                                    $('#signup-name-error').css('display', 'none');
                                }
                                if(errors.email){
                                    $('#signup-email-error').html(errors.email[0]);
                                    $('#signup-email-error').css('display', 'block');
                                }
                                else{
                                    $('#signup-email-error').html('');
                                    $('#signup-email-error').css('display', 'none');
                                }
                                if(errors.password){
                                    $('#signup-password-error').html(errors.password[0]);
                                    $('#signup-password-error').css('display', 'block');
                                }
                                else{
                                    $('#signup-password-error').html('');
                                    $('#signup-password-error').css('display', 'none');
                                }
                                if(errors.cpassword){
                                    $('#signup-cpassword-error').html(errors.cpassword[0]);
                                    $('#signup-cpassword-error').css('display', 'block');
                                }
                                else{
                                    $('#signup-cpassword-error').html('');
                                    $('#signup-cpassword-error').css('display', 'none');
                                }
                            } else if (status === 'parsererror') {
                              alert('Error parsing JSON response.');
                            }
                          },
                    });
                    
                });
            });
    </script>
</body>

</html>
