<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<!-- Container Fluid-->
<div ng-controller="proyekController" class="ml-2 mr-2">
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
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!-- <h6 class="m-0 font-weight-bold text-secondary">Data Pegawai</h6> -->
                </div>
                <div class="table-responsive p-3">
                    <table datatable="ng" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th width="25%">Proyek</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Pengawas Lapangan</th>
                                <!-- <th>Progress</th> -->
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.proyek">
                                <td>{{$index+1}}</td>
                                <td>{{item.proyek}}</td>
                                <td>{{item.lokasi}}</td>
                                <td>{{item.waktu}}</td>
                                <td>{{item.nama}}</td>
                                <!-- <td>{{item.progress}}</td> -->
                                <td>
                                    <a href="" ng-click="detail(item, 'manajer')" class="text-secondary"><i
                                            class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
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
                    <h5 class="modal-title" style="color: white">{{model.id ? 'Ubah' : 'Tambah'}} Data Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form" novalidate ng-submit="!form.$invalid ? save(): ''" style="margin-top: 10px;"
                        class="needs-validation">
                        <div class="form-group row">
                            <label for="proyek" class="col-sm-3 col-form-label  col-form-label-sm">Proyek</label>
                            <div class="col-sm-9">
                                <input type="text" name="proyek" class="form-control form-control-sm"
                                    placeholder="Proyek" required ng-model="model.proyek">
                                <div class="invalid-feedback">
                                    Proyek harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="lokasi" class="col-sm-3 col-form-label  col-form-label-sm">Lokasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi" class="form-control form-control-sm"
                                    placeholder="Lokasi" required ng-model="model.lokasi">
                                <div class="invalid-feedback">
                                    Lokasi harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-3 col-form-label  col-form-label-sm">Lama
                                Pengerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="waktu" class="form-control form-control-sm"
                                    placeholder="Lama Pengerjaan" required ng-model="model.waktu">
                                <div class="invalid-feedback">
                                    Lama Pengerjaan harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pengawas" class="col-sm-3 col-form-label  col-form-label-sm">Pengawas</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="pengawas"
                                    ng-options="item as item.nama for item in datas.pegawai track by item.id"
                                    ng-model="pegawai" ng-change="model.pegawai_id=pegawai.id; model.nama=pegawai.nama"
                                    required>
                                </select>
                                <div class="invalid-feedback">
                                    Pengawas harus diisi.
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