<html>

<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: center;
        height: 20px;
        margin: 8px;
    }

    .d-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .justify-content-between {
        -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
        justify-content: space-between !important;
    }

    .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }
    </style>
</head>

<body>
    <hr>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">Jenis Pekerjaan: <?= $pekerjaan;?></div>
            <div class="col-md-3">Bobot THD Kontrak: <?= $bobot;?></div>
            <div class="col-md-3">Progress Pencapaian: <?= $bobotTercapai;?></div>
        </div>
    </div>
    <table cellpadding="6" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Detail Pekerjaan</th>
                <th class="text-center">Bobot Pekerjaan</th>
                <th class="text-center">Status Pekerjaan</th>
                <th class="text-center">Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $key => $detail):?>
            <tr>
                <td><?= $key+1?></td>
                <td><?= $detail->detail?></td>
                <td><?= $detail->bobot?></td>
                <td><?= $detail->status=='1'? 'Selesai' : 'Belum Selesai'?></td>
                <td><?= $detail->status=='1'? $detail->bobot : 0?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th><?= $bobotTercapai?>%</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>