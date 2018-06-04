								<!-- Panel para crear una marca. Va ligada a la función gaurdar del index.blade.php de la carpeta marca. -->
								<div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form action="javascript: guardar();" method="POST" id="formMarcaCrear">
												<div class="modal-body">
													<center>
														<h3><strong>Nueva Marca</strong></h3>
															
															<div class="form-group">
																<label for="nombre">Nombre de la marca:</label><span style="padding: 0; color: red;">*</span>
																<input type="text" class="form-control" id="nombre" name="nombre" required></input>
															</div>
														
													</center>
												</div>
												<div class="modal-footer">
													<div class="row">
														<div class="col-xs-6" align="center">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
														</div>
														<div class="col-xs-6" align="center">
															<button type="submit" class="btn btn-warning">Guardar</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Panel que se muestra si se guardó la marca-->
								<div class="modal fade" id="modal-exito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/singo1.png')}}">
													<h3><strong>Éxito</strong></h3>
													<div id="contenidoExito"></div>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Panel que se muestra si NO se guardó la marca-->
								<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<center>
													<img src="{{asset('assets/images/signo2.png')}}">
													<h3><strong>Error</strong></h3>
													<div id="contenidoError"></div>
												</center>
											</div>
											<div class="modal-footer">
												<div class="row">
													<div class="col-xs-6" align="left">
														<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>