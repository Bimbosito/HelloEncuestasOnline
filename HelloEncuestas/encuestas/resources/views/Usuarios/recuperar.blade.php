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
</head>
<body>
    
    <center><img class="imgIcon" src="{{ asset('assets/images/login/logobn.png')}}"></center>
    
    <div class="container">

        {!! Form::open(['route' => 'Usuarios.restoremail' ,'method'=>'POST']) !!}
         
        <div class="form-group">
    {!! Form::label('email','Correo electronico') !!}
    {!! Form::email('email',null,['class'=>'form-control' , 'placeholder' => 'example@gmail.com','required' => 'required']) !!}

        </div>


        <div class="form-group">
    {!! Form::submit('Recuperar',['class'=>'btn btn-primary']) !!}
    
            </div>

        {!! Form::close() !!}

</body>
</html>
