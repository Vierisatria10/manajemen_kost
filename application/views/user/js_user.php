<script>
        $(document).ready(function() {
        tampiluser();
        // get_kamar();
            function tampiluser() {
                var table = $('#akun_penghuni').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "destroy": true,
                    "ajax": {
                        "url": "<?= base_url('UserController/get_data_user') ?>",
                        "type": "POST",
                    },
                    "columnDefs": [{
                        "targets": [ 0 ],
                        "orderable": false,
                    }, ],
                });
            }
        });
    function simpan_user()
    {
        $('#btn_simpan_user').text('saving...');
        $('#btn_simpan_user').attr('disabled', true);

        var url = "<?= base_url('UserController/add_user') ?>";

        var formData = new FormData($('#formUser')[0]);
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
                    $('#adduser').modal('hide');
                    // $('#btn_simpan').text('Simpan'); //change button text
                    // $('#btn_simpan').attr('disabled',false); //set button enable 
                    window.location = "<?= base_url('user') ?>";
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
                    // $('#btn_simpan').text('Simpan'); //change button text
                    // $('#btn_simpan').attr('disabled',false); //set button enable 
        
                }
            });
    }

    $('#btn_update_user').on('click', function(e) {
            e.preventDefault();
            var formDataUpdate = new FormData($('#formEditUser')[0]);
            console.log(formDataUpdate);
            
            $.ajax({
            url : "<?= base_url('UserController/update_user') ?>",
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
                        text: 'Data User Berhasil di Update',
                        showConfirmButton: true,
                        timer: 30000
                    });
                    $('#edituser').modal('hide');
                    window.location = '<?= base_url(); ?>user/penghuni';
            },
            error : function(response, xhr) {
                //    alert(base);
                Swal.close();
                console.log('failed :' + response);
                toastr["error"]("Gagal Import File, Periksa Kembali Koneksi Anda.");
            }
            });
        });

    function edit_user(id_user)
    {
        $.ajax({
            url: "<?= base_url('UserController/edit_user') ?>/" + id_user,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#id_user').val(data.id_user);
                $('#edit_nama').val(data.nama);
                $('#edit_username').val(data.username);
                $('#edit_password').val(data.password);
                $('#edit_level').val(data.level);
                $('#edit_no_hp').val(data.no_hp);
                $('#edituser').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                Swal.close();
                toastr['error']('Gagal mengambil data');
            }
        }); 
    }

    function delete_user(id_user)
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
                            url: '<?= base_url("UserController/delete_user") ?>/' + id_user,
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
                                    text: 'Berhasil Menghapus Data User',
                                    showConfirmButton: true,
                                });
                                // toastr['success']('Berhasil Menghapus Data Aplikasi');
                                window.location = '<?= base_url(); ?>user/penghuni';
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
</script>