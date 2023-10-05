<div class="modal fade" id="cetak_komplain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">Komplain Kost > Cetak Komplain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCetak">
            <input type="hidden" class="form-control" id="id_komplain" name="id_komplain">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Nomor Penghuni</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" readonly id="nomor_penghuni_cetak" name="nomor_penghuni_cetak">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Nama Penghuni</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" id="nama_penghuni_cetak" readonly name="nama_penghuni_cetak">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Nomor Kamar</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" id="nomor_kamar_cetak" readonly name="nomor_kamar_cetak">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Jenis Komplain</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" id="jenis_komplain_cetak" readonly name="jenis_komplain_cetak">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Lama Keresahan</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" id="lama_keresahan_cetak" readonly name="lama_keresahan_cetak">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 fw-bold mt-2">Permasalahan</div>
                        <input type="text" class="col-sm-8 form-control fw-bold" id="permasalahan_cetak" readonly name="permasalahan_cetak">
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" onclick="simpan_cetak()" id="btn_simpan" class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
      </div>
    </div>
  </div>
</div>