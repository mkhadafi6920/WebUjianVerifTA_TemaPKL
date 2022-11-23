<!-- isi -->

<div class="container m-5  ">
	
	<form class="mb-4" action="<?php echo base_url('C_dosen/simpandata');?>" method="post">
		<div class="mb-3">

			<label for="nidn" class="form-label">NIDN</label>
     
			<input type="text" value="" name="nidn" class="form-control" id="nidn">
			<div id="nidn" class="form-text text-danger"><?php echo form_error('nidn'); ?></div>
		</div>



		<div class="mb-3">
			<label for="nama" class="form-label">NAMA Dosen</label>
			<input type="text" value="" name="nama" class="form-control" id="nama">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>

	
		<button type="submit" class="btn btn-primary me-3">Simpan</button>

        
	</form>

</div>
<!-- akhir isi -->
