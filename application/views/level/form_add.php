<h3>Tambah Data Level</h3>
<form action="<?php echo base_url() . 'level/simpan_data'?>" method="POST">
	<div class="form-group">
		<label for="level-name">Level Name :</label>
		<input type="text" class="form-control" id="level-name" name="level-name">
	</div>
	<div class="form-group">
		<label for="description">Description :</label>
		<textarea class="form-control" id="description" name="description"></textarea>
	</div>
	<div class="form-group">
		<label for="status">Status :</label>
		<input type="radio" name="status" value="Active"> Active 
		<input type="radio" name="status" value="Nonactive"> Nonactive
	</div>
	<div>
		<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
	</div>
</form>