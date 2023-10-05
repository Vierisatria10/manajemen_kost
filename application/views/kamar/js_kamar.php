<script>
      $(document).ready(function() {
            tampilkamar();
        });
        function tampilkamar() {
            var table = $('#kamar_kost').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "destroy": true,
                "ajax": {
                    "url": "<?= base_url('KamarController/get_data_kamar') ?>",
                    "type": "POST",
                },
                "columnDefs": [{
                    "targets": [ 0 ],
                    "orderable": false,
                }, ],
            });
        }

        function simpan_kamar() {
            $('#btn_simpan').text('saving...');
            $('#btn_simpan').attr('disabled', true);

            var url = "<?= base_url('KamarController/add_kamar') ?>";

            var formData = new FormData($('#formKamar')[0]);
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
                        timer: 30000
                    });
                    $('#addkamar').modal('hide');
                    $('#btn_simpan').text('Simpan'); //change button text
                    $('#btn_simpan').attr('disabled',false); //set button enable 
                    window.location = "<?= base_url('kamar') ?>";
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
        
        $('#btn_update').on('click', function(e) {
            e.preventDefault();
            var formDataUpdate = new FormData($('#formEditKamar')[0]);
            console.log(formDataUpdate);
            
            $.ajax({
            url : "<?= base_url('KamarController/update_kamar') ?>",
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
                        icon: 'success',
                        type: 'success',
                        title: 'Berhasil!',
                        text: 'Data Kamar Berhasil di Update',
                        showConfirmButton: true,
                        timer: 30000
                    });
                    $('#editkamar').modal('hide');
                    window.location = '<?= base_url(); ?>kamar';
            },
            error : function(response, xhr) {
                //    alert(base);
                Swal.close();
                console.log('failed :' + response);
                toastr["error"]("Gagal Import File, Periksa Kembali Koneksi Anda.");
            }
            });
        });

        function edit_kamar(id_kamar)
        {
            var base_url = '<?= base_url('upload/foto/') ?>';
            $.ajax({
                url: "<?= base_url('KamarController/edit_kamar') ?>/" + id_kamar,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#id_kamar').val(data.id_kamar);
                    $('#edit_nomorkamar').val(data.nomor_kamar);
                    $('#edit_fasilitas').val(data.fasilitas);
                    $('#edit_ukuran_kamar').val(data.ukuran_kamar);
                    $('#edit_lantai').val(data.lantai);
                    $('#edit_tgl_kosong').val(data.tgl_kosong);
                    $('#edit_status').val(data.status);
                    $('#edit_harga').val(data.harga);
                    
                    $('#editkamar').modal('show');

                    if(data.foto1)
                    {
                        // $('#label-photo').text('Foto 1'); // label photo upload
                        $('#photo1').html('<img src="'+ base_url + data.foto1 +'" class="img-responsive" width="70">'); // show photo
                        $('#photo1').append('<input type="checkbox" name="remove_photo1" value="'+ base_url + data.foto1+'"/> Remove photo when saving'); // remove photo
                        
                    }
                    else
                    {
                        $('#label-photo').text('Upload Photo'); // label photo upload
                        $('#photo1 div').text('(No photo)');
                    }

                    if (data.foto2) {
                        $('#photo2').html('<img src="'+ base_url + data.foto2 +'" class="img-responsive" width="70">'); // show photo
                        $('#photo2').append('<input type="checkbox" name="remove_photo2" value="'+ base_url + data.foto2+'"/> Remove photo when saving'); // remove photo
                    }else{
                        $('#label-photo2').text('Upload Photo'); // label photo upload
                        $('#photo2 div').text('(No photo)');
                    }

                    if (data.foto3) {
                        $('#photo3').html('<img src="'+ base_url + data.foto3 +'" class="img-responsive" width="70">'); // show photo
                        $('#photo3').append('<input type="checkbox" name="remove_photo3" value="'+ base_url + data.foto3+'"/> Remove photo when saving'); // remove photo
                    }else{
                        $('#label-photo3').text('Upload Photo'); // label photo upload
                        $('#photo3 div').text('(No photo)');
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

        function detail_kamar(id_kamar)
        {
            var base_url = '<?= base_url('upload/foto/') ?>';
            $('#detailkamar').modal('show');

            $.ajax({
                url: "<?= base_url('KamarController/detail_kamar') ?>/" + id_kamar,
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
                    html += `
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="id_detail_kamar" name="id_detail_kamar" value="`+ data.detail_kamar.id_kamar +`">
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Foto Kamar</div>
                                    <div id="carouselExampleIndicators" class="carousel slide col-sm-8" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="`+ base_url + data.detail_kamar.foto1 +`" class="img-responsive" width="100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="`+ base_url + data.detail_kamar.foto2 +`" class="img-responsive" width="100">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="`+ base_url + data.detail_kamar.foto3 +`" class="img-responsive" width="100">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Nomor Kamar</div>
                                    <div class="col-sm-8 fw-bold" name="detail_nomorkamar" id="detail_nomorkamar">: `+ data.detail_kamar.nomor_kamar +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Fasilitas Kamar</div>
                                    <div class="col-sm-8" name="detail_fasilitas" id="detail_fasilitas">: `+ data.detail_kamar.fasilitas +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Lantai</div>
                                    <div class="col-sm-8" name="detail_lantai" id="detail_lantai">: `+ data.detail_kamar.lantai +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Ukuran Kamar</div>
                                    <div class="col-sm-8" name="detail_ukuran_kamar" id="detail_ukuran_kamar">: `+ data.detail_kamar.ukuran_kamar +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Status</div>
                                    <div class="col-sm-8" name="detail_status" id="detail_status">: `+ data.detail_kamar.status +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Nama Penghuni</div>
                                    <div class="col-sm-8" name="detail_nama_penghuni" id="detail_nama_penghuni">: `+ data.detail_kamar.nama_penghuni +`</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 fw-bold">Tanggal Kamar</div>
                                    <div class="col-sm-8" name="detail_tgl_kosong" id="detail_tgl_kosong">: `+ data.detail_kamar.tgl_kosong +`</div>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#body-detail').html(html);
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

        function delete_kamar(id_kamar)
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
                            url: '<?= base_url("KamarController/delete_kamar") ?>/'+id_kamar,
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
                                    text: 'Berhasil Menghapus Data Kamar',
                                    showConfirmButton: true,
                                    timer: 30000
                                });
                                // toastr['success']('Berhasil Menghapus Data Aplikasi');
                                window.location = '<?= base_url(); ?>kamar';
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

        function readFile(input) {
            let files = input.files[0];

            if (files.type == "application/gif" | files.type == "image/png" | files.type == "image/jpg"| files.type == "image/jpeg") {
                //validasi ukuran file dalam byte, example 1 mega
                if( files.size > 10240000){
                    alert("ukuran file lebih besar dari 100 Mb")
                    // $('[name="edit_gambar"]').val('');
                    $('[name="foto1"]').val('');
                    $('[name="foto2"]').val('');
                    $('[name="foto3"]').val('');
                    return false;
                }else{
                    /** retrive penampungan nama file upload */
                    // code executed
                }
            }else{
                //jika extensi file tidak sesuai, muncul warning    
                toastr['warning']("Extension file upload tidak sesuai !")
                // $('[name="edit_gambar"]').val('');
                $('[name="foto1"]').val('');
                $('[name="foto2"]').val('');
                $('[name="foto3"]').val('');
                return false;
            }

        }
    
</script>