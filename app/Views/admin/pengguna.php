<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<!-- Container Fluid-->
<div ng-controller="penggunaController" class="ml-2 mr-2">
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
                                <th>Nama</th>
                                <th>Level Akses</th>
                                <th>Username</th>
                                <th>Status</th>
                                <!-- <th><i class="fa fa-cog"></i></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.nama}}</td>
                                <td>{{item.role}}</td>
                                <td>{{item.username}}</td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch{{$index}}"
                                            ng-model="item.switch" ng-change="testing(item)">
                                        <label class="custom-control-label" for="customSwitch{{$index}}"></label>
                                    </div>
                                </td>
                                <!-- <td>
                                    <a href="" class="text-secondary" ng-click="edit(item)"><i
                                            class="fa fa-pencil-alt"></i></a> &nbsp;
                                    <a href="" ng-click="delete(item)" class="text-secondary"><i
                                            class="fa fa-trash"></i></a>
                                </td> -->
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
                    <h5 class="modal-title" style="color: white">{{model.id ? 'Ubah' : 'Tambah'}} Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form" novalidate ng-submit="!form.$invalid ? save(): ''" style="margin-top: 10px;"
                        class="needs-validation">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label  col-form-label-sm">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control form-control-sm" placeholder="Nama"
                                    required ng-model="model.nama">
                                <div class="invalid-feedback">
                                    Nama harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label  col-form-label-sm">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control form-control-sm"
                                    placeholder="Alamat" required ng-model="model.alamat">
                                <div class="invalid-feedback">
                                    Alamat harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label  col-form-label-sm">Tempat
                                Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control form-control-sm"
                                    placeholder="Tempat Lahir" required ng-model="model.tempat_lahir">
                                <div class="invalid-feedback">
                                    Tempat lahir harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-3 col-form-label  col-form-label-sm">Tanggal
                                Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" class="form-control form-control-sm"
                                    placeholder="Tanggal Lahir" required ng-model="model.tgl_lahir">
                                <div class="invalid-feedback">
                                    Tanggal lahir harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label  col-form-label-sm">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control form-control-sm"
                                    placeholder="Email" required ng-model="model.email">
                                <div class="invalid-feedback">
                                    Email harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-3 col-form-label  col-form-label-sm">No. Telp</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" class="form-control form-control-sm"
                                    placeholder="No. Telp" required ng-model="model.no_telp">
                                <div class="invalid-feedback">
                                    No telepon harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" ng-if="!model.id">
                            <label for="username" class="col-sm-3 col-form-label  col-form-label-sm">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control form-control-sm"
                                    placeholder="Username" required ng-model="model.username">
                                <div class="invalid-feedback">
                                    Username harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" ng-if="!model.id">
                            <label for="password" class="col-sm-3 col-form-label  col-form-label-sm">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control form-control-sm"
                                    placeholder="Password" required ng-model="model.password">
                                <div class="invalid-feedback">
                                    Password harus diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" ng-if="!model.id">
                            <label for="akses" class="col-sm-3 col-form-label  col-form-label-sm">Level Akses</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="akses" ng-model="model.role"
                                    placeholder="Pilih" required>
                                    <option></option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Pengawas">Pengawas</option>
                                </select>
                                <div class="invalid-feedback">
                                    Level akses harus diisi.
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