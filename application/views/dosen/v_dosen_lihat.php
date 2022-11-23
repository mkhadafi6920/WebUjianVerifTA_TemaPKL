    <!-- isi -->

    <div class="container m-5  ">
	<?php foreach($tampil as $data){ ?>


        <div class="mb-3">
			<label for="nidn" class="form-label">NIDN</label>
			<input type="number" value="<?php echo $data->nidn?>" name="nidn" class="form-control" id="nidn"disabled>
			<div id="nidn" class="form-text text-danger"><?php echo form_error('nidn'); ?></div>
		</div>

		<div class="mb-3">
			<label for="namadosen" class="form-label">NAMA DOSEN</label>
			<input type="text" value="<?php echo $data->nama_dosen?>" name="namadosen" class="form-control" id="namadosen"disabled>
			<div id="namadosen" class="form-text text-danger"><?php echo form_error('namadosen'); ?></div>
		</div>
	
		<a href="<?php echo base_url() ?> " class="btn btn-primary me-3">Kembali</a> 
        
        
	
	<?php } ?>
</div>
<!-- akhir isi -->
