<!-- isi -->

<div class="container m-5  ">

	<form class="mb-4" action="<?php echo base_url('c_pkl/simpanedit');?>" method="post">




		<div class="mb-3">
			<label for="mhs" class="form-label">Nama Mahasiswa</label>
			<input type="hidden" name="id" value="<?php echo $tampil->id_pkl ?>">
			<select id="mhs" name="mhs" class="form-select" >
				<option selected value="<?php echo $tampil->npm ?>"><?php echo $tampil->npm ?> - <?php echo $tampil->nama ?></option>
				



			</select>
			<div id="mhs" class="form-text text-danger"><?php echo form_error('mhs'); ?></div>
		</div>

		<div class="mb-3">
			<label for="tempat" class="form-label">Nama Tempat PKL</label>
			<select id="tempat" name="tempat" class="form-select" >
				<option value="<?php echo $tampil->id_tempat ?>"><?php echo $tampil->nama_tempat ?></option>
				<?php foreach ($tempat as $key) {
				?>

				<option value="<?php echo $key->id_tempat; ?>"><?php echo $key->nama_tempat; ?> </option>

				<?php } ?>



			</select>
			<div id="tempat" class="form-text text-danger"><?php echo form_error('tempat'); ?></div>
		</div>

		
		<div class="mb-3">
			<label for="dosen" class="form-label"> Dosen Pembimbing PKL</label>
			<select id="dosen" name="dosen" class="form-select" >
				<option value="<?php echo $tampil->nidn ?>"><?php echo $tampil->nama_dosen ?></option>
				<?php foreach ($dosen as $key) {
				?>

				<option value="<?php echo $key->nidn; ?>"><?php echo $key->nama_dosen; ?> </option>

				<?php } ?>



			</select>
			<div id="dosen" class="form-text text-danger"><?php echo form_error('dosen'); ?></div>
		</div>

		

		




<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
		<a href="<?php echo base_url('c_pkl') ?>" class="btn btn-info btn-[g">Kembali</a>
	</form>
</div>
<!-- akhir isi -->
