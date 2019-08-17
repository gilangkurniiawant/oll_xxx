<div class="row">
							<div class="col-md-offset-2 col-md-8">
                            <?php if($_SESSION['alert']!==''){ ?>
                            <div class="alert alert-info" role="alert">
                                 <?php echo $_SESSION['alert']; ?>
                            </div>
                            <?php } ?>
                                		<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-user"></i> Login</h3>
									</div>
									<div class="panel-body">
											<form class="form-horizontal" role="form" action="#" method="POST">
											<div class="form-group">
												<label class="col-md-2 control-label">Email</label>
												<div class="col-md-10">
													<input type="number" name="email" class="form-control" placeholder="Mohon baca kolom informasi dibawah ini sebelum menginput nomor">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-md-2 control-label">Password</label>
												<div class="col-md-10">
													<input type="number" name="password" class="form-control" placeholder="Mohon baca kolom informasi dibawah ini sebelum menginput nomor">
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">  
												<div class="pull-right">

                                                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Login</button>
                                                </div>
												</div>
											</div>
										</form>
									</div>
								
								</div>
							</div>
