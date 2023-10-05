<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Akun Penghuni</h4>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="d-flex align-items-center">
						<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#adduser">
							<i class="fa fa-plus"></i>
								Tambah
						</button>
					</div>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="akun_penghuni" style="width: 100%;" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">No</td>
                                    <td class="text-center">Nama</td>
                                    <td class="text-center">Username</td>
                                    <td class="text-center">Level</td>
                                    <td class="text-center">No. Hp</td>
                                    <td class="text-center">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add -->
<?php $this->load->view('user/add_modal') ?>
<!-- Modal Edit -->
<?php $this->load->view('user/edit_modal') ?>
				  