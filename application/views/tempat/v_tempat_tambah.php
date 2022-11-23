<!-- isi -->

<div class="container m-5  ">

	<form class="mb-4" action="<?php echo base_url('c_tempat/simpandata');?>" method="post">
		



		<div class="mb-3">
			<label for="nama" class="form-label">Nama Tempat</label>
			<input type="text" value="<?php echo set_value('nama'); ?>" name="nama" class="form-control" id="nama">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>

		<div class="mb-3">
			<label for="nama" class="form-label">Alamat Tempat</label>
			<input type="text" value="<?php echo set_value('alamat'); ?>" name="alamat" class="form-control" id="alamat">
			<div id="alamat" class="form-text text-danger"><?php echo form_error('alamat'); ?></div>
		</div>

		

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
<!-- akhir isi -->

