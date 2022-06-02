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

			<?= $this->session->set_flashdata('message'); ?>

			<!-- DataTales Example -->
			<div class="row">
				<div class="col">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input User
									</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%"
										cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>NIP</th>
												<th>Name</th>
												<th>Email</th>
												<th>Role</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($usermanagement as $u) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $u['id_employee']; ?></td>
												<td><?= $u['name']; ?></td>
												<td><?= $u['email']; ?></td>
												<td><?= $u['role_admin']; ?></td>
												<td>
													<a href="<?= base_url('menu/toggle/') . $u['id_employee'] ?>"
														class="btn btn-circle btn-sm <?= $u['is_active'] ? 'btn-secondary' : 'btn-success' ?>"
														title="<?= $u['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i
															class="fa fa-fw fa-power-off"></i></a>
													<a href="<?= base_url('menu/usermanagement_edit/')?>?id=<?php echo $u['id_employee']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
													<!-- <a onclick="return confirm('Yakin ingin hapus?')"
														href="<?= base_url('menu/usermanagement_delete/') . $u['id_employee'] ?>"
														class="btn btn-circle btn-danger btn-sm"><i
															class="fa fa-trash"></i></a> -->
												</td>
												<?php $i++; ?>
												<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<!-- /.container-fluid -->
