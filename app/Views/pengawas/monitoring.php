<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="monitoringController" class="ml-2 mr-2">
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
                    <h6 class="m-0 font-weight-bold text-secondary">Monitoring Proyek</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="akses" class="col-sm-2 col-form-label  col-form-label-sm">Pilih Proyek</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm"
                                ng-options="item as item.proyek for item in datas" ng-model="proyek" placeholder="Pilih"
                                required>
                                <option value="">---Pilih Proyek---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akses" class="col-sm-2 col-form-label  col-form-label-sm">Pilih Pekerjaan</label>
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm"
                                ng-options="item as item.pekerjaan for item in proyek.pekerjaans" ng-model="pekerjaan"
                                placeholder="Pilih" required>
                            </select>
                        </div>
                    </div>
                    <h6 ng-if="pekerjaan.details.length>0" class="bg-primary" style="color: black">Checklist Detail
                        pekerjaan untuk melakukan
                        progress
                    </h6>
                    <h6 ng-if="pekerjaan.details.length==0" class="bg-danger" style="color: black">Detail Pekerjaan
                        belum
                        ditentukan,
                        silahkan hububungi bagian admin untuk mengkonfirmasi
                    </h6>
                    <div class="form-check" ng-repeat="item in pekerjaan.details">
                        <input class="form-check-input" type="checkbox" ng-model="item.checked"
                            id="defaultCheck{{$index}}" ng-change="check(item)">
                        <label
                            ng-class="{'form-check-label bg-success': item.checked, 'form-check-label': !item.checked}"
                            for="defaultCheck{{$index}}">
                            {{item.detail}}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>