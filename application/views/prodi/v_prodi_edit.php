<!-- isi -->

<div class="container m-5  ">
	<?php foreach($tampil as $data){ ?>
	<form class="mb-4" action="<?php echo base_url('c_prodi/simpanedit');?>" method="post">
	



		<div class="mb-3">
			<label for="nama" class="form-label">Program Studi</label>
			<input type="text" value="<?php echo $data->program_studi?>" name="nama" class="form-control" id="nama">
            <input type="hidden" name="id" value="<?php echo $data->id_programstudi?>">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>

		

		<button type="submit" class="btn btn-primary me-3">Simpan</button>

        <a href="<?php echo base_url('c_prodi') ?> " class="btn btn-danger me-3">Batal edit</a> 
	</form>
	<?php } ?>
</div>
<!-- akhir isi -->
