$(document).ready(function() {
    oTable = $('#tabel-summary-hadir').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('') }}",
        "dataType": "json",
        "headers": {
            'content-type': 'application/json'
        },
        "method": "GET",
        "language": {
            "sProcessing": "Mengontak Server...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Data Tidak Tersedia",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Pencarian:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        },
        "columns": [{
                data: 'id_anggota'
            },
            {
                data: 'nama'
            },
            {
                data: 'kategori'
            },
            {
                data: 'nama_angkatan'
            },
            {
                data: 'bidang'
            },
            {
                data: 'Detail'
            }
        ]
    });

    $('.js-example-basic-multiple').select2();
});