<h3>Data User</h3>
<a href="<?php echo base_url() . 'user/add'?>" class="btn btn-success pull-right"> Tambah Data</a>
<table class="table table-sm table-hover">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Level</th>
		<th>Email</th>
		<th>Description</th>
		<th>Status</th>
		<th>Option</th>
	</tr>
	<?php
	if ($users) {
		$no = 1;
		foreach ($users as $row) {
			echo '
				<tr>
					<td>'.$no.'</td>
					<td>'.$row->username.'</td>
					<td>'.$row->level_id.'</td>
					<td>'.$row->email.'</td>
					<td>'.$row->description.'</td>
					<td>'.$row->is_active.'</td>
					<td>
						<a href="'.base_url('user/edit/' . $row->user_id).'" class="btn btn-sm btn-warning"> Edit</a>
						<a onclick="return confirm(\'Yakin hapus data user '.$row->username.' ?!\');" href="'.base_url('user/delete/' . $row->user_id).'" class="btn btn-sm btn-danger"> Delete</a>
					</td>
				</tr>
			';

			$no++;
		}
	}
	?>
</table>