<div class="modal fade" id="addfasilitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Fasilitas Kost > Tambah Fasilitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formFasilitas">
            <div id="konten-fasilitas"></div>
                <div class="row mt-2">
                    <div class="col d-grid gap-2 text-center">
                        <a id="addFasilitas" class="btn btn-primary btn-block btn-order-secondary" style="color:#fff">Tambah Fasilitas</a>
                    </div>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="simpan_fasilitas()" id="btn_simpan" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>