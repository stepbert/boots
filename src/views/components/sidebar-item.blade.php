<a class="list-group-item" href="#{{ $item['name'] }}">
	{{ $item['name'] }}
	@if($item['status'] != "0")									
		<span class="label label-{{ $colors[intval($item['color'])] }} pull-right">{{ $status[intval($item['status'])] }}</span>
	@endif
</a>