<script>
    $(document).ready(function() {
        $('#id_penghuni_tagihan').on('change', function(e) {
            get_penghuni();
        });
        
        get_data_penghuni();

        $("#id_penghuni_tagihan").select2({
            // dropdownParent: $("#modal_add_pic"),
            width: '100%',
            height: '50px !important'
        });
    });
    

    function get_data_penghuni() {
        $.ajax({
            url: "<?= base_url('TagihanController/get_data_penghuni') ?>",
            type: "get",
            dataType: "json",
            async: true,
            beforeSend: function() {
                SwalLoading('Sedang mengambil data, harap tunggu.');
            },
            success: function(response) {
                Swal.close()
                //console.log(response)
                $('#id_penghuni_tagihan').empty()
                $('#id_penghuni_tagihan').append('<option value="">Pilih Nomor Penghuni</option>');
                //   //console.log(response)
                $.each(response.get_penghuni, function(i, data) {
                    $('#id_penghuni_tagihan').append('<option value="' + data.id_penghuni + '">' + data.nomor_penghuni + '</option>');
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

    function get_penghuni() {
        var id_penghuni_tagihan = $('#id_penghuni_tagihan').val();

        $.ajax({
            url: "<?= base_url('TagihanController/get_nama_penghuni') ?>",
            type: "get",
            data: {
                'id_penghuni_tagihan': id_penghuni_tagihan
            },
            dataType: "json",
            async: true,
            success: function(data) {
                console.log(data);

                if (data == null) {
                    toastr['error']('Data pada table penghuni tidak ada, tolong hubungi ITMAN untuk support data agar dapat diproses');
                    return false;
                }
                $('#nama_penghuni_tagih').val(data.nama_penghuni);
                $('#nomor_kamar_tagih').val(data.nomor_kamar);
                $('#harga_kamar_tagih').val(formatRupiah(data.harga));
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

    function inputRupiah(e) {
        $('input[name="bayar"]').val(formatRupiah(e.value, ''));
    }

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    function hitungSisaTagihan(e) {
        // var harga = $('input[name="harga_kamar_tagih"]').val()
        // harga = harga !== '' ? harga : '0';
        // harga = harga.split('.').join('')
        var harga = $('input[name="harga_kamar_tagih"]').val()
        // harga = harga !== '' ? parseFloat(harga) : 0;
        harga = harga !== '' ? harga : '0';
        harga = harga.split('.').join('')

        var bayar = $('input[name="bayar"]').val()
        bayar = bayar !== '' ? parseFloat(bayar) : 0;
        // bayar = bayar.split('.').join('')
        
        var total = bayar - harga;
        total = Math.round(total);
        $('input[name="sisa_tagihan"]').val(formatRupiah(total.toString()))
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>