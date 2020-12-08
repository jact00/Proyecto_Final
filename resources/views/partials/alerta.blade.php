@if(session()->has('mensaje-alerta'))
	<div class="alert alert-dismissible {{ session('tipo-alerta')}}">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<h4 class="alert-heading">{{ session('titulo-alerta')}}</h4>
  		<p class="mb-0">{{ session('mensaje-alerta')}}</p>
	</div>
@elseif($errors->any())
	<div class="alert alert-danger">
  		<h4 class="alert-heading"> Error en los datos!</h4>
  		<ul class="mb-0 list-unstyled">
  			@foreach($errors->all() as $error )
  			<li>{{ $error }}</li>
  			@endforeach
  		</ul>
	</div>
@endif