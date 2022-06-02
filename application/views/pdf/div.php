<div class="card-body">
								<div class="table-responsive">
									<table id="data" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Division Name</th>
												<th>Directorate Name</th>
											</tr>
										</thead>
										<tbody>
                                            Tanggal Cetak : <?= date('d F Y'); ?>
											<?php $i=1; ?>
											<?php foreach($division as $c) : ?>
											<tr>
												<th scope="row"><?= $i;?></th>
												<td><?= $c['division_name']; ?></td>
												<td><?= $c['directorate_name']; ?></td>
												<td>
													<a href="<?= base_url('admin/division_edit/')?>?id=<?php echo $c['id_division']; ?>"
														class="btn btn-circle btn-warning btn-sm"><i
															class="fa fa-edit"></i></a>
													<a onclick="return confirm('Yakin ingin hapus?')"
														href="<?= base_url('admin/division_delete/') . $c['id_division'] ?>"
														class="btn btn-circle btn-danger btn-sm"><i
															class="fa fa-trash"></i></a>
												</td>
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