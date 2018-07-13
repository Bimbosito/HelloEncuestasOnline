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
        <center><span class="txtLight">¿No tienes cuenta?&nbsp;&nbsp;</span><a href="{{route('Usuarios.crear')}}"></><button id="btnLight" type="button" class="btn btn-light">Registrate</button></center>
            <center><a href="{{route('Usuarios.recuperar')}}">¿Olvidaste tu Contraseña?</a></center>
        </div><!-- Div Class Register -->
    </div>
</body>
</html>
