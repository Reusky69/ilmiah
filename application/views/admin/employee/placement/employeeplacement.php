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
				<div class="col">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Employee Placement
									</h4>
								</div>
								<div>
									<a href="<?= base_url('download/employeeplacement_excel') ?>"
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
									<a href="<?= base_url('admin/employeeplacement_add') ?>"
										class="btn btn-sm btn-primary btn-icon-split ">
										<span class="icon">
											<i class="fa fa-plus"></i>
										</span>
										<span class="text">
											Input Employee Placement
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
												<th>No</th>
												<th>Action</th>
												<th>NIP</th>
												<th>Name</th>
												<th>Company</th>
												<th>Directorate</th>
												<th>Division</th>
												<th>Subdivision</th>
												<th>Position Level</th>
												<th>Position Job</th>
												<th>Position Status</th>
												<th>Employee Status</th>
												<th>Grade Level</th>
												<th>Unit</th>
												<th>Console Level</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											<?php foreach($employeeplacement as $epc) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td>
													<a href="<?= base_url('admin/employeeplacement_edit'); ?>?id=<?php echo $epc['id_employee']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
												</td>
												<td><?= $epc['id_employee']; ?></td>
												<td><?= $epc['name']; ?></td>
												<td><?= $epc['company_name']; ?></td>
												<td><?= $epc['directorate_name']; ?></td>
												<td><?= $epc['division_name']; ?></td>
												<td><?= $epc['subdivision_name']; ?></td>
												<td><?= $epc['level_name']; ?></td>
												<td><?= $epc['job_name']; ?></td>
												<td><?= $epc['status_jabatan_name']; ?></td>
												<td><?= $epc['status_employee']; ?></td>
												<td><?= $epc['grade_level']; ?></td>
												<td><?= $epc['unit']; ?></td>
												<td><?= $epc['consol_name']; ?></td>
											</tr>
											<?php $i++; ?>
											<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<!-- /.container-fluid -->
