<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <style>
            body{
                text-align: center;
                background-image: url("../img/d-background.jpg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
                margin-top: 5px;
                padding: 85px;
                height: auto;
                text-align: center;
                background-color: #f5f5f0;
            }
            form {
                padding-bottom: 35px;
            }
        </style>
    </head>
    
    <body>
        <div id="padding-b">
        <h1 class="jumbotron"> Jurassic_Base - Admin Login </h1>
        <div class="col-xs-3"><br />
        <form method="post" action="login.php">
          Username:  <input class="form-control" type="text" name="username" ;/> <br>
          Password:  <input class="form-control" type="password" name="password"/> <br>
     
          <br>
          
          <input  class="btn btn-success" type="submit" value="Login">
        </form>
        <form action="../index.php">
             <input class="btn btn-info" type="submit" value="Back">
         </form>
     </div>
     </div>
     <br /><br />
    </body>
</html>