<!-- isi -->

<div class="container m-5  ">

	<form class="mb-4" action="<?php echo base_url('c_prodi/simpandata');?>" method="post">
		



		<div class="mb-3">
			<label for="nama" class="form-label">Program Studi</label>
			<input type="text" value="<?php echo set_value('nama'); ?>" name="nama" class="form-control" id="nama">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>

		

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
<!-- akhir isi -->

