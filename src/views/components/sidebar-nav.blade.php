<div class="panel panel-default">
	<div class="list-group">
		<?php 		
		$class_active = $active == 'components' ? 'active' : '';
		?>
		<a class="list-group-item {{ $class_active }}" href="{{ URL::to('boots') }}">
			<span class="badge pull-right">{{ count($components) }}</span>
			Components
		</a>
		<?php 		
		$class_active = $active == 'designs' ? 'active' : '';
		?>
		<a class="list-group-item {{ $class_active }}" href="{{ URL::to('boots/designs') }}">
			<span class="badge pull-right">{{ count($designs) }}</span>
			Designs
		</a>
		<?php 		
		$class_active = $active == 'admin' ? 'active' : '';
		?>
		<a class="list-group-item {{ $class_active }}" href="{{ URL::to('boots/admin') }}">
			
			Admin
		</a>
	</div>
</div>
