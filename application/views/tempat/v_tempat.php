<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="container mt-5 "><?php echo $this->session->flashdata('message_name'); ?></div>

	<!-- isi -->
	<div class="container mt-5 mb-3 ">
		<a href="<?php echo base_url('c_tempat/tambahtempat'); ?> " class="btn btn-md btn-primary  ">Tambah Data</a>
	</div>
	<div class="container ">
    <table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>

					<th scope="col">Nama Tempat</th>
					<th scope="col">Alamat</th>
					<th scope="col">Action</th>

				</tr>
			</thead>
			<tbody>
                <?php 
                $nomor=0;
                foreach ($tampildata as  $data) {
                $nomor++;
               
                ?>
				<tr>
					<th scope="row"><?php echo $nomor;?></th>
					
					<td><?php echo $data->nama_tempat;?></td>
					<td><?php echo $data->alamat_tempat;?></td>
					<td>
                    <!-- tampil data  -->
                    <a href="<?php echo base_url('c_tempat/lihat/'.$data->id_tempat); ?> " class="btn btn-md btn-info me-3 ">Lihat</a>
                    <!-- hapus data -->
                    <a href="<?php echo base_url('c_tempat/hapus/'.$data->id_tempat); ?> " class="btn btn-md btn-danger ">Hapus</a>

                    <!-- editdata -->
                    <a href="<?php echo base_url('c_tempat/edit/'.$data->id_tempat); ?> " class="btn btn-md btn-warning me-3 ">Edit</a>

                    </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- akhir isi -->