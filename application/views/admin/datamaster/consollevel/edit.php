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
            foreach ($consol_level as $value ) {
        ?>

 			<div class="row justify-content-center">
 				<div class="col-md-8">
 					<div class="card shadow-sm border-bottom-primary">
 						<div class="card-header bg-white py-3">
 							<div class="row">
 								<div class="col">
 									<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
 										Form Edit Console Level
 									</h4>
 								</div>
 								<div class="col-auto">
 									<a href="<?= base_url('admin/consollevel') ?>"
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
 							<form action="<?= base_url('admin/consollevel');?>" method="post">

 								<input value="<?php echo $value['id_consol']; ?>" name="id_consol" id="id_consol"
 									type="hidden" class="form-control" readonly>
 								<div class="row form-group">
 									<label class="col-md-4 text-md-right" for="consol_name">Console Level</label>
 									<div class="col-md-5">
 										<div class="input-group">
 											<input value="<?php echo $value['consol_name']; ?>" name="consol_name"
 												id="consol_name" type="text" class="form-control">
 										</div>
 										<?= form_error('consol_name', '<small class="text-danger">', '</small>'); ?>
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
 							</form>
 							<? form_close();?>
 						</div>
 					</div>
 				</div>
 			</div>
