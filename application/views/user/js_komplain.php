<script>
    $(document).ready(function() {
        tampilkomplain();
        $('#id_penghuni_komplain').on('change', function(e) {
            get_penghuni_komplain();
        });

        get_data_penghuni_komplain();

        $("#id_penghuni_komplain").select2({
            // dropdownParent: $("#modal_add_pic"),
            width: '100%',
            height: '50px !important'
        });
    });

    function tampilkomplain() {
            var table = $('#komplain_kost').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "destroy": true,
                "ajax": {
                    "url": "<?= base_url('KomplainController/get_data_komplain') ?>",
                    "type": "POST",
                },
                "columnDefs": [{
                    "targets": [ 0 ],
                    "orderable": false,
                }, ],
            });
    }

    function get_data_penghuni_komplain() {
        $.ajax({
            url: "<?= base_url('UserController/get_data_penghuni_komplain') ?>",
            type: "get",
            dataType: "json",
            async: true,
           
            success: function(response) {
                Swal.close()
                //console.log(response)
                $('#id_penghuni_komplain').empty()
                $('#id_penghuni_komplain').append('<option value="">Pilih Penghuni</option>');
                //   //console.log(response)
                $.each(response.get_penghuni_komplain, function(i, data) {
                    $('#id_penghuni_komplain').append('<option value="' + data.id_penghuni + '">' + data.nomor_penghuni + '</option>');
                });

            },
            error: function(response) {
                //console.log('failed :' + response);
                $('#loading').hide();
                return Swal.fire({
                    icon: 'error',
                    title: 'Gagal Ambil Data Area!',
                    text: 'Silahkan Hubungi ITMAN'
                });
            }
        });
    }

    function simpan_komplain()
    {
        var url = "<?= base_url('UserController/add_komplain') ?>";

        var formData = new FormData($('#formKomplain')[0]);
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
                    // $('#btn_simpan').text('Simpan'); //change button text
                    // $('#btn_simpan').attr('disabled',false); //set button enable 
                    window.location = "<?= base_url('data_komplain') ?>";
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

    function get_penghuni_komplain()
    {
        var id_penghuni_komplain = $('#id_penghuni_komplain').val();

        $.ajax({
            url: "<?= base_url('UserController/get_penghuni_komplain') ?>",
            type: "get",
            data: {
                'id_penghuni_komplain': id_penghuni_komplain
            },
            dataType: "json",
            async: true,
            success: function(data) {
                console.log(data);

                if (data == null) {
                    toastr['error']('Data pada table penghuni tidak ada, tolong hubungi ITMAN untuk support data agar dapat diproses');
                    return false;
                }
                $('#nama_penghuni_komplain').val(data.nama_penghuni);
                $('#nomor_kamar_komplain').val(data.nomor_kamar);
            },
            error: function(data) {
                console.log('failed :' + data);
                $('#loading').hide();
                return Swal.fire({
                    icon: 'error',
                    title: 'Gagal Ambil Data Penghuni!',
                    text: 'Silahkan Hubungi Admin'
                });
            }
        });
    }
</script>
