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

			<?= $this->session->set_flashdata('pesan'); ?>

			<!-- DataTales Example -->
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Unit
									</h4>
								</div>
								<div>
									<a href="<?= base_url('download/unit_excel') ?>"
										class="btn btn-sm btn-outline-primary">
										<span class="icon">
											<i class="fa fa-download" aria-hidden="true"></i>
										</span>
										<span class="text">
											Excel
										</span>
									</a>
									<a href="<?= base_url('download/unit_pdf') ?>"
										class="btn btn-sm btn-outline-primary">
										<span class="icon">
											<i class="fa fa-file" aria-hidden="true"></i>
										</span>
										<span class="text">
											PDF
										</span>
									</a>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/unit_add') ?>"
										class="btn btn-sm btn-primary btn-icon-split ">
										<span class="icon">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">
											Input New Unit
										</span>
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data"
										class="table table-striped table-bordered w-100 dt-responsive nowrap"
										style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Unit</th>
												<th>Company</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($unit as $u) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $u['unit']; ?></td>
												<td><?= $u['company_name']; ?></td>
												<td>
													<a href="<?= base_url('admin/unit_edit'); ?>?id=<?php echo $u['id_unit']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
													<a onclick="return confirm('Yakin ingin hapus?')"
														href="<?= base_url('admin/unit_delete/') . $u['id_unit'] ?>"
														class="btn btn-circle btn-danger btn-sm"><i
															class="fa fa-trash"></i></a>
												</td>
											</tr>
											<?php $i++; ?>
											<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
