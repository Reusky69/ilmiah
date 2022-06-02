<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

	<!-- Content Row -->
	<div class="row">

		<!-- Karyawan Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Employee</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $employeeprofile; ?>
							</div>
						</div>
						<div class="col-auto">
							<!-- <i class="fas fa-users fa-2x text-gray-300"></i> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Perusahaan Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Company</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $company; ?></div>
						</div>
						<div class="col-auto">
							<!-- <i class="fas fa-building fa-2x text-gray-300"></i> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Direktorat Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
								Directorate
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
										<?= $directorate; ?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Divisi Card-->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Division</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $division; ?></div>
						</div>
						<div class="col-auto">
							<!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Sub Divisi Card-->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								Sub Division</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sub_division; ?>
							</div>
						</div>
						<div class="col-auto">
							<!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- HIGHCHART GENDER -->
	<div class="row">
		<figure class="highcharts-figure-pie">
			<div id="pie"></div>
		</figure>
		<!-- HIGHCHART STATUS EMPLOYEE -->
		<figure class="highcharts-figure-pie">
			<div id="pie2"></div>
		</figure>
		<!-- Position Level -->
		<figure class="highcharts-figure-pie">
			<div id="position"></div>
		</figure>
		<!-- Level Employee -->
		<figure class="highcharts-figure-pie">
			<div id="level"></div>
		</figure>
	</div>
	<!-- Age -->
	<figure class="highcharts-figure-age">
		<div id="age"></div>
	</figure>



	<!-- CSS Piechart -->
	<style>
		.highcharts-figure-pie,
		.highcharts-data-table table {
			/* width: 320px; */
			width: 450px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #0000;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}

		input[type="number"] {
			min-width: 50px;
		}

	</style>


	<!-- CSS Level Employee -->
	<style>
		.highcharts-figure-column,
		.highcharts-data-table table {
			min-width: 310px;
			max-width: 800px;
			margin: 1em auto;
		}

		#container {
			height: 400px;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}

	</style>




	<!-- CSS Age -->
	<style>
		.highcharts-figure-age,
		.highcharts-data-table table {
			width: 800px;
			margin: 1em auto;
		}

		#container {
			height: 400px;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}

	</style>

	<!-- Card -->
	<style>
		.col-xl-3 {
			flex: 0 0 25%;
			max-width: 19%;
		}

	</style>