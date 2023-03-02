angular.module('helper.service', []).factory('helperServices', helperServices);

function helperServices($location) {
    var service = { IsBusy: false, absUrl: $location.$$absUrl };
    service.url = $location.$$protocol + '://' + $location.$$host;
    if ($location.$$port) {
        // service.url = service.url + ':' + $location.$$port + '/wisatasorong/';
        service.url = service.url + ':' + $location.$$port + '/';
    }

    // '    http://localhost:5000';

    service.groupBy = (list, keyGetter) => {
        const map = new Map();
        list.forEach((item) => {
            const key = keyGetter(item);
            const collection = map.get(key);
            if (!collection) {
                map.set(key, [item]);
            } else {
                collection.push(item);
            }
        });
        return map;
    };
    service.romanize = (num) => {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
                "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
                "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }
    service.encript = (item)=>{
        return btoa(item+'-buntusia');
    }
    service.decript = (item)=>{
        var string = atob(item);
        var pecah = string.split('-');
        return pecah[0];
    }
    service.urlParams = (item)=>{
        var url = new URLSearchParams(window.location.search);
        return url.get(item);
    }
    service.lastPath = document.location.href.substring(document.location.href.lastIndexOf('/') + 1);
    return service;
}