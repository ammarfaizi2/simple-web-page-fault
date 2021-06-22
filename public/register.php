<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="assets/css/loginregis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="http://fonts.cdnfonts.com/css/wildy-sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-column justify-content-center" id="login-box">
                        <div class="d-xl-flex justify-content-xl-center " style="margin: 42px;"><a style="font-size: 100px; font-family: 'Wildy Sans', sans-serif; color: black;">Kleren</a>
                        </div>
                        <hr style="width: 100%;margin-bottom: 3px;margin-top: 0px;">
                        <div class="login-box-header">
                            <h4 style="color: rgb(139,139,139);margin-bottom: 0px;font-weight: 400;font-size: 27px;font-family: 'Playfair Display', serif;">
                                Register</h4>
                        </div>
                        <div class="email-login" style="background-color:#ffffff;"><input type="text" class="email-imput form-control" style="margin-top:10px;" required="" placeholder="Username" minlength="6"><input type="email" class="email-imput form-control" style="margin-top:10px;" required="" placeholder="Email"
                                minlength="6"><input type="password" class="password-input form-control" style="margin-top:10px;" required="" placeholder="Password" minlength="6">
                            <select style="margin-top:10px;" class="custom-select">
                                <option selected>Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div class="input-group" id="datetimepicker1" style="margin-top: 10px; ">
                                <input style="background-color: #ffffff;" type="text" class="form-control" placeholder="Birthday" readonly>
                                <div class="input-group-addon input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><a class="btn btn-primary btn-block box-shadow" role="button" data-bss-hover-animate="pulse" id="submit-id-submit" style="background-color: #343A40;font-size: 20px;padding-top: 5px; margin-left: -1px;">Register</a>
                            <div class="d-flex justify-content-between">
                                <div class="form-check form-check-inline" id="form-check-rememberMe"><input class="form-check-input" type="checkbox" id="formCheck-1" for="remember" style="cursor:pointer;" name="check"><label class="form-check-label" for="formCheck-1"><span class="label-text">Agree to our Terms , Data Policy and Cookies Policy.<br></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center login-box-seperator-container">
                            <div class="login-box-seperator"></div>
                            <div class="login-box-seperator-text">
                                <p style="margin-bottom:0px;padding-left:10px;padding-right:10px;font-weight:400;color:rgb(201,201,201);">
                                    OR</p>
                            </div>
                            <div class="login-box-seperator"></div>
                        </div>
                        <div class="login-box-content">
                            <div data-bss-hover-animate="pulse" class="fb-login box-shadow"><a class="d-flex flex-row align-items-center social-login-link"><i class="fab fa-facebook-f"></i></i>Login
                                    With Facebook</a></div>
                            <div data-bss-hover-animate="pulse" class="gp-login box-shadow ago"><a class="d-flex flex-row align-items-center social-login-link"><i class="fab fa-google"></i>Login With Gmail</a></div>
                        </div>
                        <div class="d-flex d-xl-flex justify-content-xl-center" id="login-box-footer" style="padding: 10px 20px;padding-bottom: 78px;padding-top: 0px;"><a style="color: #ff8000;font-size: 20px;">Already have an account?</a><a href="login.php" style="color: #ff8000;font-size: 20px;">Sign in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
            $(function() {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    date: 'far fa-calendar',

                }
            });
        });

        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD',
                ignoreReadonly: true
            });
        });

        const submit = document.getElementById('submit-id-submit');
        submit.addEventListener('click', function() {
            Swal.fire({
                icon: 'success',
                title: 'Register Successful',
                html: '<p>You will be redirected in <span id="counter">3</span> second(s).</p>',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            })
        });

        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML) <= 0) {
                location.href = 'index.php';
            }
            if (parseInt(i.innerHTML) != 0) {
                i.innerHTML = parseInt(i.innerHTML) - 1;
            }
        }
        setInterval(function() {
            countdown();
        }, 1000);

    </script>

</body>

</html>