<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<!-- Container Fluid-->
<div ng-controller="periodeController" class="ml-2 mr-2">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{title}}</li>
            </ol>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">Tambah Periode</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="col-md-12">
                        <form ng-submit="save()">
                            <div class="form-group row">
                                <label for="periode" class="col-sm-3 col-form-label">Periode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" ng-model="model.periode"
                                        placeholder="Periode Penilaian">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12" align="right">
                                    <button type="submit" class="btn btn-outline-primary btn-sm"><i
                                            class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">Data Periode</h6>
                </div>
                <div class="table-responsive p-3">
                    <table datatable="ng" class="table align-items-center table-flush" id="example1">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Periode</th>
                                <th>Status</th>
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.periode}}</td>
                                <td>{{item.status=='true' ? 'Aktif' : 'Tidak Aktif'}}</td>
                                <td>
                                    <a href="" class="text-secondary"><i class="fa fa-pencil-alt"></i></a> &nbsp;
                                    <a href="" ng-click="delete(item)" class="text-secondary"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> -->
</div>
<?= $this->endSection() ?>