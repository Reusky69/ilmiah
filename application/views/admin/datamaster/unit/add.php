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
										Form Input Unit
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/unit') ?>"
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
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="unit">Unit</label>
								<div class="col-md-5">
									<div class="input-group">
										<input value="<?= set_value('unit'); ?>" name="unit" id="unit" type="text"
											class="form-control">
									</div>
									<?= form_error('unit', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-4 text-md-right" for="id_company">Company</label>
							<div class="col-md-5">
								<div class="input-group">
									<select class="js-example-basic-single custom-select" name="id_company"
										id="id_company">
										<option value="<?= set_value('id_company'); ?>" selected disabled>Choose Company
										</option>
										<?php foreach ($company as $c) : ?>
										<option value="<?= $c['id_company'] ?>"><?= $c['company_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<?= form_error('id_company', '<small class="text-danger">', '</small>'); ?>
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
