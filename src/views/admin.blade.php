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

			@include('boots::components/sidebar-head')
			@include('boots::components/sidebar-nav', array('active' => 'admin'))
			
		</div>
		<div class="main col-md-10 container">

			<form role="form">

				<h1>Designs</h1>

				<table class="table">
					@foreach($designs as $design)
						<tr>
							<td>
								{{ $design }}
							</td>
							<td>
								<select name="tags">
									@foreach(Config::get('boots::boots.tags_status') as $idtag => $tag)
										<option value="{{ $idtag }}">{{ $tag }}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="tags">
									@foreach(Config::get('boots::boots.tags_color') as $idtag => $tag)
										<option value="{{ $idtag }}">{{ $tag }}</option>
									@endforeach
								</select>
							</td>
						</tr>
					@endforeach
				</table>

				<h1>Components</h1>

				...

				<div class="">
					<button type="submit" class="btn btn-default">Save</button>
				</div>

			</form>
		 	
		</div>

	</div>
</div>

@stop