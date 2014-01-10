@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
//dd($path_to_assets);
?>

@section('js')

	@foreach($components as $c)

		@if($c['js'])
			{{ HTML::script("{$path_to_assets}js/boots/{$c['name']}.js") }}
		@endif

	@endforeach
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
					<a class="list-group-item active" href="{{ URL::to('boots') }}">Components</a>
					<a class="list-group-item" href="{{ URL::to('boots/designs') }}">Designs</a>
				</div>
			</div>
				
			@foreach($groups as $groupname => $gr)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>{{ $groupname }}</h2>
					</div>
					<div class="list-group">
						@foreach($gr as $c)
							<a class="list-group-item" href="#{{ $c['name'] }}">{{ $c['name'] }}</a>
						@endforeach
					</div>
				</div>
			@endforeach

			<?php /*
			<ul>
			@foreach($components as $c)		
				<li>{{ $c['name'] }}</li>
			@endforeach
			</ul>
			*/?>
		</div>
		<div class="main col-md-10 container">

		 	<?php
		 	#
		 	# Components
		 	#
		 	?>
			@foreach($groups as $groupname => $gr)
				
				@foreach($gr as $c)
					<div class="component">
						<a name="{{ $c['name'] }}"></a>
						<div class="page-header">
							<h1>
								{{ $c['name'] }}
								@if($c['page']['php'])
									<small><a href="{{ URL::to("boots/{$c['name']}") }}">Standalone page</a></small>
								@endif							
							</h1>
						</div>						
						<div class="content">
							@include($c['view'])
						</div>
						<?php /*
						<div class="controls">
							@if($c['controls']['php'])
								@include("boots.controls.{$c['name']}")
							@endif
						</div> */ ?>					
					</div>
				@endforeach
				
			@endforeach
		</div>

	</div>
</div>

@stop