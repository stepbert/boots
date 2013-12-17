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
	
	<ul>
	@foreach($components as $c)		
		<li>{{ $c['name'] }}</li>
	@endforeach
	</ul>

	@foreach($components as $c)
		<div class="component">
			<h1>{{ $c['name'] }}</h1>
			<div class="content">
				@include($c['view'])
			</div>
			<div class="controls">
				@if($c['controls']['php'])
					@include("boots.controls.{$c['name']}")
				@endif
			</div>
			<div class="page">
				@if($c['page']['php'])
					<a href="{{ URL::to("boots/{$c['name']}") }}">Standalone page</a>
				@endif
			</div>
		</div>
	@endforeach

@stop