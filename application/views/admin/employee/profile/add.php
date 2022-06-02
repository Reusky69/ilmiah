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
										Form Input Employee Profile
									</h4>
								</div>
								<div class="col-auto">
									<a href="<?= base_url('admin/employeeprofile');?>"
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
								<!-- <label class="col-md-4 text-md-right" for="id_employee">NIP</label> -->
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('id_employee'); ?>" name="id_employee"
											id="id_employee" type="hidden" class="form-control">
									</div>
									<?= form_error('id_employee', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="name">Employee Name</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('name'); ?>" name="name" id="name" type="text"
											class="form-control" required>
									</div>
									<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="hp">Phone Number</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('hp'); ?>" name="hp" id="hp" type="text"
											class="form-control" required>
									</div>
									<?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="email">Email</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('email'); ?>" name="email" id="email" type="email"
											class="form-control" required>
									</div>
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="nik">NIK</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('nik'); ?>" name="nik" id="nik" type="text"
											class="form-control" required>
									</div>
									<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="no_ktp">KTP</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('no_ktp'); ?>" name="no_ktp" id="no_ktp" type="text"
											class="form-control" required>
									</div>
									<?= form_error('no_ktp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>


							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_agama">Religion</label>
								<div class="col-md-5">
									<div class="input-group">
										<select name="id_agama" id="id_agama" class="custom-select">
											<option value="<?= set_value('id_agama'); ?>" selected disabled>Choose
												Religion
											</option>
											<?php foreach ($agama as $a) : ?>
											<option value="<?= $a['id_agama'] ?>"><?= $a['agama'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<?= form_error('id_agama', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>


							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tempat_lahir">Birthplace</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tempat_lahir'); ?>" name="tempat_lahir"
											id="tempat_lahir" type="text" class="form-control" required>
									</div>
									<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_lahir">Birth</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tgl_lahir'); ?>" name="tgl_lahir" id="tgl_lahir"
											type="date" class="form-control date" required>
									</div>
									<?= form_error('tgl_lahir', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="id_gender">Gender</label>
								<div class="col-md-5">
									<div class="input-group">
										<select name="id_gender" id="id_gender" class="custom-select">
											<option value="<?= set_value('id_gender'); ?>" selected disabled>Choose
												Gender
											</option>
											<?php foreach ($gender as $gd) : ?>
											<option value="<?= $gd['id_gender'] ?>"><?= $gd['gender'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="input-group-append">
										</div>
									</div>
									<?= form_error('id_gender', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="alamat">Address</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<textarea value="<?= set_value('alamat'); ?>" name="alamat" id="alamat"
											type="text-area" class="form-control" required></textarea>
									</div>
									<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="npwp">NPWP</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('npwp'); ?>" name="npwp" id="npwp" type="text"
											class="form-control" required>
									</div>
									<?= form_error('npwp', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_masuk_kerja">Start Working</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tgl_masuk_kerja'); ?>" name="tgl_masuk_kerja"
											id="tgl_masuk_kerja" type="date" class="form-control date" required>
									</div>
									<?= form_error('tgl_masuk_kerja', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_pengangkatan">Appointment Date</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tgl_pengangkatan'); ?>" name="tgl_pengangkatan"
											id="tgl_pengangkatan" type="date" class="form-control date" required>
									</div>
									<?= form_error('tgl_pengangkatan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 text-md-right" for="tgl_pensiun">Retirement Date</label>
								<div class="col-md-5">
									<div class="input-group">
										<div class="input-group-prepend">
										</div>
										<input value="<?= set_value('tgl_pensiun'); ?>" name="tgl_pensiun"
											id="tgl_pensiun" type="date" class="form-control date" required>
									</div>
									<?= form_error('tgl_pensiun', '<small class="text-danger">', '</small>'); ?>
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
