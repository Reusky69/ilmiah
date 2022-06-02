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
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Edit Manage Leaves
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/manageleaves');?>"
										class="btn btn-sm btn-secondary btn-icon-split">
										<span class="icon">
											<i class="fa fa-arrow-left"></i>
										</span>
										<span class="text">
											Back
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?= $this->session->flashdata('message'); ?>


							<?= form_open(); ?>

							<?php
                    foreach ($leaves as $value ) {
                ?>

							<div class="row form-group">
								<!-- <label class="col-md-4 text-md-right" for="id_leaves">ID Leaves</label> -->
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['id_leaves']; ?>" name="id_leaves"
											id="id_leaves" type="hidden" class="form-control" readonly>
									</div>
									<?= form_error('id_leaves', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_company">Company</label>
								<div class="col-md-5">
								<div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_company' id='id_company' value="<?php echo $c['id_company']; ?>">
                        <option value='0' selected disabled>Company</option>
                        <?php foreach ($company as $c) { ?>
                            <option value="<?php echo $c['id_company']; ?>" <?php if ($c['id_company'] == $value['id_company']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $c['company_name']; ?></option>
                            <?php } ?>
                        </select>
                            
                            </div>
                            <?= form_error('id_company', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_employee">NIP</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['id_employee']; ?>" name="id_employee"
											id="id_employee" type="text" class="form-control" readonly>
									</div>
									<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_leave_type">Leave Type</label>
								<div class="col-md-5">
								<div class="input-group">
                        <select class="js-example-basic-single custom-select" name='id_leave_type' id='id_leave_type' value="<?php echo $lt['id_leave_type']; ?>">
                        <option value='0' selected disabled>Leave Type</option>
                        <?php foreach ($leave_type as $lt) { ?>
                            <option value="<?php echo $lt['id_leave_type']; ?>" <?php if ($lt['id_leave_type'] == $value['id_leave_type']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $lt['leave_type']; ?></option>
                            <?php } ?>
                        </select>
                            
                            </div>
                            <?= form_error('id_leave_type', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="leave_reason">Leave Reason</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['leave_reason']; ?>" name="leave_reason"
											id="leave_reason" type="text" class="form-control" readonly>
									</div>
									<?= form_error('leave_reason', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="start_date">Start Date</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['start_date']; ?>" name="start_date"
											id="start_date" type="text" class="form-control" readonly>
									</div>
									<?= form_error('start_date', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="end_date">End Date</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['end_date']; ?>" name="end_date" id="end_date"
											type="text" class="form-control" type="date" readonly>
									</div>
									<?= form_error('end_date', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_status">Status</label>
								<div class="col-md-5">
									<div class="input-group">
										<select class="custom-select" name='id_status' id='id_status'
											value="<?php echo $a['id_status']; ?>">
											<option value='0' selected disabled>--- Choose Status ---</option>
											<?php foreach ($status_leaves as $a) { ?>
											<option value="<?php echo $a['id_status']; ?>" <?php if ($a['id_status'] == $value['id_status']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $a['status']; ?>
											</option>
											<?php } ?>
										</select>
									</div>
									<?= form_error('id_status', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="remarks">Remarks</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['remarks']; ?>" name="remarks" id="remarks"
											type="text" class="form-control">
									</div>
									<?= form_error('remarks', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-9 offset-md-4">
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
								<?php
                    }
                ?>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
