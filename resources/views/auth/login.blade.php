<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | REAL WEALTH </title>
    <link rel="shortcut icon" type="image/png" href="assets/images/mark.png">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    {{--  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">  --}}

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/sign.css">

</head>
<body class="hold-transition login-page sign-back">

    <div class="sign-over-back">  
        @include('sweetalert::alert')
    </div>
    <div class="login-dark">
        <form method="post" id="ajax-login-form">
            @csrf
            <h2 style='text-align: center'>REAL WEALTH</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" id='login-email'>
                <div id='login-email-error'></div>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" id='login-password'>
                <div id='login-password-error'></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
            <a href="/register" class="forgot">Do you register now?</a>
        </form>
    </div>






    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#ajax-login-form').submit(function (e) {
                e.preventDefault();
                sw = true;
                if($('#login-email').val().trim() === ''){
                    var element = $('#login-email');  
                    element.addClass('is-invalid');
                    sw = false;
                } else{
                    var element = $('#login-email');  
                    element.removeClass('is-invalid');
                }
                if($('#login-password').val().trim() === ''){
                    var element = $('#login-password');  
                    element.addClass('is-invalid');
                    sw = false;
                } else{
                    var element = $('#login-password');  
                    element.removeClass('is-invalid');
                }
                if(!sw) return;
                $.ajax({
                    type: 'POST',
                    url: '/login',
                    data: $(this).serialize(),
                    success: function (response) {
                        if(response.status){
                            window.location = response.redirect;
                        }
                        else{
                            if(response.email){
                                $('#login-email-error').html(response.email);
                                $('#login-email-error').css('display', 'block');
                            }
                            else{
                                $('#login-email-error').html('');
                                $('#login-email-error').css('display', 'none');
                            }
                            if(response.password){
                                $('#login-password-error').html(response.password);
                                $('#login-password-error').css('display', 'block');

                            }
                            else{
                                $('#login-password-error').html('');
                                $('#login-password-error').css('display', 'none');

                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>