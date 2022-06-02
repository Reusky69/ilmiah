                <!-- Begin Page Content -->
                <div class="container-fluid">

                	<!-- Page Heading -->
                	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
					<?= $this->session->flashdata('pesan'); ?>


                	<div class="row">
                		<div class="col-lg">
                			<?php if(validation_errors()) : ?>
                			<div class="alert alert-danger" role="alert">
                				<?= validation_errors();?>
                			</div>
                			<?php endif; ?>





                			<!-- DataTales Example -->
                			<div class="row">
                				<div class="col">
                					<div class="card shadow-sm border-bottom-primary">
                						<div class="card-header bg-white py-3">
                							<div class="row">
                								<div class="col">
                									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                										Form Manage Leaves
                									</h4>
                								</div>
                							</div>
                							<div class="card-body">
                								<div class="table-responsive">
                									<table id="data" class="table table-striped table-bordered"
                										style="width:100%" cellspacing="0">
                										<thead>
                											<tr>
                												<th>No</th>
                												<th>NIP</th>
                												<th>Name</th>
                												<th>Company</th>
                												<th>Leave Type</th>
                												<th>Leave Reason</th>
                												<th>Start Date</th>
                												<th>End Date</th>
                												<th>Status</th>
                												<th>Remarks</th>
                												<th>Detail</th>
                											</tr>
                										</thead>
                										<tbody>
                											<?php $i=1; ?>
                											<?php foreach($leaves as $l) : ?>
                											<tr>
                												<th scope="row"><?= $i;?></th>
                												<td><?= $l->id_employee; ?></td>
                												<td><?= $l->name; ?></td>
                												<td><?= $l->company_name; ?></td>
                												<td><?= $l->leave_type; ?></td>
                												<td><?= $l->leave_reason; ?></td>
                												<td><?= $l->start_date; ?></td>
                												<td><?= $l->end_date; ?></td>
																<td>
																	<?php if($l->id_status==1){
																		echo'<a class="badge badge-primary">Approved</a>';
																	} elseif($l->id_status==2){
																		echo '<a class="badge badge-danger">Rejected</a>';
																	} elseif($l->id_status==3){
																		echo '<a class="badge badge-warning">Waiting...</a>';
																	}; ?>
																</td>
                												<td><?= $l->remarks; ?></td>
                												<td>
                													<a href="<?= base_url('admin/manageleaves_detail/')?>?id=<?php echo $l->id_leaves; ?>"
                														class="btn btn-circle btn-danger btn-sm"><i
                															class="fas fa-pencil-alt"></i></a>
                												</td>
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