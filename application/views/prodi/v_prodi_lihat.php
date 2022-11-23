    <!-- isi -->

    <div class="container m-5  ">
	<?php foreach($tampil as $data){ ?>

		<div class="mb-3">

			<label for="npm" class="form-label">Program Studi</label>
         
			<input type="text" value="<?php echo $data->program_studi?>" name="nama" class="form-control" id="nama" disabled>
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>



		

		<a href="<?php echo base_url('c_prodi') ?> " class="btn btn-primary me-3">Kembali</a> 
        
        
        
	
	<?php } ?>
</div>
<!-- akhir isi -->
