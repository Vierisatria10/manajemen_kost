<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Akun Penghuni Kost > Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUser">
        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="">--Pilih Level--</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Penghuni">Penghuni</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">No. Hp</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="simpan_user()" id="btn_simpan_user" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>