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
            foreach ($directorate as $value ) {
        ?>
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
 							<form action="<?= base_url('admin/directorate_edit');?>" method="post">

 								<input value="<?php echo $value['id_directorate']; ?>" name="id_directorate"
 									id="id_directorate" type="hidden" class="form-control" readonly>
 								<div class="row form-group">
 									<label class="col-md-4 text-md-right" for="directorate_name">Directorate
 										Name</label>
 									<div class="col-md-6">
 										<div class="input-group">
 											<input value="<?php echo $value['directorate_name']; ?>"
 												name="directorate_name" id="directorate_name" type="text"
 												class="form-control">
 										</div>
 										<?= form_error('directorate_name', '<small class="text-danger">', '</small>'); ?>
 									</div>
 								</div>

 								<div class="row form-group">
 									<label class="col-md-4 text-md-right" for="id_company">Company</label>
 									<div class="col-md-6">
 										<div class="input-group">
 											<select class="js-example-basic-single custom-select" name='id_company'
 												id='id_company' value="<?php echo $c['id_company']; ?>">
 												<option value='0' selected disabled>Choose Company</option>
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
 							</form>
 							<? form_close();?>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
