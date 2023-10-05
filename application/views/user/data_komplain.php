<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Komplain Penghuni</h4>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius: 15px;">
                <div class="card-header">
                    <h2 class="text-dark text-center"><u>Ajukan Komplain</u></h2>
                </div>
                <div class="card-body">
                    <form id="formKomplain">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Komplain</label>
                                    <select name="jenis_komplain" class="form-control" id="jenis_komplain">
                                        <option value="">--Pilih Jenis--</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Fasilitas">Fasilitas</option>
                                        <option value="Kegaduhan">Kegaduhan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lama Keresahan</label>
                                    <input type="text" class="form-control" value="-" name="lama_keresahan" id="lama_keresahan">
                                    <p class="text-danger">Boleh tidak diisi</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ID Penghuni</label>
                                    <select name="id_penghuni_komplain" class="form-select form-select-sm" id="id_penghuni_komplain">
                                        <option value="">--Pilih Penghuni--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Penghuni</label>
                                    <input type="text" class="form-control" readonly name="nama_penghuni_komplain" id="nama_penghuni_komplain">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nomor Kamar</label>
                                    <input type="text" class="form-control" readonly name="nomor_kamar_komplain" id="nomor_kamar_komplain">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Permasalahan</label>
                                    <textarea name="permasalahan" id="permasalahan" class="form-control" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="button" onclick="simpan_komplain()" class="btn btn-success mx-auto btn-round">Ajukan Komplain</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
