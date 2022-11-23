<!-- isi -->

<div class="container m-5  ">

	<form class="mb-4" action="<?php echo base_url('c_pkl/simpandata');?>" method="post">




		<div class="mb-3">
			<label for="mhs" class="form-label">Pilih Mahasiswa</label>
			<select id="mhs" name="mhs" class="form-select">
				<option value="">Pilih Mahasiswa</option>
				<?php foreach ($mahasiswa as $key) {
				?>

				<option value="<?php echo $key->npm; ?>"><?php echo $key->npm; ?> - <?php echo $key->nama; ?> </option>

				<?php } ?>



			</select>
			<div id="mhs" class="form-text text-danger"><?php echo form_error('mhs'); ?></div>
		</div>

		<div class="mb-3">
			<label for="tempat" class="form-label">Pilih Tempat PKL</label>
			<select id="tempat" name="tempat" class="form-select">
				<option value="">Pilih Tempat</option>
				<?php foreach ($tempat as $key) {
				?>

				<option value="<?php echo $key->id_tempat; ?>"><?php echo $key->nama_tempat; ?> </option>

				<?php } ?>



			</select>
			<div id="tempat" class="form-text text-danger"><?php echo form_error('tempat'); ?></div>
		</div>

		
		<div class="mb-3">
			<label for="dosen" class="form-label">Pilih dosen Pembimbing PKL</label>
			<select id="dosen" name="dosen" class="form-select">
				<option value="">Pilih Dosen</option>
				<?php foreach ($dosen as $key) {
				?>

				<option value="<?php echo $key->nidn; ?>"><?php echo $key->nama_dosen; ?> </option>

				<?php } ?>



			</select>
			<div id="dosen" class="form-text text-danger"><?php echo form_error('dosen'); ?></div>
		</div>

		

		





		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
<!-- akhir isi -->
