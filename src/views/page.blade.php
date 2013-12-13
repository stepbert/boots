@extends('bootstrap::layouts.main')

@section('js')

	{{-- External scripts:

	HTML::script('components/paper/dist/paper.js')

	--}}

	@if($component['js'])
		{{ HTML::script("js/bootstrap/{$component['name']}.js") }}
	@endif

	@if($component['controls']['js'])
		{{ HTML::script("js/bootstrap/{$component['name']}-controls.js") }}
	@endif

	@if($component['page']['js'])
		{{ HTML::script("js/bootstrap/{$component['name']}-page.js") }}
	@endif

	{{-- If needed overwrite page script declaration:
	<script type="text/paperscript" src="{{ URL::asset("js/bootstrap/{$component['name']}-page.js") }}" canvas="myCanvas"></script>
	 --}}

@stop

@section('body')
	
	<h1>{{ $component['name'] }}</h1>
	<div class="content">
		@include($component['view'])
	</div>
	<div class="controls">
		@if($component['controls']['php'])
			@include("bootstrap.controls.{$component['name']}")
		@endif
	</div>
		
@stop