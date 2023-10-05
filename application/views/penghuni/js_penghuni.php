<script>
    $(document).ready(function() {
        tampilpenghuni();
        get_kamar();
        function tampilpenghuni() {
            var table = $('#penghuni_kost').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "destroy": true,
                "ajax": {
                    "url": "<?= base_url('PenghuniController/get_data_penghuni') ?>",
                    "type": "POST",
                },
                "columnDefs": [{
                    "targets": [ 0 ],
                    "orderable": false,
                }, ],
            });
        }

        $('#select_kamar').select2({
            width: '100%',
            height:'50px !important'
        });
        $('#edit_select_kamar').select2({
            width: '100%',
            height:'50px !important'
        });
    });

    function simpan_penghuni()
    {
        $('#btn_simpan').text('saving...');
        $('#btn_simpan').attr('disabled', true);

        var url = "<?= base_url('PenghuniController/add_penghuni') ?>";

        var formData = new FormData($('#formPenghuni')[0]);
        console.log(formData);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: response.status,
                        type: response.status,
                        title: 'Berhasil!',
                        text: response.message,
                        showConfirmButton: true,
                    });
                    $('#addpenghuni').modal('hide');
                    $('#btn_simpan').text('Simpan'); //change button text
                    $('#btn_simpan').attr('disabled',false); //set button enable 
                    window.location = "<?= base_url('penghuni') ?>";
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log('error :' + failed);
                    Swal.fire({
                        icon : "error",
                        type: "error",
                        title: "Gagal !",
                        text: "Gagal Get Data"
                    });
                    $('#btn_simpan').text('Simpan'); //change button text
                    $('#btn_simpan').attr('disabled',false); //set button enable 
        
                }
            });
    }

    function edit_penghuni(id_penghuni)
    {
        $.ajax({
            url: "<?= base_url('PenghuniController/edit_penghuni') ?>/" + id_penghuni,
            type: "GET",
            dataType: "json",
            success: function(response) {
                $('#id_penghuni').val(response.edit_penghuni.id_penghuni);
                $('#edit_nomorpenghuni').val(response.edit_penghuni.nomor_penghuni);
                $('#edit_nama_penghuni').val(response.edit_penghuni.nama_penghuni);
                $('#edit_select_kamar').empty();
                $.each(response.edit_select_kamar, function(i, data) {
                    if (response.edit_penghuni == data.id_kamar) {
                        $('#edit_select_kamar').append('<option value="'+ data.id_kamar +'" selected>' + data.nomor_kamar + '</option>');
                    }else{
                        $('#edit_select_kamar').append('<option value="'+ data.id_kamar +'">' + data.nomor_kamar + '</option>');
                    }
                });
                $('#edit_select_kamar').val(response.edit_select_kamar.id_kamar);
                $('#edit_tgl_masuk').val(response.edit_penghuni.tgl_masuk);
                $('#edit_tgl_keluar').val(response.edit_penghuni.tgl_keluar);
                $('#edit_no_telepon').val(response.edit_penghuni.no_telepon);
                $('#edit_alamat_penghuni').val(response.edit_penghuni.alamat_penghuni);
                $('#editpenghuni').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.close();
                toastr['error']('Gagal mengambil data');
            }
        }); 
    }

    $('#btn_update_penghuni').on('click', function(e) {
            e.preventDefault();
            var formDataUpdate = new FormData($('#formEditPenghuni')[0]);
            console.log(formDataUpdate);
            
            $.ajax({
            url : "<?= base_url('PenghuniController/update_penghuni') ?>",
            type : "POST",
            dataType : "json",
            data :formDataUpdate,
            cache:false,
            processData:false,
            contentType:false,
            beforeSend: function() {
                SwalLoading('Sedang Update data, harap tunggu.');
            },
            success : function(response) {
                console.log(response)
                    Swal.close();
                    Swal.fire({
                        icon: response.status,
                        type: response.status,
                        title: 'Berhasil!',
                        text: response.message,
                        showConfirmButton: true,
                    });
                    $('#editpenghuni').modal('hide');
                    window.location = '<?= base_url(); ?>penghuni';
            },
            error : function(response, xhr) {
                //    alert(base);
                Swal.close();
                console.log('failed :' + response);
                toastr["error"]("Gagal Get Data, Periksa Kembali Koneksi Anda.");
            }
            });
        });

    function detail_penghuni(id_penghuni)
        {
            var base_url = '<?= base_url('upload/foto/') ?>';
            $('#detailpenghuni').modal('show');

            $.ajax({
                url: "<?= base_url('PenghuniController/detail_penghuni') ?>/" + id_penghuni,
                type: "GET",
                dataType: "JSON",
                beforeSend: function() {
                    $('.modal_detail').html(`
                        <div class="text-center">
                            Memuat...
                        </div>
                    `)
                },
                success: function(data) {
                    var html = '';

                    if (data.tgl_keluar == '') {
                        html += `
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id_detail_penghuni" name="id_detail_penghuni" value="`+ data.id_penghuni +`">
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">Nomor Penghuni</div>
                                            <div class="col-sm-8 fw-bold" name="detail_nomorpenghuni" id="detail_nomorpenghuni">: `+ data.nomor_penghuni +`</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">Nama Penghuni</div>
                                            <div class="col-sm-8" name="detail_nama_penghuni" id="detail_nama_penghuni">: `+ data.nama_penghuni +`</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">Nomor Kamar</div>
                                            <div class="col-sm-8 fw-bold" name="detail_id_kamar" id="detail_id_kamar">: `+ data.nomor_kamar +`</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">Tanggal Masuk</div>
                                            <div class="col-sm-8" name="detail_tgl_masuk" id="detail_tgl_masuk">: `+ data.tgl_masuk +`</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">Tanggal Keluar</div>
                                            <div class="col-sm-8" name="detail_tgl_keluar" id="detail_tgl_keluar">: - </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 fw-bold">No. Telepon</div>
                                            <div class="col-sm-8" name="detail_no_telepon" id="detail_no_telepon">: `+ data.no_telepon +`</div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        $('#body-detail').html(html);
                    }else{
                        html += `
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="id_detail_penghuni" name="id_detail_penghuni" value="`+ data.id_penghuni +`">
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Nomor Penghuni</div>
                                    <div class="col-sm-8 fw-bold" name="detail_nomorpenghuni" id="detail_nomorpenghuni">: `+ data.nomor_penghuni +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Nama Penghuni</div>
                                    <div class="col-sm-8" name="detail_nama_penghuni" id="detail_nama_penghuni">: `+ data.nama_penghuni +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Nomor Kamar</div>
                                    <div class="col-sm-8 fw-bold" name="detail_id_kamar" id="detail_id_kamar">: `+ data.nomor_kamar +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Tanggal Masuk</div>
                                    <div class="col-sm-8" name="detail_tgl_masuk" id="detail_tgl_masuk">: `+ data.tgl_masuk +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Tanggal Keluar</div>
                                    <div class="col-sm-8" name="detail_tgl_keluar" id="detail_tgl_keluar">: `+ data.tgl_keluar +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">No. Telepon</div>
                                    <div class="col-sm-8" name="detail_no_telepon" id="detail_no_telepon">: `+ data.no_telepon +`</div>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#body-detail').html(html);
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log('error :' + failed);
                    Swal.fire({
                        icon : "error",
                        title: "Gagal !",
                        text: "Gagal Get Data"
                    });
                }
            });
        }

    function get_kamar() 
    {
        $.ajax({
            url: "<?= base_url('PenghuniController/get_kamar') ?>",
            type: "GET",
            dataType: "json",
            // beforeSend: function() {
            //     SwalLoading('Sedang mengambil data, harap tunggu..');
            // },
            success: function(response) {
                $.each(response.get_kamar, function(i, data) {
                    $('#select_kamar').append('<option value="'+ data.id_kamar +'">' + data.nomor_kamar + '</option>');
                });
            },
            error: function(response) {
                Swal.close();
                return toastr['error']('Gagal Get Data, Silahkan Hubungi TIM IT');
            }
        });
    }

        function delete_penghuni(id_penghuni)
        {
            Swal.fire({
                icon: 'warning',
                title: 'Apakah Anda Yakin Akan Menghapus Data ?',
                text: "Data Yang Dihapus Tidak Dapat Dikembalikan, Hapus?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batalkan',
                showLoaderOnConfirm: true,
                reverseButtons: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: '<?= base_url("PenghuniController/delete_penghuni") ?>/'+id_penghuni,
                            type: "get",
                            dataType: "json",
                            beforeSend: function() {
                                SwalLoading('Proses Menghapus Data, harap tunggu.');
                            },
                            success: function(response) {
                                Swal.close();
                                Swal.fire({
                                    icon: 'success',
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Berhasil Menghapus Data Penghuni',
                                    showConfirmButton: true,
                                });
                                // toastr['success']('Berhasil Menghapus Data Aplikasi');
                                window.location = '<?= base_url(); ?>penghuni';
                            },
                            error: function(response) {
                                console.log('failed :' + response);
                                $('#loading').hide();
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Internal Server Error!',
                                    text: 'Silakan coba beberapa saat lagi / hubungi ITMAN.'
                                });
                            }
                        });
                    });
                },
                allowOutsideClick: false
            });
        }
        function SwalLoading(html = 'Loading ...', title = '') {
            return Swal.fire({
                title: title,
                html: html,
                customClass: 'swal-wide',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 2000)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    
                }
            });
        }
</script>