<script>
	$(document).ready(function() {
	    $("#table-level-ajax").DataTable();

	    //saat klik simpan
	    $("#btn-save-add-level").on("click", function () {
	    	//show loading & disable button
	    	$("#loading-add-level").show();
	    	//ajax kirim ke server
	    	$.ajax({
	    		url: "<?php echo base_url('ajaxlevel/simpan');?>",
	    		data: $("#form-add-level").serialize(),
	    		dataType: 'json',
	    		type: 'POST',
	    		success: function(result){
	    			//hide loding
	    			$("#loading-add-level").hide();
	    			//check berhasil / tidak
	    			if (result.code == 1) {
	    				//modal close atau redirect
	    				//alert('Simpan data berhasil');
	    				//clear input
	    				$("#level-name, #description").val('');
	    				//hide modal
	    				$("#modal-form-add-level").modal('hide');
	    				//refresh datatable (belum dibahas), sementara reload aja
	    				window.location = '<?php echo base_url('ajaxlevel');?>';
	    			} else {
	    				alert(result.msg);
	    			}
					
				},
				error: function () {
					$("#loading-add-level").hide();
					alert('Respon server error!');
				}
			});
	    	//jika berhasil / gagal maka ...
	    	return false;
	    });

	});
</script>