@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
//dd($path_to_assets);
$status = Config::get('boots::boots.tags_status');
$colors = Config::get('boots::boots.tags_colors');
?>

@section('js')

@stop

@section('body')

<div id="boots" class="">
	<div class="row">
		
		<div class="sidebar col-md-2">

			@include('boots::components/sidebar-head')
			@include('boots::components/sidebar-nav', array('active' => 'designs'))

			<div class="panel panel-default">
				<div class="list-group">
					@foreach($designs as $item)
						@include('boots::components/sidebar-item', array('item' => $item, 'status' => $status, 'colors' => $colors))
					@endforeach
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
			 				<a href="{{ URL::to("boots/designs/{$d['name']}") }}" class="thumbnail">
			 					<div class="caption">{{ $d['name'] }}</div>
						      	<img src="{{ URL::asset(Config::get('boots::boots.path_designs').$d['name'].'.jpg') }}">
						    </a>
						</div>

			 		@endforeach
		
		 		</div>		 		

		 	@endif

		</div>

	</div>
</div>

@stop