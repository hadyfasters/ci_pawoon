$(document).ready(function() {
    $('#tbl_user').DataTable();
    $('#tbl_otorisasi').DataTable();
    $('#tbl_supply').DataTable();
    $('#tbl_supplier').DataTable();
    $('#tbl_customer').DataTable();
    $('#tbl_brg_masuk').DataTable();
    $('#tbl_brg_keluar').DataTable();
    $('#tbl_brg_harian').DataTable();
    $('#tbl_brg_mingguan').DataTable();
    $('#tbl_brg_bulanan').DataTable();
    $('#tbl_rekapitulasi_brg').DataTable();
    $('#tbl_order').DataTable();
    $(".select2").select2();

    $('.tgl_kalender').datepicker({ autoclose:true });

    $('#showRekap').click(function(){
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $.ajax({
            url : 'laporan/getData',
            type : 'POST',
            data : {
                'start_date' : start_date,
                'end_date' : end_date
            },
            success : function(response){
                var dt = $.parseJSON(response);
                $('#rekapData').html(dt.tbl);
            }
        });
    });
} );