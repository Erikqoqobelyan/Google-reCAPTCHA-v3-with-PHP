<!DOCTYPE html>
<html>
    <head>
        <title>Google reCAPTCHA V3</title>
    </head>
    <body>
        <form type="post" id="login-form" action="/submit.php">
            <input type="email" name="email" required>
            <input type="password" name="password" required>
            <input type="hidden" name="googlerecaptcha" id="googlerecaptcha" required>
            <button type="submit" id="submit-contact-form">Login</button>
        </form>
        <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '#submit-contact-form', function (e) {
                    e.preventDefault();
                    grecaptcha.ready(function() {
                        grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
                            $('#googlerecaptcha').val(token);
                            $('#contact-form').submit();
                        });
                    });
                });
            });
        </script>
    </body>
</html>
