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
					<tr>
						<td>
							{{ $design }}
							{{ Form::text('designs[]', $design) }}
						</td>
						<td>
							<select name="status[{{ $design }}]">
								@foreach(Config::get('boots::boots.tags_status') as $idx => $status)
									<option value="{{ $idx }}">{{ $status }}</option>								
								@endforeach
							</select>
						</td>
						<td>
							<select name="colors[{{ $design }}]">
								@foreach(Config::get('boots::boots.tags_colors') as $idx => $colors)
									<option value="{{ $idx }}">{{ $colors }}</option>								
								@endforeach
							</select>
						</td>
					</tr>
				@endforeach
				</table>

				<h1>Components</h1>

				<table class="table">
				@foreach($components as $component_arr)
					<?php
					$component = $component_arr['name'];
					//dd($component);
					?>
					<tr>
						<td>
							{{ $component }}
							{{ Form::text('components[]', $component) }}
						</td>
						<td>
							<select name="status[{{ $component }}]">
								@foreach(Config::get('boots::boots.tags_status') as $idx => $status)
									<option value="{{ $idx }}">{{ $status }}</option>								
								@endforeach
							</select>
						</td>
						<td>
							<select name="colors[{{ $component }}]">
								@foreach(Config::get('boots::boots.tags_colors') as $idx => $colors)
									<option value="{{ $idx }}">{{ $colors }}</option>								
								@endforeach
							</select>
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