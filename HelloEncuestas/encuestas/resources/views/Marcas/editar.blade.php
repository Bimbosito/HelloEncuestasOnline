								<!-- Panel para editar una marca. Va ligada a la función editar del index.blade.php de la carpeta marca. -->
								<div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="javascript: editar();" method="POST" id="formMarcaEditar">
												<div class="modal-body">
													<center>
														<h3><strong>Editar Marca</strong></h3>	
														<div class="form-group">
															<label for="nombre">Nombre de la marca:</label><span style="padding: 0; color: red;">*</span>
															<input type="text" class="form-control" id="nombre" name="nombre" value="Marca 1" required></input>
														</div>
													</center>
												</div>
												<div class="modal-footer">
													<div class="row">
														<div class="col-xs-6" align="center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
														</div>
														<div class="col-xs-6" align="center">
															<button type="submit" class="btn btn-warning">Editar</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>