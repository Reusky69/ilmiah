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
                    foreach ($usertbl as $value ) {
                ?>
 			<div class="row justify-content-center">
 				<div class="col-md-8">
 					<div class="card shadow-sm border-bottom-primary">
 						<div class="card-header bg-white py-3">
 							<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
 								Form Edit user
 							</h4>
 						</div>
 						<div class="card-body">
 							<?= $this->session->flashdata('message'); ?>
 							<form action="<?= base_url('admin/usermanagement_edit');?>" method="post">

 								<div class="row form-group">
 									<label class="col-md-3 text-md-right" for="id_employee">NIP</label>
 									<div class="col-md-6">
 										<div class="input-group">
 											<input type="text" class="form-control" id="id_employee" name="id_employee"
 												value="<?php echo $value['id_employee']; ?>" readonly>
 										</div>
 										<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
 									</div>
 								</div>
 								<div class="row form-group">
 									<label class="col-md-3 text-md-right" for="name">Name</label>
 									<div class="col-md-6">
 										<div class="input-group">
 											<input value="<?php echo $value['name']; ?>" name="name" id="name"
 												type="text" class="form-control" readonly>
 										</div>
 										<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
 									</div>
 								</div>
 								<div class="row form-group">
 									<label class="col-md-3 text-md-right" for="id_role_admin">Role</label>
 									<div class="col-md-6">
 										<div class="custom-control custom-radio">
 											<input <?= set_radio('id_role_admin',3); ?> value=3 type="radio" id=3
 												name="id_role_admin" class="custom-control-input">
 											<label class="custom-control-label" for=3>Admin</label>
 										</div>
 										<div class="custom-control custom-radio">
 											<input <?= set_radio('id_role_admin', 2); ?> value=2 type="radio" id=2
 												name="id_role_admin" class="custom-control-input">
 											<label class="custom-control-label" for=2>User</label>
 										</div>
 										<?= form_error('id_role_admin', '<span class="text-danger small">', '</span>'); ?>
 									</div>
 								</div>
 								<br>

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
 		</div>
 	</div>