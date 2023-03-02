<html>

<head>
    <style>
    table {
        font-family: arial, sans-serif;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: center;
        height: 20px;
        margin: 8px;
    }
    </style>
</head>

<body>
    <hr>
    <div class="col-md-12">
        <div class="col-md-3">Proyek: <?= $proyek?></div>
        <div class="col-md-3">Lokasi: <?= $lokasi?></div>
    </div>
    <table cellpadding="6" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Pekerjaan</th>
                <th class="text-center">Bobot Pekerjaan</th>
                <th class="text-center">Progress Capaian</th>
                <th class="text-center">Jumlah Progress</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pekerjaans as $key => $pekerjaan):?>
            <tr>
                <td><?= $key+1?></td>
                <td><?= $pekerjaan->pekerjaan?></td>
                <td><?= $pekerjaan->bobot?></td>
                <td><?= $pekerjaan->bobotTercapai/100?></td>
                <td><?= ($pekerjaan->bobotTercapai/100)*$pekerjaan->bobot?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th><?= $progress?>%</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>