<div class="col-md-12">
    <div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-history"></i> Daftar Ikan</h3> 
							         </div>
									<div class="panel-body">
								<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover m-0">
												<thead>
													<tr>
                                                    <th>ID</th>
                                                  <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Kondisi</th>
            <th>Status</th>
													</tr>
												</thead>
												<tbody>
													
                                                    																									</tbody>
											</table>

                                            <table>
        <tr>
           
        </tr>
        <?php foreach($data as $d){?>
        <tr>
             <td><?=$d['id']?></td>
            <td><a href="<?=$d['url']?>" target="_blank"><?=$d['title']?></a></td>
            <td><?=$d['category_id']?></td>
            <td><?=$d['params']['price']['value']?></td>
            <td><?=$d['params']['condition']['value']?></td>
            <td><?=$d['status']?></td>
            
        </tr>
        <?php }}?>
    </table>
										</div>
									</div>
                                </div>
                            </div>
                        </div>