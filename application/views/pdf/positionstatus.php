							<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Position Status</th>
											</tr>
										</thead>
										<tbody>
                                            Tanggal Cetak : <?= date('d F Y'); ?>
											<?php $i=1; ?>
											<?php foreach($status_jabatan as $c) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $c['status_jabatan_name']; ?></td>
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