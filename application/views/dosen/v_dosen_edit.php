<!-- isi -->

<div class="container m-5  ">
	<?php foreach($tampil as $data){ ?>
	<form class="mb-4" action="<?php echo base_url('C_dosen/simpanedit');?>" method="post">
		<div class="mb-3">

			<label for="nidn" class="form-label">NIDN</label>
           <input type="hidden" name="id" value="<?php echo $data->nidn?>">
			<input type="text" value="<?php echo $data->nidn?>" name="nidn" class="form-control" id="nidn">
			<div id="nidn" class="form-text text-danger"><?php echo form_error('nidn'); ?></div>
		</div>



		<div class="mb-3">
			<label for="nama" class="form-label">NAMA Dosen</label>
			<input type="text" value="<?php echo $data->nama_dosen?>" name="nama" class="form-control" id="nama">
			<div id="nama" class="form-text text-danger"><?php echo form_error('nama'); ?></div>
		</div>

	
		<button type="submit" class="btn btn-primary me-3">Simpan</button>

        <a href="<?php echo base_url() ?> " class="btn btn-danger me-3">Batal edit</a> 
	</form>
	<?php } ?>
</div>
<!-- akhir isi -->
