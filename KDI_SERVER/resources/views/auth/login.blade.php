<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Authentification</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/icon.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="css/auth.css" type="text/css" />
    </head>
    <body>
        <div class="auth-main">
            <div class="auth-block">
                <h1 class="fontpacifico">Connectez-vous à KDI BackEND</h1>
                <a href="accueil.html" class="auth-link fontpacifico">Developpé par <strong>merdem GROUP</strong>!</a>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-2 fontpacifico"><strong class="text-white">Login</strong></label>
                        <div class="col-sm-10">
                            <div class="input-group" >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                <span class="input-group-btn" >
                                    <button class="btn btn-sm bg-empty no-borders btn-icon b-white b-2x" type="button" href="#" data-toggle="tooltip" data-placement="left" data-title="Email de l'utilisateur"><i class="fa fa-envelope text-white"></i></button>
                                </span>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-2 fontpacifico"><strong class="text-white">Password</strong></label>
                        <div class="col-sm-10">
                            <div class="input-group" >
                                <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                                <span class="input-group-btn" >
                                    <button class="btn btn-sm bg-empty no-borders btn-icon b-white b-2x" type="button" href="#" data-toggle="tooltip" data-placement="left" data-title="Mot de Passe de l'utilisateur"><i class="fa fa-edit text-white"></i></button>
                                </span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="checkbox" name="remember"> Session active
                            <a href="{{ url('/password/reset') }}" class="pull-right fontpacifico">Mot de passe oublié?</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default btn-auth fontpacifico "><i class="fa fa-sign-in"></i> <strong>Connexion</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>





