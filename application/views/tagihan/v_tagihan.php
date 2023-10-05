<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tagihan</h4>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius: 15px;">
                <div class="card-header">
                <h4 class="text-center page-title"><u style="color: #000;">Tambah Data Tagihan</u></h4>
					<!-- <div class="d-flex align-items-center">
						<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#addfasilitas">
							<i class="fa fa-plus"></i>
								Tambah
						</button>
					</div> -->
				</div>
                <div class="card-body">
                    <form id="formTagihan"> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ID Transaksi</label>
                                <input type="text" class="form-control" name="id_transaksi" value="TR<?php echo sprintf("%04s", $nomor_tagihan) ?>" readonly id="id_transaksi">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">ID Penghuni</label>
                                <select name="id_penghuni_tagihan" id="id_penghuni_tagihan" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Penghuni</label>
                                <input type="text" class="form-control" name="nama_penghuni_tagih" id="nama_penghuni_tagih">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nomor Kamar</label>
                                <input type="text" class="form-control" name="nomor_kamar_tagih" id="nomor_kamar_tagih">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Harga Kamar</label>
                                <input type="text" class="form-control" name="harga_kamar_tagih" id="harga_kamar_tagih">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Bayar</label>
                                <input type="date" class="form-control" name="tgl_bayar" id="tgl_bayar">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Bayar</label>
                                <input type="text" class="form-control" onkeyup="inputRupiah(this); hitungSisaTagihan(this)" onkeypress="return onlyNumberKey(event)" name="bayar" id="bayar">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sisa Tagihan</label>
                                <input type="text" class="form-control" value="0" name="sisa_tagihan" id="sisa_tagihan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status Tagihan</label>
                                <input type="text" class="form-control" name="status_tagihan" id="status_tagihan">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="button" onclick="simpan_kamar()" id="btn_simpan" class="btn btn-round mx-auto btn-success" style="width: 20%;">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

				  