                
					<div class="page-inner">
					    <?php echo $this->session->flashdata('pesan');?>
                        <div class="mt-2 mb-4">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-primary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-file"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Jumlah Tagihan</p>
                                                    <h4 class="card-title">0</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-info card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-file-1"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Total Komplain</p>
                                                    <h4 class="card-title">0</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						
                            <div class="col-sm-7 col-md-5">
                                <div class="card card-stats card-secondary card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-file-1"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category text-center">Total Tagihan</p>
                                                    <h4 class="card-title">576</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
					    </div>

                        <div class="card shadow" style="border-radius: 15px; background: #fafafe;">
                            <div class="card-body">
                                <div class="card-header">
                                    <h1 class="text-center font-weight-bold" style="color: #1f283e!important;">Halo, <?= $this->session->userdata('nama') ?></h1>
                                </div>
                                <div class="text-center mt-3">
                                    <h3 style="color: #1f283e!important;">Selamat Datang di Aplikasi SaluvKost <br> Aplikasi ini memudahkan Anda dalam <br> melihat history, transaksi, dan melaporkan <br> kendala terkait fasilitas kami</h3>
                                </div>
                            </div>
                        </div>
					</div>
				
				  