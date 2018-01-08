// public/scripts/homeController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);

    function HomeController($auth, $state) {

        var vm = this;

        vm.openSignup = function()
        {
            $('#signUp').modal("hide");
            $('#createAccount1').modal("show");
        }

    }

})();