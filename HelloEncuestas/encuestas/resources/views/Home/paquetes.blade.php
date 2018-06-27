@extends('layouts.menu')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<center><h1>Paquetes a tu medida</h1></center><br>
                <center><h5>Los planes de hello survey te dan el poder de escorger<br>
                    control y personalizacion a tus necesidades.</h5></center>
			</div>
		</div>
        
        
        
        
        <div class="row">
  <div class="col-sm-6 col-md-4 col-xs-8">
    <div class="thumbnail">
        <br>
      <img src="{{asset('assets/images/paquetes/2.jpg')}}" alt="">
      <div class="caption">
        <h3>BASICO</h3>
      </div>
    </div><br><br>
            </div>
            <div class="col-sm-6 col-md-4 col-xs-8">
      <div class="thumbnail">
      <img src="{{asset('assets/images/paquetes/1.jpeg')}}" alt="">
      <div class="caption">
        <h3>PREMIUM</h3>
    <p>     </p>

      </div>
    </div>
            </div>
      <div class="col-sm-6 col-md-4 col-xs-8">
      <div class="thumbnail">
          <br>
      <img src="{{asset('assets/images/paquetes/3.jpg')}}" alt="">
      <div class="caption">
        <h3>EMPRESARIAL</h3>
      </div>
    </div>
      
  </div>
            
</div>
</div>
@endsection