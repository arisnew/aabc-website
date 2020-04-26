<h3>Data Level <small>AJAX</small></h3>
<a href="#" data-toggle="modal" data-target="#modal-form-add-level" class="btn btn-success pull-right"> Tambah Data</a>

<table id="table-level-ajax" class="table table-sm table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Level Name</th>
			<th>Description</th>
			<th>Status</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
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
						<a href="'.base_url('level/edit/' . $row->level_id).'" class="btn btn-sm btn-warning"> Edit</a>
						<a onclick="return confirm(\'Yakin hapus data level '.$row->level_name.' ?!\');" href="'.base_url('level/delete/' . $row->level_id).'" class="btn btn-sm btn-danger"> Delete</a>
					</td>
				</tr>
				';

				$no++;
			}
		}
		?>
	</tbody>

</table>

<!-- modal -->
<div class="modal fade" id="modal-form-add-level" tabindex="-1" role="dialog" 
	aria-labelledby="formAddModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formAddModalLabel">Tambah Data Level</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-add-level" method="POST">
					<div id="loading-add-level" class="text-center" style="display: none;">
						<img src="<?php echo base_url('asset/images/ajax-loader.gif');?>">
					</div>
					<div class="form-group">
						<label for="level-name">Level Name :</label>
						<input type="text" class="form-control" id="level-name" name="level-name" required="">
					</div>
					<div class="form-group">
						<label for="description">Description :</label>
						<textarea class="form-control" id="description" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="status">Status :</label>
						<input type="radio" name="status" value="Active" checked=""> Active 
						<input type="radio" name="status" value="Nonactive"> Nonactive
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="btn-save-add-level" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>