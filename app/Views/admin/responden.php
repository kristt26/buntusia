<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<!-- Container Fluid-->
<div ng-controller="respondenController" class="ml-2 mr-2">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{title}}</li>
            </ol>
        </div>
    </div>
    <div class="row" ng-if="!penilaian">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">Data Responden</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Faktor</th>
                                <th>Alternatif 1</th>
                                <th>Alternatif 2</th>
                                <th>Periode Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{datas.responden.respondenFaktor/16}} Responden</td>
                                <td>{{datas.responden.respondenAlt1/16}} Responden</td>
                                <td>{{datas.responden.respondenAlt2/18}} Responden</td>
                                <td>{{datas.responden.periode}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button ng-if="button1" class="btn btn-primary btn-sm" ng-click="proses()">Proses</button>
                <button ng-if="!button1" class="btn btn-primary btn-sm" ng-click="analisa()">Buka Menu Analisa</button>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample" ng-if="penilaian">
        <div class=" card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 style="color:blue">Analisis</h5>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12" ng-hide="true">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Geomean</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor"><strong>{{item.faktor}}</strong>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td><strong>{{item.faktor}}</strong></td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getNilaii(item.idkriteria, as.idkriteria)}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Nilai Priority Faktor</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor">{{item.faktor}}</td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td>{{item.faktor}}</td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getGeomean(item.idkriteria, as.idkriteria) | limitTo:6 }}
                                                </td>
                                                <td><strong>{{priority[$index]/datas.faktor.length | limitTo:6}}</strong>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5
                                        ng-class="{'text-danger': consistensiFaktor() >=0.1, 'text-success': consistensiFaktor() < 0.1 }">
                                        {{consistensiFaktor()}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" ng-hide="true">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Konsistensi MPB</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered mb-4">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor">{{item.faktor}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Kriteria Weights</strong></td>
                                                <td ng-repeat="item in priority">
                                                    <strong>{{item/datas.faktor.length}}</strong>
                                                </td>
                                            </tr>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td>{{item.faktor}}</td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getNilaii(item.idkriteria, as.idkriteria)}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered mb-3">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor">{{item.faktor}}</td>
                                                <td><strong>Weight Sum</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td>{{item.faktor}}</td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{setTerbobot(item.idkriteria, as.idkriteria)}}
                                                    <!-- {{getNilaii(item.idkriteria, as.idkriteria)*(priority[$index])/datas.faktor.length}} -->
                                                </td>
                                                <td><strong>{{sumWeight[$index]}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 1</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.faktor">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.faktor}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Priority</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt1"><strong>{{as.alternatif1}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt1">
                                                <td><strong>{{as.alternatif1}}</strong></td>
                                                <td ng-repeat="as1 in item.alt1">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.newpriority[$index]}}</strong></td>
                                            </tr>
                                        </tbody>
                                        <!-- <tfoot>
                                <tr>
                                    <td><strong>Sum</strong></td>
                                    <td ng-repeat="item in sumBobot"><strong>{{item}}</strong></td>
                                </tr>
                            </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 2</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.alt1">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.alternatif1}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Geomean</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt2"><strong>{{as.alternatif2}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt2">
                                                <td><strong>{{as.alternatif2}}</strong></td>
                                                <td ng-repeat="as1 in item.alt2">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.newpriority1[$index].priority}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5 ng-class="{'text-danger': item.cr >=0.1, 'text-success': item.cr < 0.1 }">
                                        {{item.cr}} {{item.cr < 0.1 ? '' : '(Pembobotan tidak Konsisten)'}}</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 style="color:blue">Sensifitas 1</h5>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12" ng-hide="true">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Geomean</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor"><strong>{{item.faktor}}</strong>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td><strong>{{item.faktor}}</strong></td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getNilaii(item.idkriteria, as.idkriteria)}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Nilai Priority Faktor</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor">{{item.faktor}}</td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td>{{item.faktor}}</td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getGeomean(item.idkriteria, as.idkriteria) | limitTo:6 }}
                                                </td>
                                                <td><strong>{{arr[$index] | limitTo:6}}</strong>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 1</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.faktor">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.faktor}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Priority</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt1"><strong>{{as.alternatif1}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt1">
                                                <td><strong>{{as.alternatif1}}</strong></td>
                                                <td ng-repeat="as1 in item.alt1">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.prioritySensi1[$index]}}</strong></td>
                                            </tr>
                                        </tbody>
                                        <!-- <tfoot>
                                <tr>
                                    <td><strong>Sum</strong></td>
                                    <td ng-repeat="item in sumBobot"><strong>{{item}}</strong></td>
                                </tr>
                            </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 2</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.alt1">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.alternatif1}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Geomean</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt2"><strong>{{as.alternatif2}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt2">
                                                <td><strong>{{as.alternatif2}}</strong></td>
                                                <td ng-repeat="as1 in item.alt2">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.prioritySensi1[$index].priority}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h5 style="color:blue">Sensifitas 2</h5>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Nilai Alternatif 2</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td><strong>Faktor</strong></td>
                                                <td ng-repeat="item in datas.faktor">{{item.faktor}}</td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datas.faktor">
                                                <td>{{item.faktor}}</td>
                                                <td ng-repeat="as in datas.faktor">
                                                    {{getGeomean(item.idkriteria, as.idkriteria) | limitTo:6 }}
                                                </td>
                                                <td><strong>{{arr1[$index] | limitTo:6}}</strong>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 1</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.faktor">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.faktor}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Priority</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt1"><strong>{{as.alternatif1}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt1">
                                                <td><strong>{{as.alternatif1}}</strong></td>
                                                <td ng-repeat="as1 in item.alt1">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.prioritySensi2[$index]}}</strong></td>
                                            </tr>
                                        </tbody>
                                        <!-- <tfoot>
                                <tr>
                                    <td><strong>Sum</strong></td>
                                    <td ng-repeat="item in sumBobot"><strong>{{item}}</strong></td>
                                </tr>
                            </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center ml-2 bg-success">
                            <h4>ALternatif 2</h4>
                        </div>
                        <div class="col-lg-12" ng-repeat="item in datas.alt1">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5>{{item.alternatif1}}</h5>
                                </div>
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Geomean</h6>
                                </div> -->
                                <div class="card-body">
                                    <table class="table table-bordered mb-5">
                                        <thead>
                                            <tr>
                                                <td><strong>Alternatif</strong></td>
                                                <td ng-repeat="as in item.alt2"><strong>{{as.alternatif2}}</strong></td>
                                                <td><strong>Priority</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="as in item.alt2">
                                                <td><strong>{{as.alternatif2}}</strong></td>
                                                <td ng-repeat="as1 in item.alt2">
                                                    {{showNilai(item.data, as.id, as1.id)}}
                                                </td>
                                                <td><strong>{{item.prioritySensi2[$index].priority}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<!-- <script src="<?=base_url()?>/template/js/demo/chart-area-demo.js"></script>
<script src="<?=base_url()?>/template/js/demo/chart-pie-demo.js"></script>
<script src="<?=base_url()?>/template/js/demo/chart-bar-demo.js"></script> -->
<!---Container Fluid-->
<?= $this->endSection() ?>