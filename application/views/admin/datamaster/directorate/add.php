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

			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Input Directorate
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/directorate') ?>"
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
							<?= form_open(); ?>

							<div class="row form-group">
								<label class="col-md-3 text-md-right" for="directorate_name">Directorate Name</label>
								<div class="col-md-6">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('directorate_name'); ?>" name="directorate_name"
											id="directorate_name" type="text" class="form-control" required>
									</div>
									<?= form_error('directorate_name', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="id_company">Company</label>
							<div class="col-md-6">
								<div class="input-group">
									<select class="js-example-basic-single custom-select" id="id_company"
										name="id_company" required>
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
							<div class="col-md-9 offset-md-3">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('.js-example-basic-single').select2();
		});

	</script>
