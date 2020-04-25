
<!-- footer -->
		<p class="footer">
			<br>
			<hr>
			<div class="text-center text-muted">
				&copy; 2020 AABC Team - All rights reserverd.
			</div>
		</p>
	</div>		

	<!-- jquery -->
	<script type="text/javascript" src="<?php echo base_url().'asset/js/jquery-3.4.1.slim.min.js'?>"></script>
	<!-- popper -->
	<script type="text/javascript" src="<?php echo base_url().'asset/js/popper.min.js'?>"></script>
	<!-- bootstrap -->
	<script type="text/javascript" src="<?php echo base_url().'asset/bootstrap/dist/js/bootstrap.min.js'?>"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="<?php echo base_url().'asset/DataTables/js/jquery.dataTables.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'asset/DataTables/js/dataTables.bootstrap4.min.js';?>"></script>
	<?php
	/*dynamic js from controller*/
	if (isset($extra_js)) {
		echo $extra_js;
	}

	?>
</body>
</html>