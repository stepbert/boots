@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
?>

@section('js')

@stop

@section('body')

<div id="boots" class="">
	<div class="row">
		
		<div class="sidebar col-md-2">

			@include('boots::components/sidebar-head')
			@include('boots::components/sidebar-nav', array('active' => 'admin'))
				
		</div>
		<div class="main col-md-10 container">

			<table class="table">
			@foreach($designs as $design)
				<tr>
					<td>
						{{ $design }}
					</td>
					<td>
						<select name="status">
							@foreach(Config::get('boots::boots.tags_status') as $idx => $status)
								<option value="{{ $idx }}">{{ $status }}</option>								
							@endforeach
						</select>
					</td>
					<td>
						<select name="colors">
							@foreach(Config::get('boots::boots.tags_colors') as $idx => $colors)
								<option value="{{ $idx }}">{{ $colors }}</option>								
							@endforeach
						</select>
					</td>
				</tr>
			@endforeach
			</table>

		</div>

	</div>
</div>

@stop