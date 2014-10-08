<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('Location: expense.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Expense Manager</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
        <link rel="stylesheet" href="css/plugin.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />
        <!--[if lt IE 9]>
          <script src="js/ie/respond.min.js" cache="false"></script>
          <script src="js/ie/html5.js" cache="false"></script>
          <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
    </head>
    <body>
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
            <a class="nav-brand" href="index.html">expense</a>
            <div class="row m-n">
                <div class="col-md-4 col-md-offset-4 m-t-lg">
                    <section class="panel">
                        <header class="panel-heading text-center">
                            Sign in
                        </header>
                        <form id="formLogin" action="#" class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input id="username" type="email" placeholder="test@cybuzzsc.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input id="password" type="password" id="inputPassword" placeholder="Password" class="form-control">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Keep me logged in
                                </label>
                            </div>
                            <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
                            <button id="but_login" type="submit" class="btn btn-info">Sign in</button>
                            <button class="g-signin"
                                    data-scope="email"
                                    data-clientid="517448909767-akehruqh8gl7e2kkl622mh1kqvkdljav.apps.googleusercontent.com"
                                    data-callback="onSignInCallback"
                                    data-theme="dark"
                                    data-cookiepolicy="single_host_origin">
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer id="footer">
            <div class="text-center padder clearfix">
                <p>
                    <small>cyBuzz Expense Manager - Beta<br>&copy; cyBuzz SC </small>
                </p>
            </div>
        </footer>
        <!-- / footer -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.js"></script>
        <!-- app -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/app.data.js"></script>
        <script src="code/js/signin.js"></script>
        <script type="text/javascript">
            /**
             * Handler for the signin callback triggered after the user selects an account.
             */
            function onSignInCallback(resp) {
                gapi.client.load('plus', 'v1', apiClientLoaded);
            }

            /**
             * Sets up an API call after the Google API client loads.
             */
            function apiClientLoaded() {
                gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
            }

            /**
             * Response callback for when the API client receives a response.
             *
             * @param resp The API response object with the user email and profile information.
             */
            function handleEmailResponse(resp) {
                var primaryEmail;
                for (var i = 0; i < resp.emails.length; i++) {
                    if (resp.emails[i].type === 'account')
                        primaryEmail = resp.emails[i].value;
                }
               alert(primaryEmail);
            }

        </script>

    </body>
</html>