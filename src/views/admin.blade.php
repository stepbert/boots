@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
?>

@section('js')

@stop

@section('body')

<?php
//dd($components);
?>

<div id="boots" class="">
	<div class="row">
		
		<div class="sidebar col-md-2">

			@include('boots::components/sidebar-head')
			@include('boots::components/sidebar-nav', array('active' => 'admin'))
				
		</div>
		<div class="main col-md-10 container">

			@if(isset($message))
				<div class="alert alert-success">{{ $message }}</div>
			@endif

			{{ Form::open() }}
				
				<h1>Designs</h1>
				{{-- Form::text('nb_designs', count($designs)) --}}

				<table class="table">
				@foreach($designs as $design)
					<?php
					$name = $design['name'];
					//dd($name);
					?>
					<tr>
						<td>
							{{ $name }}
							{{ Form::hidden('designs[]', $name) }}
						</td>
						<td>
							{{ Form::select("status[{$name}]", Config::get('boots::boots.tags_status'), intval($design['status'])) }}							
						</td>
						<td>
							{{ Form::select("color[{$name}]", Config::get('boots::boots.tags_colors'), intval($design['color'])) }}							
						</td>
					</tr>
				@endforeach
				</table>

				<h1>Components</h1>

				<table class="table">
				@foreach($components as $component)
					<?php
					//$component = $component_arr['name'];
					//dd($component);
					$name = $component['name'];
					?>
					<tr>
						<td>
							{{ $name }}
							{{ Form::hidden('components[]', $name) }}
						</td>
						<td>
							{{ Form::select("status[{$name}]", Config::get('boots::boots.tags_status'), intval($component['status'])) }}							
						</td>
						<td>
							{{ Form::select("color[{$name}]", Config::get('boots::boots.tags_colors'), intval($component['color'])) }}							
						</td>
					</tr>
				@endforeach
				</table>

				{{ Form::submit('Save', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}

		</div>

	</div>
</div>

@stop