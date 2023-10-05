<div class="modal fade" id="editpenghuni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Penghuni Kost > Edit Penghuni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditPenghuni">
        <input type="hidden" id="id_penghuni" name="id_penghuni">
        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nomor Penghuni</label>
                    <input type="text" class="form-control" readonly id="edit_nomorpenghuni" name="edit_nomorpenghuni">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama Penghuni</label>
                    <input type="text" class="form-control" id="edit_nama_penghuni" name="edit_nama_penghuni">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Kamar</label>
                    <select name="edit_id_kamar" id="edit_select_kamar" class="form-select form-select-sm">
                        <option value="">--Pilih Kamar--</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="edit_tgl_masuk" name="edit_tgl_masuk">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Keluar</label>
                    <input type="date" name="edit_tgl_keluar" id="edit_tgl_keluar" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="edit_no_telepon" id="edit_no_telepon" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Alamat Penghuni</label>
                    <input type="text" class="form-control" id="edit_alamat_penghuni" name="edit_alamat_penghuni">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="btn_update_penghuni" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>