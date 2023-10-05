<div class="modal fade" id="addkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Kamar Kost > Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formKamar" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="">Foto 1</label>
                  <input type="file" name="foto1" id="foto1" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="">Foto 2</label>
                  <input type="file" name="foto2" id="foto2" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="">Foto 3</label>
                  <input type="file" name="foto3" id="foto3" onchange="readFile(this)" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nomor Kamar</label>
                    <input type="text" class="form-control" value="KMR<?php echo sprintf("%04s", $nomor_kamar) ?>" readonly id="nomorkamar" name="nomorkamar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Fasilitas Kamar</label>
                    <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Lantai</label>
                    <select name="lantai" id="lantai" class="form-control" id="">
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
                    <input type="text" class="form-control" id="ukuran_kamar" name="ukuran_kamar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">--Pilih Status--</option>
                        <option value="Terisi">Terisi</option>
                        <option value="Kosong">Kosong</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Kamar</label>
                    <input type="date" name="tgl_kosong" id="tgl_kosong" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Harga Kamar</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="simpan_kamar()" id="btn_simpan" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>