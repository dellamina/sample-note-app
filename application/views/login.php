<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sample Note App</title>
    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="static/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="static/js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="static/js/materialize.min.js"></script>
    <style>
        .btn-block{
            width:100%;
        }
    </style>
</head>
<body class="grey darken-4">

<div class="container">
    
    <div class="row">
        <div class="col l6 s12 offset-l3 white z-depth-1" style="margin-top:8%;">
            <div class="col l12 center-align">
                <h2>Welcome to my</h2>
                <h4>Sample Note App</h4>

                <?php echo form_open(); ?> 

                    <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="username" type="text" required>
                        <label for="username">Username</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">fingerprint</i>
                        <input name="password" type="password" required>
                        <label for="password">Password</label>
                    </div>

                    <button class="btn btn-block waves-effect waves-light red" type="submit" name="action">Login
                        <i class="material-icons right">send</i>
                    </button>

                    <?php echo validation_errors(); ?>

                </form>

                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds costing you <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            </div>
        </div>
    </div>

</div>

</body>
</html>