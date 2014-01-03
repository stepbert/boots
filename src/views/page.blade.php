@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
//dd($path_to_assets);
?>

@section('js')

	{{-- External scripts:

	HTML::script('components/paper/dist/paper.js')

	--}}

	@if($component['js'])
		{{ HTML::script("{$path_to_assets}js/boots/{$component['name']}.js") }}
	@endif

	@if($component['controls']['js'])
		{{ HTML::script("{$path_to_assets}js/boots/{$component['name']}-controls.js") }}
	@endif

	@if($component['page']['js'])
		{{ HTML::script("{$path_to_assets}js/boots/{$component['name']}-page.js") }}
	@endif

	{{-- If needed overwrite page script declaration:
	<script type="text/paperscript" src="{{ URL::asset("{$path_to_assets}js/boots/{$component['name']}-page.js") }}" canvas="myCanvas"></script>
	 --}}

@stop

@section('body')
	
	<h1>{{ $component['name'] }}</h1>
	<div class="content">
		@include($component['view'])
	</div>
	<div class="controls">
		@if($component['controls']['php'])
			@include("boots.controls.{$component['name']}")
		@endif
	</div>
		
@stop