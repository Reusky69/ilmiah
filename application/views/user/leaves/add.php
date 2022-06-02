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

			<?= $this->session->set_flashdata('message'); ?><div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Leaves
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('user/leaves');?>"
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
							
										<input value="<?= $usernya['id_company']?>" name="id_company" id="id_company" type="hidden"
											class="form-control" readonly required>
									
							
										<input value="<?= $usernya['id_employee']?>" name="id_employee" id="id_employee" type="hidden"
											class="form-control" readonly required>

							<div class="row form-group">
							<label class="col-md-4 text-md-right" for="id_leave_type">Leave Type</label>
							<div class="col-md-5">
								<div class="input-group">
									<select name="id_leave_type" id="id_leave_type" class="custom-select" required>
										<option value="<?= set_value('id_leave_type'); ?>" selected disabled>--- Choose Leave Type ---
										</option>
										<?php foreach ($leave_type as $l) : ?>
										<option value="<?= $l['id_leave_type'] ?>"><?= $l['leave_type'] ?></option>
										<?php endforeach; ?>
									</select>
									<div class="input-group-append">
									</div>
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
										<textarea value="<?= set_value('leave_reason'); ?>" name="leave_reason" id="leave_reason" type="text"
											class="form-control" required></textarea>
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
										<input value="<?= set_value('start_date'); ?>" name="start_date" id="start_date" type="date"
											class="form-control" required>
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
										<input value="<?= set_value('end_date'); ?>" name="end_date" id="end_date" type="date"
											class="form-control" required>
									</div>
									<?= form_error('end_date', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

						<div class="row form-group">
							<div class="col-md-9 offset-md-4">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>