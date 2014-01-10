@extends('boots::layouts.main')

<?php
$path_to_assets = Config::get('boots::boots.path_assets');
//dd($path_to_assets);
?>

@section('js')

@stop

@section('body')
	
	<img src="{{ URL::asset(Config::get('boots::boots.path_designs').$design.'.jpg') }}" />

@stop