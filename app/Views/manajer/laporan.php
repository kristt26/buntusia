<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="laporanController" class="ml-2 mr-2">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{title}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div class="form-group row">
                            <label for="akses" class="col-sm-3 col-form-label  col-form-label-sm">Pilih Proyek</label>
                            <div class="col-sm-7">
                                <select class="form-control form-control-sm"
                                    ng-options="item as item.proyek for item in datas" ng-model="proyek"
                                    placeholder="Pilih" required>
                                    <option value="">---Pilih Proyek---</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="ml-3">
                    <a href="<?= base_url('admin/laporan/download?id=')?>/{{proyek.proyek_id}}"
                        class="btn btn-outline-primary btn-sm" style="margin-bottom: 10px;margin-top: -10px;"
                        ng-if="proyek" target="_blank"><i class="fa fa-download"></i>Download</a>
                </div>
                <div class="table-responsive p-3" ng-if="proyek" ng-repeat="item in proyek.pekerjaans">
                    <table class="table table-borderless">
                        <tr>
                            <td>Jenis Pekerjaan</td>
                            <td>: {{item.pekerjaan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Bobot THD Kontrak</td>
                            <td>: {{item.bobot}}</td>
                        </tr>
                        <tr>
                            <td>Progress Pencapaian</td>
                            <td>: {{item.bobot * (item.bobotTercapai/100) | limitTo:5}}</td>
                        </tr>
                    </table>
                    <table class="table align-items-center table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Detail Pekerjaan</th>
                                <th>Bobot Pekerjaan</th>
                                <th>Status Pekerjaan</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="detail in item.details">
                                <td>{{$index+1}}</td>
                                <td>{{detail.detail}}</td>
                                <td>{{detail.bobot}}</td>
                                <td>{{detail.status=='1'?'Selesai':'Belum Selesai'}}</td>
                                <td>{{detail.status=='1'?detail.bobot:'0'}}%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total</th>
                                <th>{{item.bobotTercapai}}%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
h5 {
    font-weight: bold !important;
}
</style>
<?= $this->endSection() ?>