<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>


	<div class="row">
		<div class="col-lg">
			<?php if(validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors();?>
			</div>
			<?php endif; ?>

			<?= $this->session->flashdata('pesan'); ?>
            

			<!-- DataTales Example -->
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Employee Profile
									</h4>
								</div>
								<div>
									<a href="<?= base_url('download/employeeprofile_excel') ?>"
										class="btn btn-sm btn-outline-primary">
										<span class="icon">
											<i class="fa fa-download" aria-hidden="true"></i>
										</span>
										<span class="text">
											Excel
										</span>
									</a>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/employeeprofile_add') ?>"
										class="btn btn-sm btn-primary btn-icon-split ">
										<span class="icon">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">
											Input Employee
										</span>
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Action</th>
												<th>NIP</th>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>NIK</th>
												<th>KTP</th>
												<th>Religion</th>
												<th>Birthplace</th>
												<th>Birth</th>
												<th>Gender</th>
												<th>Address</th>
												<th>NPWP</th>
												<th>Start Working</th>
												<th>Appointment Date</th>
												<th>Retirement Date</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($employeeprofile as $ep) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td>
													<a href="<?= base_url('admin/employeeprofile_edit'); ?>?id=<?php echo $ep['id_employee']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
													<a onclick="return confirm('Yakin ingin hapus?')"
														href="<?= base_url('admin/employeeprofile_delete/') . $ep['id_employee'] ?>"
														class="btn btn-circle btn-danger btn-sm"><i
															class="fa fa-trash"></i></a>
												</td>
												<td><?= $ep['id_employee']; ?></td>
												<td><?= $ep['name']; ?></td>
												<td><?= $ep['hp']; ?></td>
												<td><?= $ep['email']; ?></td>
												<td><?= $ep['nik']; ?></td>
												<td><?= $ep['no_ktp']; ?></td>
												<td><?= $ep['agama']; ?></td>
												<td><?= $ep['tempat_lahir']; ?></td>
												<td><?= $ep['tgl_lahir']; ?></td>
												<td><?= $ep['gender']; ?></td>
												<td><?= $ep['alamat']; ?></td>
												<td><?= $ep['npwp']; ?></td>
												<td><?= $ep['tgl_masuk_kerja']; ?></td>
												<td><?= $ep['tgl_pengangkatan']; ?></td>
												<td><?= $ep['tgl_pensiun']; ?></td>
												<?php $i++; ?>
												<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<!-- /.container-fluid -->
