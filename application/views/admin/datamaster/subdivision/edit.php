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
                    foreach ($sub_division as $value ) {
                ?>

 			<div class="row justify-content-center">
 				<div class="col-md-8">
 					<div class="card shadow-sm border-bottom-primary">
 						<div class="card-header bg-white py-3">
 							<div class="row">
 								<div class="col">
 									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
 										Form Edit Sub Division
 									</h4>
 								</div>
 								<div class="col-auto">
 									<a href="<?= base_url('admin/subdivision') ?>"
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
 							<form action="<?= base_url('admin/subdivision_edit');?>" method="post">

							 <input type="hidden" class="form-control" id="id_subdivision" name="id_subdivision"
 									value="<?php echo $value['id_subdivision']; ?>" readonly>
 								<div class="row form-group">
 									<label class="col-md-4 text-md-right" for="name">Subdivision Name</label>
 									<div class="col-md-5">
 										<div class="input-group">
 											<input value="<?php echo $value['subdivision_name']; ?>"
 												name="subdivision_name" id="subdivision_name" type="text"
 												class="form-control">
 										</div>
 										<?= form_error('subdivision_name', '<small class="text-danger">', '</small>'); ?>
 									</div>
 								</div>

 								<div class="row form-group">
 									<label class="col-md-4 text-md-right" for="id_division">Division Name</label>
 									<div class="col-md-5">
 										<div class="input-group">
 											<select class="js-example-basic-single custom-select" name='id_division'
 												id='id_division' value="<?php echo $dv['id_division']; ?>">
 												<option value='0' selected disabled>Choose Company</option>
 												<?php foreach ($division as $dv) { ?>
 												<option value="<?php echo $dv['id_division']; ?>" <?php if ($dv['id_division'] == $value['id_division']) {
                                                                                    echo "selected";
                                                                                } ?>>
 													<?php echo $dv['division_name']; ?></option>
 												<?php } ?>
 											</select>
 										</div>
 										<?= form_error('id_division', '<small class="text-danger">', '</small>'); ?>
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
 							<? form_close();?>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
