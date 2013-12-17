@extends('boots::layouts.main')

@section('js')

	@foreach($components as $c)

		@if($c['js'])
			<script type="text/javascript" src="{{ URL::asset('js/boots/'.$c['name'].'.js') }}"></script>
		@endif

		@if($c['controls']['js'])
			<script type="text/javascript" src="{{ URL::asset('js/boots/'.$c['name'].'-controls.js') }}"></script>
		@endif

	@endforeach
@stop

@section('body')
	
	<div id="boots">
		<div class="sidebar">
			
			@foreach($groups as $groupname => $gr)
				<h2>{{ $groupname }}</h2>
				<ul>
				@foreach($gr as $c)
					<li>{{ $c['name'] }}</li>
				@endforeach
				</ul>
			@endforeach
			<?php /*
			<ul>
			@foreach($components as $c)		
				<li>{{ $c['name'] }}</li>
			@endforeach
			</ul>
			*/?>
		</div>
		<div class="main">
			@foreach($groups as $groupname => $gr)
				
				@foreach($gr as $c)
					<div class="component">
						<h1>
							{{ $c['name'] }} 
							<span>
								@if($c['page']['php'])
									<a href="{{ URL::to("boots/{$c['name']}") }}">Standalone page</a>
								@endif							
							</span>
						</h1>
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

@stop