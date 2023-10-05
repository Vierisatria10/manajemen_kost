<script>
        $(document).ready(function() {
            tampilfasilitas();
            function tampilfasilitas() {
                var table = $('#fasilitas_kost').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "destroy": true,
                    "ajax": {
                        "url": "<?= base_url('FasilitasController/get_data_fasilitas') ?>",
                        "type": "POST",
                    },
                    "columnDefs": [{
                        "targets": [ 0 ],
                        "orderable": false,
                    }, ],
                });
            }
        });

    var i=0;
    $(document).on('click','.btn_remove',function() { 
        var button_id = $(this).attr("id");
        $('#fasilitas'+button_id+'').remove();
        i--;
        if(i==0) { 
            $(".form-control").prop('required',true);
        }
    });
        
    $('#addFasilitas').click(function() { 
        i++;
        $('#konten-fasilitas').append('<div id="fasilitas'+i+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+i+'</a></div><div class="col"><a id="'+i+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px; color: #fff; font-size: 12px;border-radius: 5px;"><i class="fas fa-trash"> Hapus</i></a></div></div><div class="row align-items-center"><div class="col"><label>Nama Fasilitas</label><input name="fasilitas[]" type="text" class="form-control" required></div></div></div></div>');
        $(".form-control").prop('required',false);
    });

    function simpan_fasilitas() {
        $('#btn_simpan').text('saving...');
        $('#btn_simpan').attr('disabled', true);

        var url = "<?= base_url('FasilitasController/add_fasilitas') ?>";

        var formData = new FormData($('#formFasilitas')[0]);
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
                    icon: 'success',
                    type: 'success',
                    title: 'Berhasil!',
                    text: 'Berhasil Simpan Data Fasilitas',
                    showConfirmButton: true,
                });
                $('#addfasilitas').modal('hide');
                $('#btn_simpan').text('Simpan'); //change button text
                $('#btn_simpan').attr('disabled',false); //set button enable 
                window.location = "<?= base_url('fasilitas') ?>";
            },
        });
    }
</script>