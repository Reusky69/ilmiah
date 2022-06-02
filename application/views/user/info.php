<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message');
                             ?>
		</div>
	</div>

	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
				aria-selected="true">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
				aria-selected="false">Placement</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div class="border-bottom-primary">
				<div class="card-header bg-white">
					<div class="card-body">
						<div class="row">
							<div class="col-md-10">
								<h4>Personal Information</h4>
								<table class="table">
									<tr>
										<th width="200">NIP</th>
										<td><?= $employeeprofile1['id_employee'];?></td>
									</tr>
									<tr>
										<th>Name</th>
										<td><?= $employeeprofile1['name'];?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?= $employeeprofile1['hp'];?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?= $employeeprofile1['email'];?></td>
									</tr>
									<tr>
										<th>NIK</th>
										<td><?= $employeeprofile1['nik'];?></td>
									</tr>
									<tr>
										<th>KTP</th>
										<td><?= $employeeprofile1['no_ktp'];?></td>
									</tr>
									<?php foreach($ep as $e1) {?>
										<tr>
											<th>Religion</th>
											<td><?= $e1->agama;?></td>
										</tr>
										<tr>
											<th>Gender</th>
											<td><?= $e1->gender;?></td>
										</tr>
									<?php } ?>
									<tr>
										<th>Birthplace</th>
										<td><?= $employeeprofile1['tempat_lahir'];?></td>
									</tr>
									<tr>
										<th>Birth</th>
										<td><?= $employeeprofile1['tgl_lahir'];?></td>
									</tr>
									<tr>
										<th>Address</th>
										<td><?= $employeeprofile1['alamat'];?></td>
									</tr>
									<tr>
										<th>NPWP</th>
										<td><?= $employeeprofile1['npwp'];?></td>
									</tr>
									<tr>
										<th>Start Working</th>
										<td><?= $employeeprofile1['tgl_masuk_kerja'];?></td>
									</tr>
									<tr>
										<th>Appointment Date</th>
										<td><?= $employeeprofile1['tgl_pengangkatan'];?></td>
									</tr>
									<tr>
										<th>Retirement Date</th>
										<td><?= $employeeprofile1['tgl_pensiun'];?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="border-bottom-primary">
				<div class="card-header bg-white">
					<div class="card-body">
						<div class="row">
							<div class="col-md-10">
								<h4>Job Information</h4>
								<?php foreach($employeeprofile as $e) { ?>
								<table class="table">
									<tr>
										<th width="200">NIP</th>
										<td><?= $e->id_employee;?></td>
									</tr>
									<tr>
										<th>Company</th>
										<td><?= $e->company_name;?></td>
									</tr>
									<tr>
										<th>Directorate</th>
										<td><?= $e->directorate_name;?></td>
									</tr>
									<tr>
										<th>Division</th>
										<td><?= $e->division_name;?></td>
									</tr>
									<tr>
										<th>Subdivision</th>
										<td><?= $e->subdivision_name;?></td>
									</tr>
									<tr>
										<th>Position Level</th>
										<td><?= $e->level_name;?></td>
									</tr>
									<tr>
										<th>Position Job</th>
										<td><?= $e->job_name;?></td>
									</tr>
									<tr>
										<th>Console Level</th>
										<td><?= $e->consol_name;?></td>
									</tr>
									<tr>
										<th>Position Status</th>
										<td><?= $e->status_jabatan_name;?></td>
									</tr>
									<tr>
										<th>Employee Status</th>
										<td><?= $e->status_employee;?></td>
									</tr>
									<tr>
										<th>Grade Level</th>
										<td><?= $e->grade_level;?></td>
									</tr>
									<tr>
										<th>Unit</th>
										<td><?= $e->unit;?></td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
