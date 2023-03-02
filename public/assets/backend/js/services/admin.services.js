angular.module('admin.service', [])
// admin
    .factory('dashboardServices', dashboardServices)
    .factory('pegawaiServices', pegawaiServices)
    .factory('proyekServices', proyekServices)
    .factory('pekerjaanServices', pekerjaanServices)
    .factory('detailServices', detailServices)
    .factory('penggunaServices', penggunaServices)
    .factory('laporanServices', laporanServices)
    
    // pengawas
    .factory('proyekPengawasServices', proyekPengawasServices)
    .factory('monitoringServices', monitoringServices)
    ;

// admin
function dashboardServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + 'home/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get,
        post: post,
        put: put
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'read',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: helperServices.url + 'administrator/createuser/' + param.roles,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: helperServices.url + 'administrator/updateuser/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.firstName = param.firstName;
                    data.lastName = param.lastName;
                    data.userName = param.userName;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}

function pegawaiServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'manajer/pegawai';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read/",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + "/post",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.nama = param.nama;
                    data.alamat = param.alamat;
                    data.tgl_lahir = param.tgl_lahir;
                    data.tempat_lahir = param.tempat_lahir;
                    data.email = param.email;
                    data.no_telp = param.no_telp;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + "/deleted/" + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param);
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

}

function proyekServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'admin/proyek';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read/",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + "/post",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.proyek.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.nama = param.nama;
                    data.alamat = param.alamat;
                    data.tgl_lahir = param.tgl_lahir;
                    data.tempat_lahir = param.tempat_lahir;
                    data.email = param.email;
                    data.no_telp = param.no_telp;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + "/deleted/" + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param);
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
}

function pekerjaanServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'admin/pekerjaan';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };

    function get(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read?id="+id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + "/post",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.pekerjaan.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.pekerjaan.find(x => x.id == param.id);
                if (data) {
                    data.pekerjaan = param.pekerjaan;
                    data.bobot = param.bobot;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + "/deleted/" + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.pekerjaan.indexOf(param);
                service.data.pekerjaan.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

}

function detailServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'admin/detail';
    var service = {};
    service.data = [];
    return {
        get: get, post: post, put: put, deleted: deleted
    };

    function get(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read?id="+id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + "/post",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.detail.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.detail.find(x => x.id == param.id);
                if (data) {
                    data.detail = param.detail;
                    data.bobot = param.bobot;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + "/deleted/" + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.detail.indexOf(param);
                service.data.detail.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

}

function penggunaServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'manajer/pengguna';
    var service = {};
    service.data = [];
    return {
        get: get, put: put, deleted: deleted
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read/",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data)
            }
        );
        return def.promise;
    }
    function deleted(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: controller + "/deleted/" + param.id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param);
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

}

function laporanServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'admin/laporan';
    var service = {};
    service.data = [];
    return {
        get: get, download: download
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read/",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

    function download(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/download/"+id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message);
            }
        );
        return def.promise;
    }
}

// pengawas

function proyekPengawasServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'pengawas/proyek';
    var service = {};
    service.data = [];
    return {
        get: get
    };

    function get() {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read/",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }

}

function monitoringServices($http, $q, helperServices, AuthService, message) {
    var controller = helperServices.url + 'pengawas/monitoring';
    var service = {};
    service.data = [];
    return {
        get: get, put: put
    };

    function get(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + "/read",
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
  
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + "/put",
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err.data.message)
            }
        );
        return def.promise;
    }
}