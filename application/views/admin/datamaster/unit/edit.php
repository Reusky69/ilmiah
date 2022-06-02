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

			<?= form_open(); ?>

			<?php
                            foreach ($unit as $value ) {
                            ?>

			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Edit Unit
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
							<input value="<?php echo $value['id_unit']; ?>" name="id_unit" id="id_unit" type="hidden"
								class="form-control" readonly>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="unit">Unit</label>
								<div class="col-md-6">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?php echo $value['unit']; ?>" name="unit" id="unit" type="text"
											class="form-control">
									</div>
									<?= form_error('unit', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-4 text-md-right" for="id_company">Company</label>
							<div class="col-md-6">
								<div class="input-group">
									<select class="js-example-basic-single custom-select" name='id_company'
										id='id_company' value="<?php echo $c['id_company']; ?>">
										<option value='0' selected disabled>--- Pilih Unit ---</option>
										<?php foreach ($company as $c) { ?>
										<option value="<?php echo $c['id_company']; ?>" <?php if ($c['id_company'] == $value['id_company']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $c['company_name']; ?>
										</option>
										<?php } ?>
									</select>
								</div>
								<?= form_error('id_company', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-9 offset-md-3">
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
	</div>
