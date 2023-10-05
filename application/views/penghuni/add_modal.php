<div class="modal fade" id="addpenghuni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Penghuni Kost > Tambah Penghuni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formPenghuni">
        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nomor Penghuni</label>
                    <input type="text" class="form-control" value="PEN<?php echo sprintf("%04s", $nomor_penghuni) ?>" readonly id="nomorpenghuni" name="nomorpenghuni">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama Penghuni</label>
                    <input type="text" class="form-control" id="nama_penghuni" name="nama_penghuni">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Kamar</label>
                    <select name="id_kamar" id="select_kamar" class="form-select form-select-sm">
                        <option value="">--Pilih Kamar--</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Keluar</label>
                    <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Alamat Penghuni</label>
                    <input type="text" class="form-control" id="alamat_penghuni" name="alamat_penghuni">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="simpan_penghuni()" id="btn_simpan" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>