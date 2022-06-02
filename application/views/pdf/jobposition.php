<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Job Position</th>
												<th>Level Position</th>
											</tr>
										</thead>
										<tbody>
                                            Tanggal Cetak : <?= date('d F Y'); ?>
											<?php $i=1; ?>
											<?php foreach($job_position as $c) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $c['job_name']; ?></td>
												<td><?= $c['level_name']; ?></td>
											</tr>
											<?php $i++; ?>
											<?php endforeach; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>


						<script>
							$('#data').DataTable();

						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->