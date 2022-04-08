$(document).ready(function() {

    $(function() {
        $("#register-link").on('click', function() {

            $("#login-box").hide();
            $("#register-box").show();
        });

        $("#login-link").on('click', function() {

            $("#login-box").show();
            $("#register-box").hide();
        });
        $("#forgot-link").on('click', function() {

            $("#login-box").hide();
            $("#forgot-box").show();
        });

        $("#back-link").on('click', function() {

            $("#login-box").show();
            $("#forgot-box").hide();
        });

        $("#register-btn").on('click', function(e) {

            if ($('#register-form')[0].checkValidity()) {

                e.preventDefault();
                $('#register-btn').val('Please wait...');

                if ($('#rpassword').val() != $('#cpassword').val()) {
                    $('#passError').text("* Passwords did not match!");
                    $('#register-btn').val('Sign up')
                } else {
                    $('#passError').text("");

                    $.ajax({
                        type: "POST",
                        url: "action.php",
                        data: $("#register-form").serialize() + "&action=register",
                        success: function(response) {
                            console.log(response);
                            $('#register-btn').val('Sign up');
                            $('#regAlert').html(response);

                            if (response === 'register') {
                                window.location = '../index.php', true;
                            } else {
                                $('#regAlert').html(response);
                            }
                        }
                    });
                }
            }
        });

        $('#login-btn').on('click', function(e) {

            if ($('#login-form')[0].checkValidity()) {
                e.preventDefault();
                $('#login-btn').val('Please wait...');

                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $("#login-form").serialize() + "&action=login",
                    success: function(response) {
                        console.log(response);
                        $('#login-btn').val('Sign In');
                        $('#loginAlert').html(response);

                        if (response === 'login') {
                            window.location = '../demo-request.php', true;
                        } else {
                            $('#loginAlert').html(response);
                        }
                    }
                });
            }
        });


        $('#forgot-btn').on('click', function(e) {

            if ($('#forgot-form')[0].checkValidity()) {
                e.preventDefault();
                $('#forgot-btn').val('Please wait...');

                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $("#forgot-form").serialize() + "&action=forgot",
                    success: function(response) {
                        console.log(response);
                        $('#forgot-btn').val('Reset password');
                        $('#forgot-form')[0].reset();
                        $('#forgotAlert').html(response);

                        // if (response === 'login') {
                        //     window.location = 'home.php', true;
                        // } else {
                        //     $('#loginAlert').html(response);
                        // }
                    }
                });
            }
        });
    });
});