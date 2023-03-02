<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="proyekPengawasController" class="ml-2 mr-2">
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
                </div>
                <div class="table-responsive p-3">
                    <table datatable="ng" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th width="25%">Proyek</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Progress</th>
                                <!-- <th><i class="fa fa-cog"></i></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.proyek}}</td>
                                <td>{{item.lokasi}}</td>
                                <td>{{item.waktu}}</td>
                                <td>{{item.progress}} %</td>
                                <!-- <td>
                                    <a href="" ng-click="detail(item)" class="text-secondary"><i
                                            class="fa fa-eye"></i></a>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>