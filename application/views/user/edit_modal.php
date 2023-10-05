<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Akun Penghuni Kost > Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditUser">
        <div class="row">
            <input type="hidden" class="form-control" name="id_user" id="id_user">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="edit_nama" name="edit_nama">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="edit_username" name="edit_username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="edit_password" disabled name="edit_password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="edit_level" id="edit_level" class="form-control">
                        <option value="">--Pilih Level--</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Penghuni">Penghuni</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">No. Hp</label>
                    <input type="text" class="form-control" id="edit_no_hp" name="edit_no_hp">
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="update_user()" id="btn_update_user" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>