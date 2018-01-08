// public/scripts/authController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('AuthController', AuthController);

    function AuthController($auth, $state) {

        var vm = this;

        vm.openHome = function()
        {
            $state.go('home', {});
        }

        vm.openSignup = function()
        {
            $('#signUp').modal("hide");
            $('#createAccount1').modal("show");
        }

        vm.openLogin = function(id)
        {
            $('#'+id).modal("hide");
            $('#signUp').modal("show");
        }

        vm.continueSignup = function()
        {
            $('#createAccount1').modal("hide");
            $('#createAccount2').modal("show");
        }

        vm.login = function() {

            var credentials = {
                email: vm.email,
                password: vm.password
            }

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {

                // If login is successful, redirect to the users state
                $state.go('users', {});
            });
        }

        vm.signup = function()
        {
            var credentials = {
                email: vm.signupEmail,
                password: vm.signupPassword,
                fullname: vm.signupFullName,
                age: vm.signupAge,
                gender: vm.signupPassword
            }

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {

                // If login is successful, redirect to the users state
                $state.go('users', {});
            });
        }
    }

})();