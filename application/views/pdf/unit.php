<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Unit</th>
												<th>Company Name</th>
											</tr>
										</thead>
										<tbody>
                                            Tanggal Cetak : <?= date('d F Y'); ?>
											<?php $i=1; ?>
											<?php foreach($unit as $c) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $c['unit']; ?></td>
												<td><?= $c['company_name']; ?></td>
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