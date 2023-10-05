<div class="modal fade" id="editkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Kamar Kost > Edit Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditKamar" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id_kamar" name="id_kamar"/> 
        <div class="row">
            <div class="col-md-4">
              <div class="form-group" id="photo1">
                  
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="photo2">
                  
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="photo3">
                  
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="label-photo">
                  <label for="">Foto 1</label>
                  <input type="file" name="edit_foto1" id="edit_foto1" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="label-photo2">
                  <label for="">Foto 2</label>
                  <input type="file" name="edit_foto2" id="edit_foto2" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="label-photo3">
                  <label for="">Foto 3</label>
                  <input type="file" name="edit_foto3" id="edit_foto3" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nomor Kamar</label>
                    <input type="text" class="form-control" readonly id="edit_nomorkamar" name="edit_nomorkamar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Fasilitas Kamar</label>
                    <input type="text" class="form-control" id="edit_fasilitas" name="edit_fasilitas">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Lantai</label>
                    <select name="edit_lantai" id="edit_lantai" class="form-control">
                        <option value="">--Pilih Lantai--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Ukuran Kamar</label>
                    <input type="text" class="form-control" id="edit_ukuran_kamar" name="edit_ukuran_kamar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="edit_status" id="edit_status" class="form-control">
                        <option value="">--Pilih Status--</option>
                        <option value="Terisi">Terisi</option>
                        <option value="Kosong">Kosong</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Kamar</label>
                    <input type="date" name="edit_tgl_kosong" id="edit_tgl_kosong" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Harga Kamar</label>
                    <input type="text" class="form-control" id="edit_harga" name="edit_harga">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="btn_update" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>