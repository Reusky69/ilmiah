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
										Form Input Grade Level
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/gradelevel') ?>"
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
								<label class="col-md-4 text-md-right" for="grade_level">Grade Level</label>
								<div class="col-md-6">
									<div class="input-group">
										<input value="<?= set_value('grade_level'); ?>" name="grade_level"
											id="grade_level" type="text" class="form-control">
									</div>
									<?= form_error('grade_level', '<small class="text-danger">', '</small>'); ?>
								</div>
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
