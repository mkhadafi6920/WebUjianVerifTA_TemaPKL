<!-- isi -->

<div class="container m-5  ">

	<form class="mb-4" action="<?php echo base_url('c_mahasiswa/simpandata');?>" method="post">
		


	<div class="mb-3">
			<label for="nama" class="form-label">NPM</label>
			<input type="text" value="<?php echo set_value('npm'); ?>" name="npm" class="form-control" id="npm">
			<div id="npm" class="form-text text-danger"><?php echo form_error('npm'); ?></div>
		</div>
		<div class="mb-3">
			<label for="nama" class="form-label">Nama </label>
			<input type="text" value="<?php echo set_value('nama'); ?>" name="nama" class="form-control" id="nama">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>
		<div class="mb-3">
			<label for="Gender" class="form-label">Program Studi</label>
			<select id="prodi" name="prodi" class="form-select">
				<option value="">Pilih jenis</option>
				<?php foreach ($tampildata as $key) {
				?>	

		<option value="<?php echo $key->id_programstudi; ?>"><?php echo $key->program_studi; ?></option>

				<?php } ?>
				
		

			</select>
			<div id="gender" class="form-text text-danger"><?php echo form_error('prodi'); ?></div>
		</div>

		<div class="mb-3">
			<label for="nama" class="form-label">Alamat Tempat</label>
			<input type="text" value="<?php echo set_value('alamat'); ?>" name="alamat" class="form-control" id="alamat">
			<div id="alamat" class="form-text text-danger"><?php echo form_error('alamat'); ?></div>
		</div>
		<div class="mb-3">
			<label for="nama" class="form-label">No Handphone</label>
			<input type="text" value="<?php echo set_value('nohp'); ?>" name="nohp" class="form-control" id="nohp">
			<div id="nohp" class="form-text text-danger"><?php echo form_error('nohp'); ?></div>
		</div><div class="mb-3">
			<label for="nama" class="form-label">Tempat / Tanggal Lahir</label>
			<input type="text" value="<?php echo set_value('ttl'); ?>" name="ttl" class="form-control" id="ttl">
			<div id="ttl" class="form-text text-danger"><?php echo form_error('ttl'); ?></div>
		</div>

		

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
<!-- akhir isi -->

