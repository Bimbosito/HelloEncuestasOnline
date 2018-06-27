<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Hello Survey</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}"  >  
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script type="text/javascript"></script>
</head>
<body>
    
    <center><img class="imgIcon" src="{{ asset('assets/images/login/logobn.png')}}"></center>
    
    <div class="container">
       
        
        <div class="form-group">
            <div style="font-size: 48px; color: white;">
                <p class="text-center">
                <center><h1 class="display-1">Tu Contraseña a sido enviada a tu correo<br>Revisa tu Bandeja de entrada</h1></p></center>
            </div>
            
            
    <br/>
    <div class="row">
        <div class="col-md-12">

            <center><button type="button" class="btn btn-succes"><a href="{{route('Usuarios.login')}}">Regresar</a></button></center>
        </div><!-- Div Class Register -->
    </div>
</body>
</html>
