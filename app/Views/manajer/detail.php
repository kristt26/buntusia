<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<!-- Container Fluid-->
<div ng-controller="detailController" class="ml-2 mr-2">
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-md-6">
                <h4 class="h3 mb-0 text-gray-800">{{title}}</h4>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#" onclick="history.go(-2)">Proyek</a></li>
                <li class="breadcrumb-item"><a href="#" onclick="history.back()">Jenis Pekerjaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{title}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">Detail Jenis Pekerjaan: <strong>
                            {{datas.pekerjaan.pekerjaan}}</strong>
                    </h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="d-flex justify-content-between">
                        <a href="" class="btn btn-outline-secondary btn-sm"
                            style="margin-bottom: 10px;margin-top: -10px;" onclick="history.back()"><i
                                class="fa fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <table datatable="ng" class="table align-items-center table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Detail Pekerjaan</th>
                                <th class="text-center">Bobot Pekerjaan {{datas.pekerjaan.bobot}} %</th>
                                <!-- <th>Status</th> -->
                                <!-- <th>Progress</th> -->
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.detail">
                                <td>{{$index+1}}</td>
                                <td>{{item.detail}}</td>
                                <td>{{item.bobot}} %</td>
                                <!-- <td>{{item.status=='0'? '0':'100'}}</td> -->
                                <td ng-class="{'bg-success':item.status=='1', 'bg-danger':item.status=='0'}">
                                    {{item.status=='1'? 'Selesai':'Belum Selesai'}}</td>
                                <!-- <td>{{item.progress}}</td> -->
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total Bobot</td>
                                <!-- <td>{{bobotPekerjaan(datas.detail)}} %</td> -->
                                <td ng-class="{'bg-danger': totalBobot(datas.detail)>100}">
                                    {{totalBobot(datas.detail)}} %</td>
                                <!-- <td ng-class="{'bg-danger': totalBobot(datas.pekerjaan)>100}">
                                    {{totalBobot(datas.detail)}} %</td> -->
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" style="color: white">{{model.id ? 'Ubah' : 'Tambah'}} Data Detail Pekerjaan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form" novalidate ng-submit="!form.$invalid ? save(): ''" style="margin-top: 10px;"
                        class="needs-validation">
                        <div class="form-group row">
                            <label for="detail" class="col-sm-3 col-form-label  col-form-label-sm">Detail
                                Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="detail" class="form-control form-control-sm"
                                    placeholder="Detail Pekerjaan" required ng-model="model.detail">
                                <div class="invalid-feedback">
                                    Detail Pekerjaan harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="bobot" class="col-sm-3 col-form-label  col-form-label-sm">Bobot</label>
                            <div class="col-sm-9">
                                <input type="number" name="bobot" class="form-control form-control-sm"
                                    placeholder="Bobot" required ng-model="model.bobot" step="any">
                                <div class="invalid-feedback">
                                    Bobot harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12" align="right">
                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-save"></i>
                                    Simpan</button>
                                <button type="button" class="btn btn-outline-warning btn-sm" data-dismiss="modal"><i
                                        class="fa fa-undo-alt"></i>
                                    Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
td {
    color: black !important;
}
</style>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
<?= $this->endSection() ?>