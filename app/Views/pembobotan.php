<?=$this->extend('layout/layout')?>
<?=$this->section('content')?>
<div ng-controller="pembobotanController">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="card">
            <div class="col-md-12" ng-show="penilaian">
                <h4>Mana yang lebih penting untuk dipilih laboratorium untuk pengadaan</h4>
                <div class="table-responsive">
                    <table class="table table-hover" width="99%">
                        <tr ng-repeat=" item in data">
                            <td class="align-middle" style="width:20%">{{item.faktor}}</td>
                            <td>
                                <table class="table">
                                    <tr>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-9">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-8">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-7">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-6">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-5">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-4">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-3">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '1')" value="-2">
                                        </td>
                                        <td>
                                            =
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="2">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="3">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="4">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="5">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="6">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="7">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="8">
                                        </td>
                                        <td>
                                            <input type="radio" name="optionsRadios{{$index+1}}" id="optionsRadios1"
                                                ng-model="item.bobot" ng-change="setNilai(item, '2')" value="9">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            9
                                        </td>
                                        <td>
                                            8
                                        </td>
                                        <td>
                                            7
                                        </td>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            7
                                        </td>
                                        <td>
                                            8
                                        </td>
                                        <td>
                                            9
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle text-right" style="width:20%">{{item.faktor1}}</td>
                        </tr>
                    </table>
                </div>
                <div ng-if="hitungCR()>0.1" class="bg-danger text-white">Index Konsistemsi = {{hitungCR()}}</div>
                <div ng-if="hitungCR()<0.1" class="bg-success text-white">Index Konsistemsi = {{hitungCR()}}</div>
                <!-- <div class="table-responsive">
                    <table class="table table-hover mt-5" width="99%">
                        <thead>
                            <tr>
                                <td><strong>Faktor</strong></td>
                                <td ng-repeat="item in datas.faktor"><strong>{{item.faktor}}</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Criteria Weights</strong></td>
                                <td ng-repeat="item in priority"><strong>{{item}}</strong></td>
                            </tr>
                            <tr ng-repeat="item in datas.faktor">
                                <td><strong>{{item.faktor}}</strong></td>
                                <td ng-repeat="as in datas.faktor">
                                    {{getNilaii(item.idkriteria, as.idkriteria)}}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Sum</strong></td>
                                <td ng-repeat="item in jumlah"><strong>{{item}}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div> -->
                <div>
                    <button class="btn btn-primary pull-right" ng-click="save()">Simpan</button>
                </div>
            </div>
            <div class="col-md-12" ng-show="!penilaian">
                <h4>Anda telah melakukan penilaian di periode ini</h4>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>