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
			<?= form_open(); ?>

			<?php
                    foreach ($status_jabatan as $value ) {
                ?>

<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card shadow-sm border-bottom-primary">
						<div class="card-header bg-white py-3">
							<div class="row">
								<div class="col">
									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
										Form Edit Position Status
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/statusjabatan') ?>"
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
							<form action="<?= base_url('admin/statusjabatan_edit');?>" method="post">

											<input type="hidden" class="form-control" id="id_status_jabatan"
												name="id_status_jabatan"
												value="<?php echo $value['id_status_jabatan'] ?>" readonly>
								<hr>
								<div class="row form-group">
									<label class="col-md-3 text-md-right" for="status_jabatan_name">Position Status</label>
									<div class="col-md-6">
										<div class="input-group">
											<input value="<?php echo $value['status_jabatan_name']; ?>"
												name="status_jabatan_name" id="status_jabatan_name" type="text"
												class="form-control">
										</div>
										<?= form_error('status_jabatan_name', '<small class="text-danger">', '</small>'); ?>
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
							</form>
							<?= form_close();?>
						</div>
					</div>
				</div>
			</div>
