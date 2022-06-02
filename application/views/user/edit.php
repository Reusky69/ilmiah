<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
	<?= $this->session->flashdata('pesan'); ?>

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-sm border-bottom-primary">
				<div class="card-header bg-white py-3">
					<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
						Form Edit Profile User
					</h4>
				</div>
				<div class="card-body">
				<?php echo form_open_multipart('user/edit');?>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="image">Image</label>
						<div class="col-md-7">
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url() ?>assets/img/profile/<?= $user['image']; ?>"
										alt="<?= $user['name']; ?>" class="rounded-circle shadow-sm img-thumbnail">
								</div>
								<div class="col-9">
									<input type="file" class="custom-file-input" id="image" name="image">
									<label class="btn btn-outline-primary" for="image">Photo
										Profile</label>
									<?= form_error('image', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="id_employee">NIP</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= set_value('id_employee', $user['id_employee']); ?>" name="id_employee" id="id_employee"
									type="text" class="form-control" placeholder="Your id_employee..." readonly>
							</div>
							<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="name">Name</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= set_value('name', $user['name']); ?>" name="name" id="name"
									type="text" class="form-control" placeholder="Your name..."  readonly>
							</div>
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="email">Email</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control" id="email" name="email"
									value="<?= $user['email'];?>" readonly>
							</div>
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="hp">Phone Number</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-phone"></i></span>
								</div>
								<input value="<?= set_value('hp', $user['hp']); ?>" name="hp" id="hp"
									type="text" class="form-control" placeholder="Your hp...">
							</div>
							<?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="alamat">Address</label>
						<div class="col-md-7">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i
											class="fa fa-fw fa-home"></i></span>
								</div>
								<textarea type="text" class="form-control" id="alamat" name="alamat"
									value=""><?= $user['alamat'];?></textarea>
							</div>
							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
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
