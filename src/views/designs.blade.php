@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
//dd($path_to_assets);
?>

@section('js')

@stop

@section('body')

<div id="boots" class="">
	<div class="row">
		
		<div class="sidebar col-md-2">

			<div class="navbar navbar-default">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">{{ Config::get('boots::boots.title') }}</a>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="list-group">
					<a class="list-group-item" href="{{ URL::to('boots') }}">Components</a>
					<a class="list-group-item active" href="{{ URL::to('boots/designs') }}">Designs</a>
				</div>
			</div>
			
		</div>
		<div class="main col-md-10 container">

			<?php
		 	#
		 	# Designs
		 	#
		 	?>
		 	@if(count($designs) > 0)

		 		<h1>Designs</h1>

		 		<div class="row">
			 		
		 			@foreach($designs as $d)

		 				<div class="col-xs-6 col-md-3">
			 				<a href="{{ URL::to("boots/designs/{$d}") }}" class="thumbnail">
			 					<div class="caption">{{ $d }}</div>
						      	<img src="{{ URL::asset(Config::get('boots::boots.path_designs').$d.'.jpg') }}">
						    </a>
						</div>

			 		@endforeach
		
		 		</div>		 		

		 	@endif

		</div>

	</div>
</div>

@stop