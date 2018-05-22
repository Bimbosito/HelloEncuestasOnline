<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Hello Survey</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap/css/bootstrap.css')}}"  >  
</head>
<body>
    
    <center><img class="imgIcon" src="{{ asset('images/login/logobn.png')}}"></center>
    
    <div class="container">
        {!! Form::open(['action' => 'UsuariosController@loginuser' ,'method'=>'POST']) !!}
        
        <div class="form-group">
    {!! Form::label('email','Correo electronico') !!}
    {!! Form::email('email',null,['class'=>'form-control' , 'placeholder' => 'example@gmail.com','required' => 'required']) !!}

        </div>
      <div class="form-group">
    {!! Form::label('contrasena','Contraseña') !!}
    {!! Form::password('contrasena',['class'=>'form-control' , 'placeholder' => '***********','required' => 'required']) !!}

        </div>


        <div class="form-group">
    {!! Form::submit('Acceder',['class'=>'btn btn-primary']) !!}
    
            </div>

        {!! Form::close() !!}

    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <center><span class="txtLight">¿No tienes cuenta?&nbsp;&nbsp;</span><button id="btnLight" type="button" class="btn btn-light">Registrate</button></center>
        </div><!-- Div Class Register -->
    </div>
     



    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
