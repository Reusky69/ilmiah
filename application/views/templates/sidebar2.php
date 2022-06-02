<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background : #2E323A;">


	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<img src="<?= base_url('assets/img/idfoodfav2.png'); ?>" width="45" height="45">
		</div>
		<div class="sidebar-brand-text mx-3">RNI EDPA</div>
	</a>

	<!-- Divider -->
	<!-- menampilkan garis di sidebar -->

	<?php if($user['id_role_admin'] <= 1){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] <= 1){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] <= 1){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/company'); ?>">Company</a>
				<a class="collapse-item" href="<?= base_url('admin/directorate'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] <= 1){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

		<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>





	<!-- ADMIN MASING-MASING COMPANY -->
	<!-- Divider -->
	<!-- menampilkan garis di sidebar -->
	<!-- COMPANY 1 PT RNI Holding-->
	<?php if($user['id_role_admin'] == 3){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 3){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 3){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company1'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 3){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate1'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division1'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision1'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit1'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 3){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile1'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement1'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 3){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves1'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>


	<!-- End of Company 1 -->



	<!-- COMPANY 2 PT RAJAWALI NUSINDO -->
	<?php if($user['id_role_admin'] == 4){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 4){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 4){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company2'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 4){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate2'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division2'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision2'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit2'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 4){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile2'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement2'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 4){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves2'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 2 -->


	<!-- COMPANY 3 PTP MITRA OGAN -->
	<?php if($user['id_role_admin'] == 5){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 5){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 5){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company3'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 5){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate3'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division3'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision3'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit3'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 5){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile3'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement3'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>
	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 5){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves3'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 3 -->


	<!-- COMPANY 4 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 6){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 6){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 6){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company4'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 6){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate4'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division4'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision4'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit4'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 6){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile4'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement4'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 6){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves4'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 4 -->



	<!-- COMPANY 5 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 7){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 7){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 7){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company5'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 7){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate5'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division5'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision5'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit5'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 7){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile5'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement5'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 7){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves5'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 5 -->



	<!-- COMPANY 6 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 8){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 8){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 8){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company6'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 8){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate6'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division6'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision6'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit6'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 8){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile6'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement6'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 8){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves6'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 6 -->



	<!-- COMPANY 7 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 9){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 9){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 9){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company7'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 9){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate7'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division7'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision7'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit7'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 9){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile7'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement7'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 9){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves7'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 7 -->



	<!-- COMPANY 8 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 10){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 10){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 10){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company8'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 10){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate8'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division8'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision8'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit8'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 10){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile8'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement8'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 10){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves8'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 8 -->

	<!-- COMPANY9 9 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 11){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 11){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 11){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company9'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 11){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate9'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division9'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision9'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit9'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 11){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile9'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement9'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 11){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves9'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 9 -->

	<!-- COMPANY 10 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 12){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 12){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 12){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company10'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 12){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate10'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division10'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision10'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit10'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 12){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile10'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement10'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 12){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves10'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 10 -->

	<!-- COMPANY 11 PT Bhanda Ghara Reksa (Persero) -->
	<?php if($user['id_role_admin'] == 13){?>
	<hr class="sidebar-divider">
	<?php } else ;?>


	<!-- Admin -->
	<?php if($user['id_role_admin'] == 13){?>
	<div class="sidebar-heading">
		ADMIN
	</div>
	<?php } else ;?>

	<!-- Nav Item - Dashboard -->
	<?php if($user['id_role_admin'] == 13){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/company11'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Pages Collapse Master data -->
	<?php if($user['id_role_admin'] == 13){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Master data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Management</h6>
				<a class="collapse-item" href="<?= base_url('admin/directorate11'); ?>">Directorate</a>
				<a class="collapse-item" href="<?= base_url('admin/division11'); ?>">Division</a>
				<a class="collapse-item" href="<?= base_url('admin/subdivision11'); ?>">Sub Division</a>
				<a class="collapse-item" href="<?= base_url('admin/levelposition'); ?>">Position Level</a>
				<a class="collapse-item" href="<?= base_url('admin/jobposition'); ?>">Position Job</a>
				<a class="collapse-item" href="<?= base_url('admin/consollevel'); ?>">Console Level</a>
				<a class="collapse-item" href="<?= base_url('admin/statusjabatan'); ?>">Position Status</a>
				<a class="collapse-item" href="<?= base_url('admin/gradelevel'); ?>">Grade Level</a>
				<a class="collapse-item" href="<?= base_url('admin/unit11'); ?>">Unit</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Employee -->
	<?php if($user['id_role_admin'] == 13){?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
			aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Employee</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('admin/employeeprofile11'); ?>">Employee Profile</a>
				<a class="collapse-item" href="<?= base_url('admin/employeeplacement11'); ?>">Employee Placement</a>
			</div>
		</div>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Manage Leaves -->
	<?php if($user['id_role_admin'] == 13){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('admin/manageleaves11'); ?>">
			<i class="fas fa-fw fa-calendar-check"></i>
			<span>Manage Leaves</span></a>
	</li>
	<?php } else ;?>
	<!-- End of Company 11 -->
















	<!-- Divider -->
	<?php if($user['id_role_admin'] >= 1){?>
	<hr class="sidebar-divider mt">
	<?php } else ;?>

	<!-- Admin -->
	<?php if($user['id_role_admin'] >= 1){?>
	<div class="sidebar-heading mt">
		USER
	</div>
	<?php } else ;?>


	<!-- Nav Item - My Profile -->
	<?php if($user['id_role_admin'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('user'); ?>">
			<i class="fas fa-fw fa-user-alt"></i>
			<span>My Profile</span></a>
	</li>
	<?php } else ;?>
	
	<!-- Nav Item - Edit Profile -->
	<?php if($user['id_role_admin'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('user/edit'); ?>">
			<i class="fas fa-fw fa-user-edit"></i>
			<span>Edit Profile</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Change Password -->
	<?php if($user['id_role_admin'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('user/changepassword'); ?>">
			<i class="fas fa-fw fa-key"></i>
			<span>Change Password</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - Information -->
	<?php if($user['id_role_admin'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('user/information'); ?>">
			<i class="fas fa-fw fa-info"></i>
			<span>Information</span></a>
	</li>
	<?php } else ;?>


	<!-- Nav Item - Leaves -->
	<?php if($user['id_role_admin'] >= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('user/leaves'); ?>">
		<i class="fas fa-fw fa-calendar-alt"></i>
			<span>Leaves</span></a>
	</li>
	<?php } else ;?>


	<!-- Divider -->
	<?php if($user['id_role_admin'] <= 1){?>
	<hr class="sidebar-divider mt">
	<?php } else ;?>

	<!-- Menu -->
	<?php if($user['id_role_admin'] <= 1){?>
	<div class="sidebar-heading">
		Menu
	</div>
	<?php } else ;?>

	<!-- Nav Item - Menu Management -->
	<!-- <?php if($user['id_role_admin'] <= 1){?>
<?php if($title == ['title']) : ?>
                <li class="nav-item active">
                    <?php else : ?>
                        <li class="nav-item ">
                <?php endif; ?>
                <a class="nav-link" href="http://localhost/wpu-login/menu">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu Management</span></a>
</li>
<?php } else ;?> -->

	<!-- Nav Item - Sub Menu -->
	<!-- <?php if($user['id_role_admin'] <= 1){?>
<?php if($title == ['title']) : ?>
                <li class="nav-item active">
                    <?php else : ?>
                        <li class="nav-item ">
                <?php endif; ?>
                <a class="nav-link" href="http://localhost/wpu-login/menu/submenu">
                    
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Submenu Management</span></a>
</li>
<?php } else ;?> -->

	<!-- Nav Item - Role -->
	<?php if($user['id_role_admin'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('menu/role'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Role</span></a>
	</li>
	<?php } else ;?>

	<!-- Nav Item - User Management -->
	<?php if($user['id_role_admin'] <= 1){?>
	<?php if($title == ['title']) : ?>
	<li class="nav-item active">
		<?php else : ?>
	<li class="nav-item ">
		<?php endif; ?>
		<a class="nav-link" href="<?= base_url('menu/usermanagement'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>User Management</span></a>
	</li>
	<?php } else ;?>


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
