<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP User Auth Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="center">PHP User Authentication</h1>
        <h2 class="center">Now With AJAX</h2>
        <h2 class="center red-text darken-2" id="auth-error"></h2>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="username" type="text" name="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row right">
                    <button type ="button" id="sign-in" class="btn">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#sign-in').click(() => {
            console.log('sign in clicked')

            const dataToSend = {
                username: $('#username').val(),
                password: $('#password').val()
            };
            console.log(dataToSend)

            $.ajax({
                url: './db_auth_ajax.php',
                method: 'POST',
                data: dataToSend,
                dataType: 'JSON',
                success: resp => {
                    console.log(resp);
                    if(resp.success){
                        window.location.href ='./profile.php';
                    } else {
                        $('#auth-error').text(resp.error);
                    }
                }
            })
        })
    </script>
</body>
</html>