<h3>Data Level</h3>
<table class="table table-sm table-hover">
	<tr>
		<th>No</th>
		<th>Level Name</th>
		<th>Description</th>
		<th>Status</th>
		<th>Option</th>
	</tr>
	<?php
	if ($levels) {
		$no = 1;
		foreach ($levels as $row) {
			echo '
				<tr>
					<td>'.$no.'</td>
					<td>'.$row->level_name.'</td>
					<td>'.$row->description.'</td>
					<td>'.$row->is_active.'</td>
					<td>
						<a href="#" class="btn btn-sm btn-warning"> Edit</a>
						<a href="#" class="btn btn-sm btn-danger"> Delete</a>
					</td>
				</tr>
			';

			$no++;
		}
	}
	?>
</table>