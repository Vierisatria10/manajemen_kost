<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kamar Kost</h4>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
					<div class="d-flex align-items-center">
						<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#addkamar">
							<i class="fa fa-plus"></i>
								Tambah
						</button>
					</div>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="kamar_kost" style="width: 100%;" class="display table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Nomor Kamar</td>
                                    <td class="text-center">Fasilitas</td>
                                    <td class="text-center">Lantai</td>
                                    <td class="text-center">Ukuran Kamar</td>
                                    <td class="text-center">Harga</td>
                                    <td class="text-center">Status</td>
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
<?php $this->load->view('kamar/add_modal') ?>
<!-- Modal Edit -->
<?php $this->load->view('kamar/edit_modal') ?>
<!-- Modal Detail -->
<?php $this->load->view('kamar/detail_modal') ?>
				  