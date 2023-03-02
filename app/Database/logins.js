angular.module('logins', ['auth.service', 'helper.service','message.service', 'swangular'])
    .controller('loginController', loginController);

function loginController($scope, AuthService, helperServices) {
    $scope.role = [];
    $scope.model = {};
    $scope.model.username = "Administrator";
    $scope.model.password = "Administrator#1";
    
    $scope.login = ()=>{
        AuthService.login($scope.model).then((res)=>{
            if(res.length==1){
                document.location.href= helperServices.url;
            }else{
                $scope.role = res;
                $(".modal").modal('show');
            }
        })
    }
    $scope.setRole = (item)=>{
        AuthService.setRole(item).then((res)=>{
            document.location.href= helperServices.url;
        })
    }
}
