// public/scripts/authController.js

(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('AuthController', AuthController);

    function AuthController($auth, $state) {

        var vm = this;
        var signupErrors = [];
        var loading = false;
        var errors = {error: false};
        
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
            if(vm.signupUsername == undefined)
            {
                //vm.errors['signupUsername'] = "Please provide username first."
            }
            else
            {
                
            }
        }

        vm.backToSignup = function()
        {
            $('#createAccount2').modal("hide");
            $('#createAccount1').modal("show");
        }

        vm.login = function() {

            var credentials = {
                email: vm.email,
                password: vm.password
            }

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function(data) {

                // close login modal and open homepage
                $('#signUp').modal("hide");
                $.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });

                // If login is successful, redirect to the home state
                setTimeout(function() {
                    $.unblockUI();
                    $state.go('home', {});
                }, 1000);
            });
        }

        vm.signup = function()
        {
            vm.loading = true;
            vm.signupErrors = [];

            var credentials = {
                username: vm.signupUsername,
                email: vm.signupEmail,
                password: vm.signupPassword,
                password_confirmation: vm.signupCPassword,
                name: vm.signupFullName,
                age: vm.signupAge,
                gender: vm.signupGender
            }

            // Use Satellizer's $auth service to signup
            $auth.signup(credentials).then(function(data) {
                var response = data.data.data;
                if(response.status)
                {
                    $('#createAccount1').modal("hide");
                    $('#createAccount2').modal("hide");
                    // If signup is successful, then open login
                    $('#signUp').modal("show");
                }
                else
                {
                    vm.signupErrors = response.message;
                }
                vm.loading = false;
            });
        }
    }

})();