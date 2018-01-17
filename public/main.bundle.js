webpackJsonp(["main"],{

/***/ "../../../../../src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "../../../../../src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "../../../../../src/_directives/alert.component.html":
/***/ (function(module, exports) {

module.exports = "<div *ngIf=\"message\" [ngClass]=\"{ 'alert': message, 'alert-success': message.type === 'success', 'alert-danger': message.type === 'error' }\">{{message.text}}</div>"

/***/ }),

/***/ "../../../../../src/_directives/alert.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AlertComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var AlertComponent = (function () {
    function AlertComponent(alertService) {
        var _this = this;
        this.alertService = alertService;
        // subscribe to alert messages
        this.subscription = alertService.getMessage().subscribe(function (message) { _this.message = message; });
    }
    AlertComponent.prototype.ngOnDestroy = function () {
        // unsubscribe on destroy to prevent memory leaks
        this.subscription.unsubscribe();
    };
    AlertComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            moduleId: module.i,
            selector: 'alert',
            template: __webpack_require__("../../../../../src/_directives/alert.component.html")
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["a" /* AlertService */]])
    ], AlertComponent);
    return AlertComponent;
}());



/***/ }),

/***/ "../../../../../src/_directives/index.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__alert_component__ = __webpack_require__("../../../../../src/_directives/alert.component.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__alert_component__["a"]; });



/***/ }),

/***/ "../../../../../src/_guards/auth.guard.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthGuard; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var AuthGuard = (function () {
    function AuthGuard(router) {
        this.router = router;
    }
    AuthGuard.prototype.canActivate = function (route, state) {
        if (localStorage.getItem('currentUser')) {
            // logged in so return true
            return true;
        }
        // not logged in so redirect to login page with the return url
        this.router.navigate(['/'], { queryParams: { returnUrl: state.url } });
        return false;
    };
    AuthGuard = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */]])
    ], AuthGuard);
    return AuthGuard;
}());



/***/ }),

/***/ "../../../../../src/_guards/index.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__auth_guard__ = __webpack_require__("../../../../../src/_guards/auth.guard.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__auth_guard__["a"]; });



/***/ }),

/***/ "../../../../../src/_helpers/custom-validators.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["a"] = ConfirmPasswordValidator;
function ConfirmPasswordValidator(pass) {
    return function (control) {
        var confirmation = control.value != pass.value;
        return confirmation ? { 'ConfirmPassword': { value: control.value } } : null;
    };
}


/***/ }),

/***/ "../../../../../src/_helpers/fake-backend.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export FakeBackendInterceptor */
/* unused harmony export fakeBackendProvider */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__ = __webpack_require__("../../../../rxjs/_esm5/Observable.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_observable_of__ = __webpack_require__("../../../../rxjs/_esm5/add/observable/of.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_add_observable_throw__ = __webpack_require__("../../../../rxjs/_esm5/add/observable/throw.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_rxjs_add_operator_delay__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/delay.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_mergeMap__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/mergeMap.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_operator_materialize__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/materialize.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_operator_dematerialize__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/dematerialize.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};









var FakeBackendInterceptor = (function () {
    function FakeBackendInterceptor() {
    }
    FakeBackendInterceptor.prototype.intercept = function (request, next) {
        // array in local storage for registered users
        var users = JSON.parse(localStorage.getItem('users')) || [];
        // wrap in delayed observable to simulate server api call
        return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(null).mergeMap(function () {
            // authenticate
            if (request.url.endsWith('/api/authenticate') && request.method === 'POST') {
                // find if any user matches login credentials
                var filteredUsers = users.filter(function (user) {
                    return user.username === request.body.username && user.password === request.body.password;
                });
                if (filteredUsers.length) {
                    // if login details are valid return 200 OK with user details and fake jwt token
                    var user = filteredUsers[0];
                    var body = {
                        id: user.id,
                        username: user.username,
                        firstName: user.firstName,
                        lastName: user.lastName,
                        token: 'fake-jwt-token'
                    };
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpResponse */]({ status: 200, body: body }));
                }
                else {
                    // else return 400 bad request
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].throw('Username or password is incorrect');
                }
            }
            // get users
            if (request.url.endsWith('/api/users') && request.method === 'GET') {
                // check for fake auth token in header and return users if valid, this security is implemented server side in a real application
                if (request.headers.get('Authorization') === 'Bearer fake-jwt-token') {
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpResponse */]({ status: 200, body: users }));
                }
                else {
                    // return 401 not authorised if token is null or invalid
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].throw('Unauthorised');
                }
            }
            // get user by id
            if (request.url.match(/\/api\/users\/\d+$/) && request.method === 'GET') {
                // check for fake auth token in header and return user if valid, this security is implemented server side in a real application
                if (request.headers.get('Authorization') === 'Bearer fake-jwt-token') {
                    // find user by id in users array
                    var urlParts = request.url.split('/');
                    var id_1 = parseInt(urlParts[urlParts.length - 1]);
                    var matchedUsers = users.filter(function (user) { return user.id === id_1; });
                    var user = matchedUsers.length ? matchedUsers[0] : null;
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpResponse */]({ status: 200, body: user }));
                }
                else {
                    // return 401 not authorised if token is null or invalid
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].throw('Unauthorised');
                }
            }
            // create user
            if (request.url.endsWith('/api/users') && request.method === 'POST') {
                // get new user object from post body
                var newUser_1 = request.body;
                // validation
                var duplicateUser = users.filter(function (user) { return user.username === newUser_1.username; }).length;
                if (duplicateUser) {
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].throw('Username "' + newUser_1.username + '" is already taken');
                }
                // save new user
                newUser_1.id = users.length + 1;
                users.push(newUser_1);
                localStorage.setItem('users', JSON.stringify(users));
                // respond 200 OK
                return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpResponse */]({ status: 200 }));
            }
            // delete user
            if (request.url.match(/\/api\/users\/\d+$/) && request.method === 'DELETE') {
                // check for fake auth token in header and return user if valid, this security is implemented server side in a real application
                if (request.headers.get('Authorization') === 'Bearer fake-jwt-token') {
                    // find user by id in users array
                    var urlParts = request.url.split('/');
                    var id = parseInt(urlParts[urlParts.length - 1]);
                    for (var i = 0; i < users.length; i++) {
                        var user = users[i];
                        if (user.id === id) {
                            // delete user
                            users.splice(i, 1);
                            localStorage.setItem('users', JSON.stringify(users));
                            break;
                        }
                    }
                    // respond 200 OK
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpResponse */]({ status: 200 }));
                }
                else {
                    // return 401 not authorised if token is null or invalid
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].throw('Unauthorised');
                }
            }
            // pass through any requests not handled above
            return next.handle(request);
        })
            .materialize()
            .delay(500)
            .dematerialize();
    };
    FakeBackendInterceptor = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [])
    ], FakeBackendInterceptor);
    return FakeBackendInterceptor;
}());

var fakeBackendProvider = {
    // use fake backend in place of Http service for backend-less development
    provide: __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["a" /* HTTP_INTERCEPTORS */],
    useClass: FakeBackendInterceptor,
    multi: true
};


/***/ }),

/***/ "../../../../../src/_helpers/index.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__jwt_interceptor__ = __webpack_require__("../../../../../src/_helpers/jwt.interceptor.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__jwt_interceptor__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__fake_backend__ = __webpack_require__("../../../../../src/_helpers/fake-backend.ts");
/* unused harmony namespace reexport */




/***/ }),

/***/ "../../../../../src/_helpers/jwt.interceptor.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JwtInterceptor; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var JwtInterceptor = (function () {
    function JwtInterceptor() {
    }
    JwtInterceptor.prototype.intercept = function (request, next) {
        // add authorization header with jwt token if available
        var currentUser = JSON.parse(localStorage.getItem('currentUser'));
        if (currentUser && currentUser.token) {
            request = request.clone({
                setHeaders: {
                    Authorization: "Bearer " + currentUser.token
                }
            });
        }
        return next.handle(request);
    };
    JwtInterceptor = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])()
    ], JwtInterceptor);
    return JwtInterceptor;
}());



/***/ }),

/***/ "../../../../../src/_services/alert.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AlertService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_Subject__ = __webpack_require__("../../../../rxjs/_esm5/Subject.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var AlertService = (function () {
    function AlertService(router) {
        var _this = this;
        this.router = router;
        this.subject = new __WEBPACK_IMPORTED_MODULE_2_rxjs_Subject__["a" /* Subject */]();
        this.keepAfterNavigationChange = false;
        // clear alert message on route change
        router.events.subscribe(function (event) {
            if (event instanceof __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* NavigationStart */]) {
                if (_this.keepAfterNavigationChange) {
                    // only keep for a single location change
                    _this.keepAfterNavigationChange = false;
                }
                else {
                    // clear alert
                    _this.subject.next();
                }
            }
        });
    }
    AlertService.prototype.success = function (message, keepAfterNavigationChange) {
        if (keepAfterNavigationChange === void 0) { keepAfterNavigationChange = false; }
        this.keepAfterNavigationChange = keepAfterNavigationChange;
        this.subject.next({ type: 'success', text: message });
    };
    AlertService.prototype.error = function (message, keepAfterNavigationChange) {
        if (keepAfterNavigationChange === void 0) { keepAfterNavigationChange = false; }
        this.keepAfterNavigationChange = keepAfterNavigationChange;
        this.subject.next({ type: 'error', text: message });
    };
    AlertService.prototype.getMessage = function () {
        return this.subject.asObservable();
    };
    AlertService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */]])
    ], AlertService);
    return AlertService;
}());



/***/ }),

/***/ "../../../../../src/_services/authentication.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthenticationService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__manager_service__ = __webpack_require__("../../../../../src/_services/manager.service.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var AuthenticationService = (function (_super) {
    __extends(AuthenticationService, _super);
    function AuthenticationService(http) {
        var _this = _super.call(this) || this;
        _this.http = http;
        // set token if saved in local storage
        var currentUser = JSON.parse(localStorage.getItem('currentUser'));
        _this.token = currentUser && currentUser.token;
        return _this;
    }
    AuthenticationService.prototype.login = function (username, password) {
        var _this = this;
        return this.http.post(this.apiPrefix + '/users/login', { email: username, password: password })
            .map(function (response) {
            if (response.ok) {
                var result = response.json();
                //console.log(result);
                // api response is found
                var apidata = result.data;
                //console.log(apidata);
                if (result.success) {
                    // api result success is true
                    var user = apidata.user;
                    // login successful if there's a jwt token in the response
                    var token = apidata.token;
                    //console.log(token);
                    if (token) {
                        // set token property
                        _this.token = token;
                        // store username and jwt token in local storage to keep user logged in between page refreshes
                        localStorage.setItem('currentUser', JSON.stringify({ user: user, token: token }));
                        // return true to indicate successful login
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    // api result success is false // return api result message
                    return apidata.message;
                }
            }
            else {
                // api response not found
                return false;
            }
        });
    };
    AuthenticationService.prototype.logout = function () {
        // clear token remove user from local storage to log user out
        this.token = null;
        localStorage.removeItem('currentUser');
    };
    AuthenticationService.prototype.isLoggedIn = function () {
        if (localStorage.getItem('currentUser')) {
            // logged in so return true
            return true;
        }
        return false;
    };
    AuthenticationService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */]])
    ], AuthenticationService);
    return AuthenticationService;
}(__WEBPACK_IMPORTED_MODULE_3__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/_services/countries.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CountriesService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__manager_service__ = __webpack_require__("../../../../../src/_services/manager.service.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var CountriesService = (function (_super) {
    __extends(CountriesService, _super);
    function CountriesService(http, authenticationService) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.authenticationService = authenticationService;
        return _this;
    }
    CountriesService.prototype.loadMore = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/countries/search', data)
            .map(function (response) { return response.json(); });
    };
    CountriesService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */],
            __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__["a" /* AuthenticationService */]])
    ], CountriesService);
    return CountriesService;
}(__WEBPACK_IMPORTED_MODULE_4__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/_services/index.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__alert_service__ = __webpack_require__("../../../../../src/_services/alert.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__alert_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__authentication_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_service__ = __webpack_require__("../../../../../src/_services/user.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "f", function() { return __WEBPACK_IMPORTED_MODULE_2__user_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__countries_service__ = __webpack_require__("../../../../../src/_services/countries.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_3__countries_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__places_service__ = __webpack_require__("../../../../../src/_services/places.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "d", function() { return __WEBPACK_IMPORTED_MODULE_4__places_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__travel_styles_service__ = __webpack_require__("../../../../../src/_services/travel-styles.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "e", function() { return __WEBPACK_IMPORTED_MODULE_5__travel_styles_service__["a"]; });








/***/ }),

/***/ "../../../../../src/_services/manager.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ManagerService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ManagerService = (function () {
    function ManagerService() {
        this.apiPrefix = "/travo/public/api";
    }
    ManagerService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [])
    ], ManagerService);
    return ManagerService;
}());



/***/ }),

/***/ "../../../../../src/_services/places.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PlacesService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__manager_service__ = __webpack_require__("../../../../../src/_services/manager.service.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var PlacesService = (function (_super) {
    __extends(PlacesService, _super);
    function PlacesService(http, authenticationService) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.authenticationService = authenticationService;
        return _this;
    }
    PlacesService.prototype.loadMore = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/places/search', data)
            .map(function (response) { return response.json(); });
    };
    PlacesService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */],
            __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__["a" /* AuthenticationService */]])
    ], PlacesService);
    return PlacesService;
}(__WEBPACK_IMPORTED_MODULE_4__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/_services/travel-styles.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TravelStylesService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__manager_service__ = __webpack_require__("../../../../../src/_services/manager.service.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var TravelStylesService = (function (_super) {
    __extends(TravelStylesService, _super);
    function TravelStylesService(http, authenticationService) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.authenticationService = authenticationService;
        return _this;
    }
    TravelStylesService.prototype.loadMore = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/travelstyles/search', data)
            .map(function (response) { return response.json(); });
    };
    TravelStylesService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */],
            __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__["a" /* AuthenticationService */]])
    ], TravelStylesService);
    return TravelStylesService;
}(__WEBPACK_IMPORTED_MODULE_4__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/_services/user.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__manager_service__ = __webpack_require__("../../../../../src/_services/manager.service.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var UserService = (function (_super) {
    __extends(UserService, _super);
    function UserService(http, authenticationService) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.authenticationService = authenticationService;
        return _this;
    }
    // signup
    UserService.prototype.signupStep1 = function (user) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: user, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/users/create', user)
            .map(function (response) { return response.json(); });
    };
    // save user profile info
    UserService.prototype.signupStep2 = function (user) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: user, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/users/create/step2', user)
            .map(function (response) { return response.json(); });
    };
    // save user selected countries
    UserService.prototype.signupStep3 = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/users/set/fav_countries', data)
            .map(function (response) { return response.json(); });
    };
    // save user selected places
    UserService.prototype.signupStep4 = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/users/set/fav_places', data)
            .map(function (response) { return response.json(); });
    };
    // save user selected styles
    UserService.prototype.signupStep5 = function (data) {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "as" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ body: data, headers: headers });
        // get users from api
        return this.http.post(this.apiPrefix + '/users/set/travel_styles', data)
            .map(function (response) { return response.json(); });
    };
    UserService.prototype.getUsers = function () {
        // add authorization header with jwt token
        var headers = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["a" /* Headers */]({ 'Authorization': 'Bearer ' + "" });
        var options = new __WEBPACK_IMPORTED_MODULE_1__angular_http__["d" /* RequestOptions */]({ headers: headers });
        // get users from api
        return this.http.get('/api/users', options)
            .map(function (response) { return response.json(); });
    };
    UserService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_http__["b" /* Http */],
            __WEBPACK_IMPORTED_MODULE_3__services_authentication_service__["a" /* AuthenticationService */]])
    ], UserService);
    return UserService;
}(__WEBPACK_IMPORTED_MODULE_4__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/app/app-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__guards_index__ = __webpack_require__("../../../../../src/_guards/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__main_main_component__ = __webpack_require__("../../../../../src/app/main/main.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var routes = [
    {
        path: '',
        component: __WEBPACK_IMPORTED_MODULE_4__main_main_component__["a" /* MainComponent */]
    },
    {
        path: 'home',
        component: __WEBPACK_IMPORTED_MODULE_3__home_home_component__["a" /* HomeComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_2__guards_index__["a" /* AuthGuard */]]
    },
    // otherwise redirect to home
    { path: '**', redirectTo: '' }
];
var AppRoutingModule = (function () {
    function AppRoutingModule() {
    }
    AppRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* RouterModule */].forRoot(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* RouterModule */]]
        })
    ], AppRoutingModule);
    return AppRoutingModule;
}());



/***/ }),

/***/ "../../../../../src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<!--The content below is only a placeholder and can be replaced.-->\n<!-- <div style=\"text-align:center\">\n  <h1>\n    Welcome to {{ title }}!\n  </h1>\n  <img width=\"300\" alt=\"Angular Logo\" src=\"data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNTAgMjUwIj4KICAgIDxwYXRoIGZpbGw9IiNERDAwMzEiIGQ9Ik0xMjUgMzBMMzEuOSA2My4ybDE0LjIgMTIzLjFMMTI1IDIzMGw3OC45LTQzLjcgMTQuMi0xMjMuMXoiIC8+CiAgICA8cGF0aCBmaWxsPSIjQzMwMDJGIiBkPSJNMTI1IDMwdjIyLjItLjFWMjMwbDc4LjktNDMuNyAxNC4yLTEyMy4xTDEyNSAzMHoiIC8+CiAgICA8cGF0aCAgZmlsbD0iI0ZGRkZGRiIgZD0iTTEyNSA1Mi4xTDY2LjggMTgyLjZoMjEuN2wxMS43LTI5LjJoNDkuNGwxMS43IDI5LjJIMTgzTDEyNSA1Mi4xem0xNyA4My4zaC0zNGwxNy00MC45IDE3IDQwLjl6IiAvPgogIDwvc3ZnPg==\">\n</div>\n<h2>Here are some links to help you start: </h2>\n<ul>\n  <li>\n    <h2><a target=\"_blank\" rel=\"noopener\" href=\"https://angular.io/tutorial\">Tour of Heroes</a></h2>\n  </li>\n  <li>\n    <h2><a target=\"_blank\" rel=\"noopener\" href=\"https://github.com/angular/angular-cli/wiki\">CLI Documentation</a></h2>\n  </li>\n  <li>\n    <h2><a target=\"_blank\" rel=\"noopener\" href=\"https://blog.angular.io/\">Angular blog</a></h2>\n  </li>\n</ul> -->\n\n<router-outlet></router-outlet>\n"

/***/ }),

/***/ "../../../../../src/app/app.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var AppComponent = (function () {
    function AppComponent() {
        this.title = 'app';
    }
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("../../../../../src/app/app.component.html"),
            styles: [__webpack_require__("../../../../../src/app/app.component.scss")]
        })
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "../../../../../src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_http__ = __webpack_require__("../../../http/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_ngx_infinite_scroll__ = __webpack_require__("../../../../ngx-infinite-scroll/modules/ngx-infinite-scroll.es5.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__app_routing_module__ = __webpack_require__("../../../../../src/app/app-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__directives_index__ = __webpack_require__("../../../../../src/_directives/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__guards_index__ = __webpack_require__("../../../../../src/_guards/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__helpers_index__ = __webpack_require__("../../../../../src/_helpers/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__app_component__ = __webpack_require__("../../../../../src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__login_login_component__ = __webpack_require__("../../../../../src/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__main_main_component__ = __webpack_require__("../../../../../src/app/main/main.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__signup_signup_component__ = __webpack_require__("../../../../../src/app/signup/signup.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__header_header_component__ = __webpack_require__("../../../../../src/app/header/header.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__left_side_bar_left_side_bar_component__ = __webpack_require__("../../../../../src/app/left-side-bar/left-side-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__side_footer_side_footer_component__ = __webpack_require__("../../../../../src/app/side-footer/side-footer.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__right_side_bar_right_side_bar_component__ = __webpack_require__("../../../../../src/app/right-side-bar/right-side-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_20__posts_posts_component__ = __webpack_require__("../../../../../src/app/posts/posts.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_21__create_post_create_post_component__ = __webpack_require__("../../../../../src/app/create-post/create-post.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_22__signup_step1_step1_component__ = __webpack_require__("../../../../../src/app/signup/step1/step1.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_23__signup_step2_step2_component__ = __webpack_require__("../../../../../src/app/signup/step2/step2.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_24__signup_step3_step3_component__ = __webpack_require__("../../../../../src/app/signup/step3/step3.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_25__signup_step4_step4_component__ = __webpack_require__("../../../../../src/app/signup/step4/step4.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_26__signup_step5_step5_component__ = __webpack_require__("../../../../../src/app/signup/step5/step5.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};







// used to create fake backend
//import { fakeBackendProvider } from '../_helpers/index';




















var AppModule = (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_6__app_routing_module__["a" /* AppRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["c" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_4__angular_http__["c" /* HttpModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["d" /* ReactiveFormsModule */],
                __WEBPACK_IMPORTED_MODULE_5_ngx_infinite_scroll__["a" /* InfiniteScrollModule */]
            ],
            declarations: [
                __WEBPACK_IMPORTED_MODULE_11__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_12__login_login_component__["a" /* LoginComponent */],
                __WEBPACK_IMPORTED_MODULE_13__main_main_component__["a" /* MainComponent */],
                __WEBPACK_IMPORTED_MODULE_14__signup_signup_component__["a" /* SignupComponent */],
                __WEBPACK_IMPORTED_MODULE_7__directives_index__["a" /* AlertComponent */],
                __WEBPACK_IMPORTED_MODULE_15__home_home_component__["a" /* HomeComponent */],
                __WEBPACK_IMPORTED_MODULE_16__header_header_component__["a" /* HeaderComponent */],
                __WEBPACK_IMPORTED_MODULE_17__left_side_bar_left_side_bar_component__["a" /* LeftSideBarComponent */],
                __WEBPACK_IMPORTED_MODULE_18__side_footer_side_footer_component__["a" /* SideFooterComponent */],
                __WEBPACK_IMPORTED_MODULE_19__right_side_bar_right_side_bar_component__["a" /* RightSideBarComponent */],
                __WEBPACK_IMPORTED_MODULE_20__posts_posts_component__["a" /* PostsComponent */],
                __WEBPACK_IMPORTED_MODULE_21__create_post_create_post_component__["a" /* CreatePostComponent */],
                __WEBPACK_IMPORTED_MODULE_22__signup_step1_step1_component__["a" /* Step1Component */],
                __WEBPACK_IMPORTED_MODULE_23__signup_step2_step2_component__["a" /* Step2Component */],
                __WEBPACK_IMPORTED_MODULE_24__signup_step3_step3_component__["a" /* Step3Component */],
                __WEBPACK_IMPORTED_MODULE_25__signup_step4_step4_component__["a" /* Step4Component */],
                __WEBPACK_IMPORTED_MODULE_26__signup_step5_step5_component__["a" /* Step5Component */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_8__guards_index__["a" /* AuthGuard */],
                __WEBPACK_IMPORTED_MODULE_10__services_index__["a" /* AlertService */],
                __WEBPACK_IMPORTED_MODULE_10__services_index__["b" /* AuthenticationService */],
                __WEBPACK_IMPORTED_MODULE_10__services_index__["f" /* UserService */],
                {
                    provide: __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["a" /* HTTP_INTERCEPTORS */],
                    useClass: __WEBPACK_IMPORTED_MODULE_9__helpers_index__["a" /* JwtInterceptor */],
                    multi: true
                },
                __WEBPACK_IMPORTED_MODULE_10__services_index__["c" /* CountriesService */],
                __WEBPACK_IMPORTED_MODULE_10__services_index__["d" /* PlacesService */],
                __WEBPACK_IMPORTED_MODULE_10__services_index__["e" /* TravelStylesService */]
                // provider used to create fake backend
                //fakeBackendProvider
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_11__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "../../../../../src/app/create-post/create-post.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"post-block post-create-block\">\n\t<div class=\"post-create-input\">\n\t\t<input type=\"text\" id=\"createPostTxt\" placeholder=\"Write something...\">\n\t</div>\n\t<div class=\"post-create-controls\">\n\t\t<ul class=\"create-link-list\">\n\t\t\t<li>\n\t\t\t\t<i class=\"trav-camera\"></i>\n\t\t\t</li>\n\t\t\t<li>\n\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t</li>\n\t\t</ul>\n\t\t<button class=\"btn btn-light-primary btn-disabled\">Post</button>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/create-post/create-post.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/create-post/create-post.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CreatePostComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var CreatePostComponent = (function () {
    function CreatePostComponent() {
    }
    CreatePostComponent.prototype.ngOnInit = function () {
    };
    CreatePostComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-create-post',
            template: __webpack_require__("../../../../../src/app/create-post/create-post.component.html"),
            styles: [__webpack_require__("../../../../../src/app/create-post/create-post.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], CreatePostComponent);
    return CreatePostComponent;
}());



/***/ }),

/***/ "../../../../../src/app/header/header.component.html":
/***/ (function(module, exports) {

module.exports = "<header class=\"main-header\">\n\t<div class=\"container-fluid\">\n\t\t<nav class=\"navbar navbar-toggleable-md navbar-light bg-faded\">\n\t\t\t<button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\"\n\t\t\t aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n\t\t\t\t<i class=\"trav-bars\"></i>\n\t\t\t</button>\n\t\t\t<a class=\"navbar-brand\" href=\"#\">\n\t\t\t\t<img src=\"./assets/image/main-circle-logo.png\" alt=\"\">\n\t\t\t</a>\n\n\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">\n\t\t\t\t<div class=\"header-search-block\">\n\t\t\t\t\t<a class=\"search-btn\" href=\"#\">\n\t\t\t\t\t\t<i class=\"trav-search-icon\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t\t<input type=\"text\" class=\"\" placeholder=\"Search...\">\n\t\t\t\t</div>\n\t\t\t\t<ul class=\"navbar-nav\">\n\t\t\t\t\t<li class=\"nav-item active\">\n\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Messages</a>\n\t\t\t\t\t</li>\n\t\t\t\t\t<li class=\"nav-item\">\n\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Help</a>\n\t\t\t\t\t</li>\n\t\t\t\t\t<li class=\"nav-item\">\n\t\t\t\t\t\t<a class=\"nav-link btn btn-light-primary\" href=\"#\">Plan trip</a>\n\t\t\t\t\t</li>\n\t\t\t\t\t<li class=\"nav-item\">\n\t\t\t\t\t\t<a class=\"profile-link\" href=\"#\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/36x36\" alt=\"\">\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t</nav>\n\t</div>\n</header>"

/***/ }),

/***/ "../../../../../src/app/header/header.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/header/header.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HeaderComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var HeaderComponent = (function () {
    function HeaderComponent() {
    }
    HeaderComponent.prototype.ngOnInit = function () {
    };
    HeaderComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-header',
            template: __webpack_require__("../../../../../src/app/header/header.component.html"),
            styles: [__webpack_require__("../../../../../src/app/header/header.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], HeaderComponent);
    return HeaderComponent;
}());



/***/ }),

/***/ "../../../../../src/app/home/home.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/home/home.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"main-wrapper\">\n\n\t<app-header></app-header>\n\n\t<div class=\"content-wrap\">\n\t\t<!-- left outside menu -->\n\n\t\t<button class=\"btn btn-mobile-side sidebar-toggler\" id=\"sidebarToggler\">\n\t\t\t<i class=\"trav-cog\"></i>\n\t\t</button>\n\t\t<button class=\"btn btn-mobile-side left-outside-btn\" id=\"filterToggler\">\n\t\t\t<i class=\"trav-filter\"></i>\n\t\t</button>\n\n\t\t<div class=\"container-fluid\">\n\n\t\t\t<!-- LEFT SIDEBAR -->\n\t\t\t<app-left-side-bar></app-left-side-bar>\n\n\t\t\t<div class=\"custom-row\">\n\n\t\t\t\t<!-- MAIN-CONTENT -->\n\t\t\t\t<div class=\"main-content-layer\">\n\n\t\t\t\t\t<!-- CREATE NEW POST -->\n\t\t\t\t\t<app-create-post></app-create-post>\n\n\t\t\t\t\t<!-- POSTS TIMELINE -->\n\t\t\t\t\t<app-posts></app-posts>\n\t\t\t\t</div>\n\n\t\t\t\t<!-- RIGHT SIDEBAR -->\n\t\t\t\t<div class=\"sidebar-layer\" id=\"sidebarLayer\">\n\t\t\t\t\t<app-right-side-bar></app-right-side-bar>\n\t\t\t\t</div>\n\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/home/home.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var HomeComponent = (function () {
    function HomeComponent(authenticationService, router, titleService) {
        this.authenticationService = authenticationService;
        this.router = router;
        this.titleService = titleService;
    }
    HomeComponent.prototype.ngOnInit = function () {
        this.titleService.setTitle("Travoo - Home");
        $.getScript('assets/js/script.js');
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-home',
            template: __webpack_require__("../../../../../src/app/home/home.component.html"),
            styles: [__webpack_require__("../../../../../src/app/home/home.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["b" /* AuthenticationService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["c" /* Router */],
            __WEBPACK_IMPORTED_MODULE_3__angular_platform_browser__["b" /* Title */]])
    ], HomeComponent);
    return HomeComponent;
}());



/***/ }),

/***/ "../../../../../src/app/left-side-bar/left-side-bar.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"left-outside-menu-wrap\" id=\"leftOutsideMenu\">\n\t<ul class=\"left-outside-menu\">\n\t\t<li class=\"active\">\n\t\t\t<a href=\"#\">\n\t\t\t\t<i class=\"trav-home-icon\"></i>\n\t\t\t\t<span>Home</span>\n\t\t\t</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">\n\t\t\t\t<i class=\"trav-travel-mates-icon\"></i>\n\t\t\t\t<span>Travel Mates</span>\n\t\t\t</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">\n\t\t\t\t<i class=\"trav-trip-plans-icon\"></i>\n\t\t\t\t<span>Trip Plans</span>\n\t\t\t</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">\n\t\t\t\t<i class=\"trav-trending-icon\"></i>\n\t\t\t\t<span>Trending</span>\n\t\t\t</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">\n\t\t\t\t<i class=\"trav-map-o\"></i>\n\t\t\t\t<span>Map</span>\n\t\t\t</a>\n\t\t</li>\n\t</ul>\n</div>"

/***/ }),

/***/ "../../../../../src/app/left-side-bar/left-side-bar.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/left-side-bar/left-side-bar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LeftSideBarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var LeftSideBarComponent = (function () {
    function LeftSideBarComponent() {
    }
    LeftSideBarComponent.prototype.ngOnInit = function () {
    };
    LeftSideBarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-left-side-bar',
            template: __webpack_require__("../../../../../src/app/left-side-bar/left-side-bar.component.html"),
            styles: [__webpack_require__("../../../../../src/app/left-side-bar/left-side-bar.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], LeftSideBarComponent);
    return LeftSideBarComponent;
}());



/***/ }),

/***/ "../../../../../src/app/login/login.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- Modal -->\n\n<div class=\"modal fade\" id=\"logIn\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n  \t<div class=\"modal-dialog sign-up-style\" role=\"document\">\n    \t<div class=\"modal-content\">\n\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n\t\t\t\t<span aria-hidden=\"true\">&times;</span>\n\t\t\t</button>\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"top-layer\">\n\t\t\t\t\t<a href=\"#\" class=\"logo-wrap\">\n\t\t\t\t\t\t<img src=\"./assets/image/main-logo.png\" alt=\"\">\n\t\t\t\t\t</a>\n\t\t\t\t\t<h4 class=\"title\">Login to your account</h4>\n\t\t\t\t\t<!-- <p class=\"sub-ttl\">and write a text here</p> -->\n\t\t\t\t\t<p class=\"sub-ttl error-message\" *ngFor=\"let msg of errors\">{{ msg }}</p>\n\t\t\t\t</div>\n\n\t\t\t\t<form class=\"login-form\" name=\"loginForm\" [formGroup]=\"loginForm\" (ngSubmit)=\"login()\" novalidate>\n\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"setClassEmail()\">\n\t\t\t\t\t\t<!-- <label for=\"username\">Username</label> -->\n\t\t\t\t\t\t<input class=\"form-control\" type=\"email\" name=\"email\" formControlName=\"email\" placeholder=\"Email address\" aria-describedby=\"emailHelp\" />\n\t\t\t\t\t\t<!-- <input type=\"email\" class=\"form-control\" name=\"username\" [(ngModel)]=\"model.username\" #username=\"ngModel\" required aria-describedby=\"emailHelp\" placeholder=\"Email address\"/> -->\n\t\t\t\t\t\t<!-- <div *ngIf=\"f.submitted && !username.valid\" class=\"help-block\">Email is required</div> -->\n\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"email.errors && (email.dirty || email.touched)\">\n\t\t\t\t\t\t\t<p>{{ emailMsg }}</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"setClassPassword()\">\n\t\t\t\t\t\t<!-- <label for=\"password\">Password</label> -->\n\t\t\t\t\t\t<input class=\"form-control\" type=\"password\" name=\"password\" formControlName=\"password\" placeholder=\"Password\" aria-describedby=\"pass\" />\n\t\t\t\t\t\t<!-- <input type=\"password\" class=\"form-control\" name=\"password\" [(ngModel)]=\"model.password\" #password=\"ngModel\" required aria-describedby=\"pass\" placeholder=\"Password\"/> -->\n\t\t\t\t\t\t<!-- <div *ngIf=\"f.submitted && !password.valid\" class=\"help-block\">Password is required</div> -->\n\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"password.errors && (password.dirty || password.touched)\">\n\t\t\t\t\t\t\t<p>{{ passwordMsg }}</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<a href=\"#\" class=\"forget-password-link\">Forget your password?</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button class=\"btn btn-primary\" type=\"submit\" [disabled]=\"!loginForm.valid || loading\">{{ loginBtnText }}</button>\n\t\t\t\t\t\t<!-- <button [disabled]=\"loading\" class=\"btn btn-primary\">{{ loginBtnText }}</button> -->\n\t\t\t\t\t\t<!-- <img *ngIf=\"loading\" src=\"data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==\" /> -->\n\t\t\t\t\t\t<!-- <a [routerLink]=\"['/register']\" class=\"btn btn-link\">Register</a> -->\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<p class=\"simple-txt\">Or</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\">\n\t\t\t\t\t\t\t<i class=\"fa fa-facebook side-icon\"></i>\n\t\t\t\t\t\t\tContinue with Facebook\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-info\">\n\t\t\t\t\t\t\t<i class=\"fa fa-twitter side-icon\"></i>\n\t\t\t\t\t\t\tContinue with Twitter\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t</form>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<p class=\"foot-txt\">You are not a member yet?</p>\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" (click)=\"openSignup()\">Sign Up</button>\n\t\t\t</div>\n    \t</div>\n  \t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/login/login.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/login/login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var LoginComponent = (function () {
    function LoginComponent(route, router, authenticationService, alertService, formBuilder, titleService) {
        this.route = route;
        this.router = router;
        this.authenticationService = authenticationService;
        this.alertService = alertService;
        this.formBuilder = formBuilder;
        this.titleService = titleService;
        this.loading = false;
        this.loginBtnText = "Login";
        this.errors = [];
        this.emailMsg = "";
        this.passwordMsg = "";
        this.email = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required,
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].email
        ]);
        this.password = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required
        ]);
    }
    LoginComponent.prototype.ngOnInit = function () {
        this.titleService.setTitle("Travoo - Login");
        // reset login status
        this.authenticationService.logout();
        if (this.authenticationService.isLoggedIn()) {
            this.router.navigate(['/home']);
        }
        // get return url from route parameters or default to '/home'
        this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/home';
        this.loginForm = this.formBuilder.group({
            email: this.email,
            password: this.password
        });
    };
    LoginComponent.prototype.openSignup = function () {
        this.titleService.setTitle("Travoo - Signup");
        $('#signUp').modal("hide");
        $('#createAccount1').modal("show");
    };
    LoginComponent.prototype.setClassEmail = function () {
        if ((!this.email.pristine || this.email.touched) && !this.email.valid) {
            if (this.email.errors.required) {
                this.emailMsg = "Email is required.";
            }
            else if (this.email.errors.email) {
                this.emailMsg = "Email is not valid.";
            }
            return 'has-danger';
        }
    };
    LoginComponent.prototype.setClassPassword = function () {
        if ((!this.password.pristine || this.password.touched) && !this.password.valid) {
            if (this.password.errors.required) {
                this.passwordMsg = "Password is required.";
            }
            return 'has-danger';
        }
    };
    LoginComponent.prototype.login = function () {
        var _this = this;
        this.errors = [];
        this.toggleLogin(false);
        this.authenticationService.login(this.email.value, this.password.value)
            .subscribe(function (result) {
            if (result === true) {
                // close login modal and open homepage
                $('#signUp').modal("hide");
                $.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });
                // If login is successful, redirect to the home state
                var t = _this;
                setTimeout(function () {
                    $.unblockUI();
                    t.router.navigate([t.returnUrl]);
                }, 1000);
            }
            else {
                _this.errors.push(result);
                _this.toggleLogin(true);
            }
        });
    };
    LoginComponent.prototype.toggleLogin = function (state) {
        if (state) {
            this.loginBtnText = "Login";
            this.loading = false;
        }
        else {
            this.loginBtnText = "Checking Login ...";
            this.loading = true;
        }
    };
    LoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-login',
            template: __webpack_require__("../../../../../src/app/login/login.component.html"),
            styles: [__webpack_require__("../../../../../src/app/login/login.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["b" /* AuthenticationService */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["a" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["a" /* FormBuilder */],
            __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser__["b" /* Title */]])
    ], LoginComponent);
    return LoginComponent;
}());



/***/ }),

/***/ "../../../../../src/app/main/main.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"main-wrapper login-layer\">\n\t<header class=\"main-header step-header\">\n\t\t<!-- use class .step-header for set header above of modal-backgrop layer -->\n\t\t<div class=\"container\">\n\t\t\t<nav class=\"navbar navbar-toggleable-md navbar-light bg-faded\">\n\t\t\t\t<!-- <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#mainMenuLayer\" aria-controls=\"mainMenuLayer\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n            <span class=\"navbar-toggler-icon\"></span>\n          </button> -->\n\t\t\t\t<a class=\"navbar-brand\" href=\"#\">\n\t\t\t\t\t<img src=\"./assets/image/main-small-logo.png\" alt=\"\">\n\t\t\t\t</a>\n\n\t\t\t\t<!--<div class=\"collapse navbar-collapse\" id=\"mainMenuLayer\">\n\t\t\t\t\t<div class=\"progress-wrapper\">\n\t\t\t\t\t<div class=\"progress-point\">Start</div>\n\t\t\t\t\t<div class=\"progress\">\n\t\t\t\t\t<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"1\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div><!-- you can use aria-valuenow arrt for add step -->\n\t\t\t\t\t<!-- </div>\n\t\t\t\t\t<div class=\"progress-point\">Finish</div>\n\t\t\t\t</div>\n\t\t\t\t</div> -->\n\n\t\t\t\t<div class=\"progress-block\">\n\t\t\t\t\t<div class=\"progress-wrapper\">\n\t\t\t\t\t\t<div class=\"progress-point\">Start</div>\n\t\t\t\t\t\t<div class=\"progress\">\n\t\t\t\t\t\t\t<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"1\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>\n\t\t\t\t\t\t\t<!-- you can use aria-valuenow arrt for add step -->\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"progress-point\">Finish</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</nav>\n\n\t\t\t<!-- <div class=\"header-inner\">\n          <h1 class=\"logo-wrap\">\n            <a href=\"#\" class=\"logo\">\n              <img src=\"./assets/image/main-small-logo.png\" alt=\"\">\n            </a>\n          </h1>\n          <div class=\"col\">\n          </div>\n        </div> -->\n\t\t</div>\n\t</header>\n\n\t<!-- Button trigger modal -->\n\t<button type=\"button\" class=\"btn btn-primary\" (click)=\"openLogin()\">\n\t\tLogin\n\t</button>\n\t<button type=\"button\" class=\"btn btn-primary\" (click)=\"openSignup()\">\n\t\tRegister\n\t</button>\n</div>\n\n<app-login></app-login>\n\n<app-signup></app-signup>"

/***/ }),

/***/ "../../../../../src/app/main/main.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/main/main.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MainComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var MainComponent = (function () {
    function MainComponent(titleService) {
        this.titleService = titleService;
    }
    MainComponent.prototype.ngOnInit = function () {
        this.titleService.setTitle("Travooo");
        $.getScript('assets/js/script.js');
    };
    MainComponent.prototype.openLogin = function () {
        $('#logIn').modal('show');
    };
    MainComponent.prototype.openSignup = function () {
        $('.step-header').show();
        $('#signUpStep1').modal('show');
    };
    MainComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-main',
            template: __webpack_require__("../../../../../src/app/main/main.component.html"),
            styles: [__webpack_require__("../../../../../src/app/main/main.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser__["b" /* Title */]])
    ], MainComponent);
    return MainComponent;
}());



/***/ }),

/***/ "../../../../../src/app/posts/posts.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Burno</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tUploaded\n\t\t\t\t\t<b>2 photos</b> yesterday at 10:33pm\n\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<!-- <i class=\"trav-angle-down\"></i> -->\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/295x335\" alt=\"\">\n\t\t\t</li>\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/295x335\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">\n\t\t\t<i class=\"trav-trending-destination-icon\"></i> Trending destinations\n\t\t\t<span class=\"count\">20</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"trendingDescription\" class=\"post-slider\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Central park</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Park</span> in New York City\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Niagara falls</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Waterfalls</span> in New York\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Grand canyon national park</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Park</span> in Arizona\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Richard hylton</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tUploaded a\n\t\t\t\t\t<b>photo</b> yesterday at 10:33am\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x624\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>12</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>189 Comments</span>\n\t\t</div>\n\t</div>\n\t<div class=\"post-comment-layer\">\n\t\t<div class=\"post-comment-top-info\">\n\t\t\t<ul class=\"comment-filter\">\n\t\t\t\t<li class=\"active\">Top</li>\n\t\t\t\t<li>New</li>\n\t\t\t</ul>\n\t\t\t<div class=\"comm-count-info\">\n\t\t\t\t3 / 20\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-comment-wrapper\">\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Katherin</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@katherin</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n\t\t\t\t\t\t\tculpa qui odit delectus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Amine</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@ak0117</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-like.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>19</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Katherin</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@katherin</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n\t\t\t\t\t\t\tculpa qui odit delectus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>15</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<a href=\"#\" class=\"load-more-link\">Load more...</a>\n\t\t</div>\n\t\t<div class=\"post-add-comment-block\">\n\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-add-com-input\">\n\t\t\t\t<input type=\"text\" placeholder=\"Write a comment\">\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-round-icon-wrap\">\n\t\t\t\t<i class=\"trav-event-icon\"></i>\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Quick Chek New Jersey Festival of Ballooning</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-event-info\">\n\t\t\t\t\t<span class=\"event-tag\">Event</span>\n\t\t\t\t\tin\n\t\t\t\t\t<a class=\"event-place\" href=\"#\">New York City</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x250\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"date-block\">\n\t\t\t\t\t<span class=\"month\">jul</span>\n\t\t\t\t\t<span class=\"count-day\">15</span>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-posted\">Posted by\n\t\t\t\t\t\t<a href=\"#\">Donec Ultrices Nunc</a>\n\t\t\t\t\t</p>\n\t\t\t\t\t<p class=\"follow-description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, veritatis.</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tChecked in at\n\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t<a class=\"link-place\" href=\"#\">Central Park</a> yesterday - 10:33am\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container\">\n\t\t<div class=\"post-txt-wrap\">\n\t\t\t<p class=\"post-txt\">Sed ultricies quam id mattis venenatis\n\t\t\t\t<img src=\"./assets/image/icon-smile-heart.png\" alt=\"\"> vivamus sapien purus, tincidunt quis aliquet vitae, eleifend nec sem.</p>\n\t\t</div>\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/192x210\" alt=\"\">\n\t\t\t</li>\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/192x210\" alt=\"\">\n\t\t\t</li>\n\t\t\t<li class=\"more-photos-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/192x210\" alt=\"\">\n\t\t\t\t<a href=\"#\" class=\"more-photos-link\">\n\t\t\t\t\t<span>5 More Photos</span>\n\t\t\t\t</a>\n\t\t\t</li>\n\t\t</ul>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction p-disabled\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>React</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>1 Comment</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Places you might like\n\t\t\t<span class=\"count\">20</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap\">\n\t\t\t<ul id=\"placeYouMightLike\" class=\"post-slider post-slider-active\">\n\t\t\t\t<li>\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/222x151\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Statue of Liberty</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\tUnited States of America\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/222x151\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Reichstag</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\tGermany\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/222x151\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Kruger National Park</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\tSouth Africa\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t\t<div class=\"post-map-wrap\">\n\t\t\t<img src=\"http://placehold.it/597x400\" alt=\"map\">\n\n\t\t\t<!-- <iframe width=\"600\" height=\"400\" src=\"https://www.mapsdirections.info/en/custom-google-maps/map.php?width=600&height=400&hl=ru&q=New%20York%20City+(Your%20Business%20Name)&ie=UTF8&t=p&z=4&iwloc=B&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"><a href=\"https://www.mapsdirections.info/en/custom-google-maps/\">Embed Google Map</a> by <a href=\"https://www.mapsdirections.info/en/\">Measure area on map</a></iframe> -->\n\n\t\t\t<div class=\"post-map-info-caption map-black\">\n\t\t\t\t<div class=\"map-avatar\">\n\t\t\t\t\t<img src=\"http://placehold.it/25x25\" alt=\"ava\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"map-label-txt\">When is the best time to visit?</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Places you might like\n\t\t\t<span class=\"count\">20</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"placeYouMightLikePostCard\" class=\"post-slider\">\n\t\t\t\t<li class=\"post-card\">\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/274x234\" alt=\"\">\n\t\t\t\t\t\t<a href=\"#\" class=\"place-location\">\n\t\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t<p class=\"post-card-name\" href=\"#\">Walt Disney World</p>\n\t\t\t\t\t\t<p class=\"post-card-placement\">\n\t\t\t\t\t\t\t<b>Park</b> in Florida\n\t\t\t\t\t\t</p>\n\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t\t<span>20 Talking about this</span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-card\">\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/274x234\" alt=\"\">\n\t\t\t\t\t\t<a href=\"#\" class=\"place-location\">\n\t\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t<p class=\"post-card-name\" href=\"#\">Niagara Falls</p>\n\t\t\t\t\t\t<p class=\"post-card-placement\">\n\t\t\t\t\t\t\t<b>Waterfalls</b> in North America\n\t\t\t\t\t\t</p>\n\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t\t<span>18 Talking about this</span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-card\">\n\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/274x234\" alt=\"\">\n\t\t\t\t\t\t<a href=\"#\" class=\"place-location\">\n\t\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t<p class=\"post-card-name\" href=\"#\">Grand Canyon National Park</p>\n\t\t\t\t\t\t<p class=\"post-card-placement\">\n\t\t\t\t\t\t\t<b>Park</b> in Florida\n\t\t\t\t\t\t</p>\n\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t\t<span>20 Talking about this</span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Richard hylton</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tAdded a\n\t\t\t\t\t<b>photo</b> yesterday at 10:33am\n\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t<b>21 Km</b> from\n\t\t\t\t\t<a class=\"link-place\" href=\"#\">Arizona</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x404\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li class=\"dropdown\">\n\t\t\t\t\t<span data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</span>\n\t\t\t\t\t<div class=\"dropdown-menu dropdown-info-style post-profile-block\">\n\t\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t\t<div class=\"prof-name\">Sue Perez</div>\n\t\t\t\t\t\t\t\t<div class=\"prof-location\">United States of America</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n\t<div class=\"post-comment-layer\">\n\t\t<div class=\"post-comment-top-info\">\n\t\t\t<ul class=\"comment-filter\">\n\t\t\t\t<li class=\"active\">Top</li>\n\t\t\t\t<li>New</li>\n\t\t\t</ul>\n\t\t\t<div class=\"comm-count-info\">\n\t\t\t\t3 / 20\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-comment-wrapper\">\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Katherin</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@katherin</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n\t\t\t\t\t\t\tculpa qui odit delectus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Amine</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@ak0117</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-like.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>19</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Katherin</a>\n\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@katherin</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n\t\t\t\t\t\t\tculpa qui odit delectus.</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t<span>15</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<a href=\"#\" class=\"load-more-link\">Load more...</a>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Bugno Senevirathne</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\t15 July at 10:33am\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container\">\n\t\t<div class=\"post-txt-wrap\">\n\t\t\t<p class=\"post-txt-lg\">Duis elementum aliquet sapien hendrerit faucibus. Proin et felis quis mi scelerisque dignissim. Etiam pellentesque ut\n\t\t\t\tmassa malesuada scelerisque.</p>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/30x30\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Small</a>\n\t\t\t\t\tis now friend with\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Sue Perez</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info-date\">\n\t\t\t\t\t4 Hours ago\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-profile-wrap\">\n\t\t\t<div class=\"post-profile-block\">\n\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t<a href=\"#\" class=\"btn btn-light-primary btn-follow\">\n\t\t\t\t\t\t<i class=\"trav-user-plus-icon\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t<div class=\"prof-name\">Stephanie small</div>\n\t\t\t\t\t\t<div class=\"prof-location\">Morocco</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<ul class=\"post-person-photo-list\">\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-profile-block\">\n\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t<a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n\t\t\t\t\t\t<i class=\"trav-user-plus-icon\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t<div class=\"prof-name\">Sue Perez</div>\n\t\t\t\t\t\t<div class=\"prof-location\">United States of America</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<ul class=\"post-person-photo-list\">\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-footer-info\">\n\t\t\t<div class=\"post-reaction\">\n\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t<span>\n\t\t\t\t\t<b>3</b> Reactions</span>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<span>5 Comments</span>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tShared a\n\t\t\t\t\t<b>Trip Plan</b> yesterday at 10:33am\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x400\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-destination\">4 Days to Dallas</p>\n\t\t\t\t\t<div class=\"follow-tag-wrap\">\n\t\t\t\t\t\t<span class=\"follow-tag\">solo</span>\n\t\t\t\t\t\t<span class=\"follow-tag\">urban</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-icon-side btn-icon-right\">\n\t\t\t\t\tView plan\n\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t<i class=\"trav-view-plan-icon\"></i>\n\t\t\t\t\t</span>\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Discover new people</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"newPeopleDiscover\" class=\"post-slider\">\n\t\t\t\t<li class=\"post-follow-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/42x42\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Stephanie small</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Photographer</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">12K Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/42x42\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Beatriz kim park</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Traveler</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-primary btn-bordered\">Following</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">248 Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/42x42\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Kathleen brown</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Write</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">39 Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/42x42\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Alex ah</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Photographer</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">8K Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/42x42\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Louie olson</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Photographer</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">198K Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-round-icon-wrap\">\n\t\t\t\t<i class=\"trav-event-icon\"></i>\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Independence day</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-event-info\">\n\t\t\t\t\t<span class=\"event-tag\">National Holiday</span>\n\t\t\t\t\tin\n\t\t\t\t\t<span class=\"dropdown\">\n\t\t\t\t\t\t<a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Unites States of America</a>\n\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n\t\t\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n\t\t\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t\t\t<div class=\"flag-wrap\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"prof-name\">United States of America</div>\n\t\t\t\t\t\t\t\t\t<div class=\"prof-location\">Country in North America</div>\n\t\t\t\t\t\t\t\t\t<div class=\"prof-button-wrap\">\n\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"prof-follow-count\">28K Followers</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</span>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x250\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"date-block\">\n\t\t\t\t\t<span class=\"month blue\">jul</span>\n\t\t\t\t\t<span class=\"count-day\">15</span>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-posted\">Posted by\n\t\t\t\t\t\t<a href=\"#\">Donec Ultrices Nunc</a>\n\t\t\t\t\t</p>\n\t\t\t\t\t<p class=\"follow-description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, veritatis.</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-icon-side btn-icon-right\">\n\t\t\t\t\tFollow\n\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t<i class=\"trav-view-plan-icon\"></i>\n\t\t\t\t\t</span>\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>12</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>23 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/30x30\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Small</a>\n\t\t\t\t\tis now friend with\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Sue Perez</a>\n\t\t\t\t\tand\n\t\t\t\t\t<span class=\"dropdown\">\n\t\t\t\t\t\t<a href=\"#\" class=\"post-name-link\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">5 more people</a>\n\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-arrow dropdown-info-style dropdown-people-list\">\n\t\t\t\t\t\t\t<ul class=\"people-list\">\n\t\t\t\t\t\t\t\t<li class=\"people-row\">\n\t\t\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"people-txt\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-name\">Gerald stuber</div>\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-location\">United States</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li class=\"people-row\">\n\t\t\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"people-txt\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-name\">Timothy pellingson</div>\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-location\">Germany</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li class=\"people-row\">\n\t\t\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"people-txt\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-name\">Joseth talley</div>\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-location\">Italy</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li class=\"people-row\">\n\t\t\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"people-txt\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-name\">Sharen holt</div>\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-location\">Japan</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li class=\"people-row\">\n\t\t\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"ava\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"people-txt\">\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-name\">Robert casteel</div>\n\t\t\t\t\t\t\t\t\t\t<div class=\"people-location\">United States</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</span>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info-date\">\n\t\t\t\t\t4 Hours ago\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-profile-wrap\">\n\t\t\t<div class=\"post-profile-block\">\n\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t<a href=\"#\" class=\"btn btn-light-primary btn-follow\">\n\t\t\t\t\t\t<i class=\"trav-user-plus-icon\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t<div class=\"prof-name\">Stephanie small</div>\n\t\t\t\t\t\t<div class=\"prof-location\">Morocco</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<ul class=\"post-person-photo-list\">\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<!-- post profile block with slider -->\n\t\t\t<div class=\"post-profile-block-slider-wrap\">\n\t\t\t\t<div class=\"post-profile-block-slider\" id=\"postProfileSlider\">\n\t\t\t\t\t<div class=\"post-profile-slide\">\n\t\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n\t\t\t\t\t\t\t\t<i class=\"trav-user-plus-icon\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t\t<div class=\"prof-name\">Sue Perez</div>\n\t\t\t\t\t\t\t\t<div class=\"prof-location\">United States of America</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<ul class=\"post-person-photo-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-profile-slide\">\n\t\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n\t\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n\t\t\t\t\t\t\t\t<i class=\"trav-user-plus-icon\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t\t<div class=\"avatar-wrap\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/70x70\" alt=\"ava\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t\t<div class=\"prof-name\">Sue Perez</div>\n\t\t\t\t\t\t\t\t<div class=\"prof-location\">United States of America</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<ul class=\"post-person-photo-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/80x80\" alt=\"photo\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-footer-info\">\n\t\t\t<div class=\"post-reaction\">\n\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t<span>\n\t\t\t\t\t<b>3</b> Reactions</span>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<span>5 Comments</span>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">\n\t\t\t<i class=\"trav-trending-destination-icon\"></i> Trending activities\n\t\t\t<span class=\"dropdown\">\n\t\t\t\t<a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">#Morocco</a>\n\t\t\t\t<i class=\"trav-caret-down\"></i>\n\t\t\t\t<div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t<div class=\"flag-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t<div class=\"prof-name\">Morocco</div>\n\t\t\t\t\t\t\t<div class=\"prof-location\">Country in North Africa</div>\n\t\t\t\t\t\t\t<div class=\"prof-button-wrap\">\n\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"prof-follow-count\">28K Followers</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"trendingActivity\" class=\"post-slider\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Sahara quad biking</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">event</span> in Ouarzazate\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Surf Lesson at Devils Rock</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Event</span> in Agadir\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Morocco skiing</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">event</span> in Ifran\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tShared a\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">Trip Plan</a> to\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">7 Destinations</a> in\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">Tokyo</a>\n\t\t\t\t\ton 1 Sep 2017\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<div class=\"post-image-inner\">\n\t\t\t<div class=\"post-map-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/595x400\" alt=\"map\">\n\t\t\t\t<div class=\"post-map-info-caption map-blue\">\n\t\t\t\t\t<div class=\"map-avatar\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/25x25\" alt=\"ava\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"map-label-txt\">\n\t\t\t\t\t\tChecking on\n\t\t\t\t\t\t<b>2 Sep</b> at\n\t\t\t\t\t\t<b>8:30 am</b> and will stay\n\t\t\t\t\t\t<b>30 min</b>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-destination-block slide-dest-hide-right-margin\">\n\t\t\t\t<div class=\"post-dest-slider\" id=\"postDestSlider\">\n\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Senevirathne</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tStarted following\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">\n\t\t\t\t\t\t<img src=\"./assets/image/icon-small-flag.png\" alt=\"flag\"> United States of America</a> today at 5:29pm\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-name\">United States of America</p>\n\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t<i class=\"trav-talk-icon icon-grey-comment\"></i>\n\t\t\t\t\t\t<span>64K Talking about this</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\tFollow\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tPlanning a\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">Trip Plan</a> to\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">16 Destinations</a> in\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">Japan</a>\n\t\t\t\t\ton 1 Sep 2017\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<div class=\"post-follow-slider\" id=\"postFollowSlider\">\n\t\t\t<div class=\"post-image-inner\">\n\t\t\t\t<div class=\"post-map-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/595x400\" alt=\"map\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-destination-block slide-dest-hide-right-margin\">\n\t\t\t\t\t<div class=\"post-dest-slider\" id=\"postDestSliderInner1\">\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Okayama</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">6 Destinations</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Tokyo</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">7 Destinations</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Miyagi</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">3 Destinations</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-image-inner\">\n\t\t\t\t<div class=\"post-map-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/595x400\" alt=\"map\">\n\t\t\t\t\t<div class=\"post-map-info-caption map-blue\">\n\t\t\t\t\t\t<div class=\"map-avatar\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/25x25\" alt=\"ava\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"map-label-txt\">\n\t\t\t\t\t\t\tChecking on\n\t\t\t\t\t\t\t<b>2 Sep</b> at\n\t\t\t\t\t\t\t<b>8:30 am</b> and will stay\n\t\t\t\t\t\t\t<b>30 min</b>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-destination-block slide-dest-hide-right-margin\">\n\t\t\t\t\t<div class=\"post-dest-slider\" id=\"postDestSliderInner2\">\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Bulgari Tokyo</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-place\">Restaurant</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-image-inner\">\n\t\t\t\t<div class=\"post-map-wrap\">\n\t\t\t\t\t<img src=\"http://placehold.it/595x400\" alt=\"map\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-destination-block slide-dest-hide-right-margin\">\n\t\t\t\t\t<div class=\"post-dest-slider\" id=\"postDestSliderInner3\">\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Morocco</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">1 Destination</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">United Arab Emirate</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">2 Destinations</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-dest-card\">\n\t\t\t\t\t\t\t<div class=\"post-dest-card-inner\">\n\t\t\t\t\t\t\t\t<div class=\"dest-image\">\n\t\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"dest-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"dest-name\">Japan</div>\n\t\t\t\t\t\t\t\t\t<div class=\"dest-count\">10 Destinations</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Mariel</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tStarted following\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">\n\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i> Los Angeles</a> today at 5:29pm\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t<div class=\"post-image-title\">\n\t\t\t\t\tLos Angeles\n\t\t\t\t\t<img src=\"http://placehold.it/28x16/666?text=flag\" alt=\"flag\">\n\t\t\t\t</div>\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-place-info\">City in\n\t\t\t\t\t\t<a href=\"#\">United States of America</a>\n\t\t\t\t\t</p>\n\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t<i class=\"trav-talk-icon icon-grey-comment\"></i>\n\t\t\t\t\t\t<span>64K Talking about this</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\tFollow\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Cheryl cornett</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tStarted following\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">\n\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i> Disneyland</a> today at 5:29pm\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-place-name\">Disneyland</p>\n\t\t\t\t\t<p class=\"follow-place-info\">Park in\n\t\t\t\t\t\t<a href=\"#\">California, United States of America</a>\n\t\t\t\t\t</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\tFollow\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"follow-main-content\">\n\t\t\t<p>Disneyland Park, originally Disneyland, is the first of two theme parks built at the Disneyland Resort in Anaheim, California,\n\t\t\t\topened...\n\t\t\t\t<a href=\"#\">More</a>\n\t\t\t</p>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\tToday\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Mariel</a>\n\t\t\t\t\tstarted following these cities\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-same-block-inner\">\n\t\t\t<div class=\"post-top-info-layer\">\n\t\t\t\t<div class=\"post-top-info-wrap\">\n\t\t\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Mariel</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\t\t\tStarted following\n\t\t\t\t\t\t\t<i class=\"trav-set-location-icon\"></i>\n\t\t\t\t\t\t\t<a href=\"#\" class=\"link-place\">Los Angeles</a>\n\t\t\t\t\t\t\ttoday at 5:29 pm\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-top-info-action\">\n\t\t\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t\t<ul id=\"placeInfoPostCard\" class=\"post-slider\">\n\t\t\t\t\t<li class=\"post-place-info-card\">\n\t\t\t\t\t\t<div class=\"post-card-inner\">\n\t\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/400x210\" alt=\"\">\n\t\t\t\t\t\t\t\t<div class=\"post-place-image-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"place-flag-image\">\n\t\t\t\t\t\t\t\t\t\t<img class=\"flag-image\" src=\"http://placehold.it/105x53/e70c24?text=flag\" alt=\"flag\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t\t<p class=\"post-place-name\" href=\"#\">Los Angeles</p>\n\t\t\t\t\t\t\t\t<p class=\"post-card-placement\">\n\t\t\t\t\t\t\t\t\tCity in\n\t\t\t\t\t\t\t\t\t<a href=\"#\">United States of America</a>\n\t\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t\t<ul class=\"post-footer-info-list\">\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">26.581</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Followers</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">34</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Trip Plans</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">#7</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Ranking</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</li>\n\t\t\t\t\t<li class=\"post-place-info-card\">\n\t\t\t\t\t\t<div class=\"post-card-inner\">\n\t\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t\t<img src=\"http://placehold.it/400x210\" alt=\"\">\n\t\t\t\t\t\t\t\t<div class=\"post-place-image-info\">\n\t\t\t\t\t\t\t\t\t<div class=\"place-flag-image\">\n\t\t\t\t\t\t\t\t\t\t<img class=\"flag-image\" src=\"http://placehold.it/105x53/e70c24?text=flag\" alt=\"flag\">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t\t<p class=\"post-place-name\" href=\"#\">Vancouver</p>\n\t\t\t\t\t\t\t\t<p class=\"post-card-placement\">\n\t\t\t\t\t\t\t\t\tCity in\n\t\t\t\t\t\t\t\t\t<a href=\"#\">British Columbia, Canada</a>\n\t\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t\t<ul class=\"post-footer-info-list\">\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">34.581</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Followers</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">82</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Trip Plans</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-count\">#7</p>\n\t\t\t\t\t\t\t\t\t\t<p class=\"info-label\">Ranking</p>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-footer-info\">\n\t\t\t<div class=\"post-reaction\">\n\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t<span>\n\t\t\t\t\t<b>6</b> Reactions</span>\n\t\t\t</div>\n\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<span>20 Comments</span>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Tom</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Sockets & Plugs</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">United States of America</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-socket-plugin-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">United States of America</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Tom</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Tom</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Weather</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">New York City</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-title\">\n\t\t\t\t\t\tNew York City\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-weather-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-place-info\">City in\n\t\t\t\t\t\t\t<a href=\"#\">United States of America</a>\n\t\t\t\t\t\t</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<i class=\"trav-talk-icon icon-grey-comment\"></i>\n\t\t\t\t\t\t\t<span>60 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Tom</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>It's a nice weather here</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Clara Newkirk</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">National Holidays</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Japan</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-national-holiday-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Japan</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Clara Newkirk</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@claraN</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Cras ut diam non nisi sollicitudin viverra sit amet efficitur odio rellentesque id imperdiet mi.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Tom</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Emergency Numbers</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">New York City</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-emergency-number-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">New York City</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Tom</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>It's a nice weather here</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">James Hamilton</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Visa Requirement</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Morocco</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-visa-requirement-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Morocco</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">James Hamilton</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@jamesH</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>How easy it is to get a visa for morocco?</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Clara Newkirk</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Average Flights Prices</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Japan</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-average-flight-price-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Japan</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Clara Newkirk</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@claraN</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Cras ut diam non nisi sollicitudin viverra sit amet efficitur odio rellentesque id imperdiet mi.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Tom</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Safety</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">United States of America</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-safety-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">United States of America</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Tom</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">James Hamilton</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Morocco</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-about-city-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"follow-flag-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Morocco</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">James Hamilton</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@jamesH</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name post-ellipsis\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Kenneth Burgess</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Public Event Quick Chek New Jersey test test test</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-public-event-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"date-block\">\n\t\t\t\t\t\t<div class=\"follow-round\">\n\t\t\t\t\t\t\t<span class=\"month blue\">jul</span>\n\t\t\t\t\t\t\t<span class=\"count-day\">15</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Public Event Quick Chek New Jersey</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Kenneth Burgess</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@kanneth</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Videos you might like\n\t\t\t<span class=\"count\">20</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"videoYouMightLikePostCard\" class=\"post-slider slide-same-height\">\n\t\t\t\t<li class=\"post-card post-video-card\">\n\t\t\t\t\t<div class=\"post-video-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-video-txt\">Tokyo Vacation Travel Guide | Expedia</p>\n\t\t\t\t\t\t\t<p class=\"post-card-posted\">\n\t\t\t\t\t\t\t\tPosted by\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"card-name-link\">Mike</a>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t\t<div class=\"post-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t\t\t\t\t\t<span>\n\t\t\t\t\t\t\t\t\t\t<b>6</b> Reactions</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-card post-video-card\">\n\t\t\t\t\t<div class=\"post-video-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-video-txt\">1 year traveling around the world</p>\n\t\t\t\t\t\t\t<p class=\"post-card-posted\">\n\t\t\t\t\t\t\t\tPosted by\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"card-name-link\">Kenneth Burgess</a>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t\t<div class=\"post-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-like.png\" alt=\"smile\">\n\t\t\t\t\t\t\t\t\t<span>\n\t\t\t\t\t\t\t\t\t\t<b>2</b> Reactions</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-card post-video-card\">\n\t\t\t\t\t<div class=\"post-video-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-video-txt\">We Call This Home</p>\n\t\t\t\t\t\t\t<p class=\"post-card-posted\">\n\t\t\t\t\t\t\t\tPosted by\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"card-name-link\">Alix</a>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<div class=\"post-footer-info\">\n\t\t\t\t\t\t\t\t<div class=\"post-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t\t\t\t\t\t<span>\n\t\t\t\t\t\t\t\t\t\t<b>6</b> Reactions</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name post-ellipsis\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Betty Obrien</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Event Programm</a>\n\t\t\t\t\ton\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Cherry Blossom</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-event-program-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"date-block\">\n\t\t\t\t\t\t<div class=\"follow-round\">\n\t\t\t\t\t\t\t<span class=\"month blue\">jul</span>\n\t\t\t\t\t\t\t<span class=\"count-day\">18</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Cherry Blossom</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Betty Obrien</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@berryO</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">\n\t\t\t<i class=\"trav-trending-destination-icon\"></i> Trending activities\n\t\t\t<span class=\"dropdown\">\n\t\t\t\t<a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">#United States</a>\n\t\t\t\t<i class=\"trav-caret-down\"></i>\n\t\t\t\t<div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n\t\t\t\t\t<div class=\"post-prof-image\">\n\t\t\t\t\t\t<img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n\t\t\t\t\t\t alt=\"photo\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"post-prof-main\">\n\t\t\t\t\t\t<div class=\"flag-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-person-info\">\n\t\t\t\t\t\t\t<div class=\"prof-name\">United States</div>\n\t\t\t\t\t\t\t<div class=\"prof-location\">Country in North America</div>\n\t\t\t\t\t\t\t<div class=\"prof-button-wrap\">\n\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"prof-follow-count\">28K Followers</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"drop-bottom-link\">\n\t\t\t\t\t\t\t<a href=\"#\" class=\"profile-link\">View profile</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</span>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"trendingActivity2\" class=\"post-slider\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Super Bowl 2018</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Event</span> in Minneapolis\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">2017-18 NBA Season</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Event</span> in United States\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Event name here</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Event</span> in New York City\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name post-ellipsis\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Kenneth Burgess</a>\n\t\t\t\t\tadded a comment about\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Disneyland</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x210\" alt=\"\">\n\t\t\t\t\t<div class=\"post-image-mark-icon\">\n\t\t\t\t\t\t<i class=\"trav-about-city-icon\"></i>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-follow-block\">\n\t\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t\t<div class=\"date-block\">\n\t\t\t\t\t\t<div class=\"follow-round\">\n\t\t\t\t\t\t\t<i class=\"trav-map-marker-icon\"></i>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t\t<p class=\"follow-name\">Disneyland</p>\n\t\t\t\t\t\t<div class=\"follow-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t\t<span>437 Comments</span>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n\t\t\t\t\t\tJoin the discussion\n\t\t\t\t\t</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Kenneth Burgess</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@kanneth</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Discover new travelers</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap\">\n\t\t\t<ul id=\"newTravelerDiscover\" class=\"post-slider slide-same-height\">\n\t\t\t\t<li class=\"post-follow-card post-travel-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/62x62\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Bijay uprety</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Traveler</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">Followed by Nina Crespi and 22 more</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card post-travel-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/62x62\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Beatriz kim park</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Traveler</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-primary btn-bordered\">Following</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">Followed by Martin</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card post-travel-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/62x62\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Kathleen brown</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Write</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">39 Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card post-travel-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/62x62\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Alex ah</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Photographer</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">8K Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li class=\"post-follow-card post-travel-card\">\n\t\t\t\t\t<div class=\"follow-card-inner\">\n\t\t\t\t\t\t<div class=\"image-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/62x62\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<p class=\"post-card-name\">Louie olson</p>\n\t\t\t\t\t\t\t<p class=\"post-card-spec\">Photographer</p>\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t\t\t\t<p class=\"post-card-follow-count\">198K Followers</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Discover New destinations</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t</a>\n\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t</a>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-slide-wrap slide-hide-right-margin\">\n\t\t\t<ul id=\"discoverNewDestination\" class=\"post-slider\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Central park</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Park</span> in New York City\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Tokyo</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">City</span> in Japan\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/230x300\" alt=\"\">\n\t\t\t\t\t<div class=\"post-slider-caption transparent-caption\">\n\t\t\t\t\t\t<p class=\"post-slide-name\" href=\"#\">Grand canyon national park</p>\n\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t<span class=\"tag\">Park</span> in Arizona\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-side-top\">\n\t\t<h3 class=\"side-ttl\">Upcoming event in\n\t\t\t<a class=\"event-place\" href=\"#\">New York City</a>\n\t\t\t<i class=\"trav-caret-down\"></i>\n\t\t</h3>\n\t\t<div class=\"side-right-control\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-side-inner\">\n\t\t<div class=\"post-event-block\">\n\t\t\t<div class=\"post-event-image\">\n\t\t\t\t<img class=\"event-cover\" src=\"https://www.runnersworld.com/sites/runnersworld.com/files/styles/article_main_custom_user_phone_1x/public/articles/2016/09/nyc_marathon.jpg?itok=mrgDghrv&timestamp=1473862824\"\n\t\t\t\t alt=\"photo\">\n\t\t\t</div>\n\t\t\t<div class=\"post-event-main\">\n\t\t\t\t<div class=\"logo-wrap\">\n\t\t\t\t\t<img src=\"./assets/image/upcoming-event-logo.png\" alt=\"ava\">\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-placement-info\">\n\t\t\t\t\t<a class=\"event-name\">New York City half marathon</a>\n\t\t\t\t\t<div class=\"event-info-layer\">\n\t\t\t\t\t\t<span class=\"date-event\">20 Mars 2018</span>\n\t\t\t\t\t\t<div class=\"event-foot-info\">\n\t\t\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t</ul>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<span class='talking'>20 Talking about this</span>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"event-main-content\">\n\t\t\t\t\t\t<p>The New York City Half Marathon is an annual half marathon road running race. It passes through famous landmarks such\n\t\t\t\t\t\t\tas Central Park and...\n\t\t\t\t\t\t\t<a href=\"#\">More</a>\n\t\t\t\t\t\t</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<ul class=\"post-event-photo-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/126x126\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/126x126\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/126x126\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/126x126\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t\t<div class=\"event-bottom-link\">\n\t\t\t\t<a href=\"#\" class=\"event-link\">Visit event page</a>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap\">\n\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Thomas Aranda</a>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-info\">\n\t\t\t\t\tShared a\n\t\t\t\t\t<a href=\"#\" class=\"link-place\">link</a> yesterday at 10:33pm\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-image-container post-follow-container\">\n\t\t<ul class=\"post-image-list\">\n\t\t\t<li>\n\t\t\t\t<img src=\"http://placehold.it/595x330?text=video\" alt=\"\">\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"post-follow-block\">\n\t\t\t<div class=\"follow-txt-wrap\">\n\t\t\t\t<div class=\"follow-txt\">\n\t\t\t\t\t<p class=\"follow-destination\">200 Days - A Trip Around the World Travel Film</p>\n\t\t\t\t\t<p class=\"follow-place-info\">My wife and I traveled to 17 countries in 200 days. This film is the sgs dfg sfgs fgsdf g</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-btn-wrap\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-open-window\">\n\t\t\t\t\t<i class=\"trav-open-video-in-window\"></i>\n\t\t\t\t</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-footer-info\">\n\t\t<div class=\"post-reaction\">\n\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t<span>\n\t\t\t\t<b>6</b> Reactions</span>\n\t\t</div>\n\t\t<div class=\"post-comment-info\">\n\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t\t<li>\n\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<span>20 Comments</span>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n\t<div class=\"post-top-info-layer\">\n\t\t<div class=\"post-top-info-wrap\">\n\t\t\t<div class=\"post-top-avatar-wrap post-marked-avatar\">\n\t\t\t\t<img src=\"http://placehold.it/20x20\" alt=\"\">\n\t\t\t</div>\n\t\t\t<div class=\"post-top-info-txt\">\n\t\t\t\t<div class=\"post-top-name profile-name post-ellipsis\">\n\t\t\t\t\t<a class=\"post-name-link\" href=\"#\">Tom</a>\n\t\t\t\t\tadded a comment about a\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">Photo</a>\n\t\t\t\t\tin\n\t\t\t\t\t<a href=\"#\" class=\"post-name-link\">\n\t\t\t\t\t\t<img src=\"./assets/image/icon-small-flag.png\" alt=\"flag\"> United States of America</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-top-info-action\">\n\t\t\t<div class=\"dropdown\">\n\t\t\t\t<button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n\t\t\t\t\t<i class=\"trav-angle-down\"></i>\n\t\t\t\t</button>\n\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-share-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Share</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Spread the word</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-heart-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Add to favorites</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Save it for later</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">\n\t\t\t\t\t\t<span class=\"icon-wrap\">\n\t\t\t\t\t\t\t<i class=\"trav-flag-icon\"></i>\n\t\t\t\t\t\t</span>\n\t\t\t\t\t\t<div class=\"drop-txt\">\n\t\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t\t<b>Report</b>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t\t<p>Help us understand</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</a>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"post-content-inner\">\n\t\t<div class=\"post-image-container post-follow-container\">\n\t\t\t<ul class=\"post-image-list\">\n\t\t\t\t<li>\n\t\t\t\t\t<img src=\"http://placehold.it/595x360\" alt=\"\">\n\t\t\t\t</li>\n\t\t\t</ul>\n\t\t\t<div class=\"post-footer-info post-footer-padded\">\n\t\t\t\t<div class=\"post-reaction\">\n\t\t\t\t\t<img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n\t\t\t\t\t<span>\n\t\t\t\t\t\t<b>6</b> Reactions</span>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"post-comment-info\">\n\t\t\t\t\t<i class=\"trav-comment-icon\"></i>\n\t\t\t\t\t<ul class=\"foot-avatar-list\">\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t<img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t\t<span>20 Comments</span>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"follow-comment-wrap comment-on-photo\">\n\t\t\t\t<div class=\"post-comment-wrapper\">\n\t\t\t\t\t<div class=\"post-comment-row\">\n\t\t\t\t\t\t<div class=\"post-com-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"post-comment-text\">\n\t\t\t\t\t\t\t<div class=\"post-com-name-layer\">\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-name\">Tom</a>\n\t\t\t\t\t\t\t\t<a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-txt\">\n\t\t\t\t\t\t\t\t<p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"comment-bottom-info\">\n\t\t\t\t\t\t\t\t<div class=\"com-reaction\">\n\t\t\t\t\t\t\t\t\t<img src=\"./assets/image/icon-smile.png\" alt=\"\">\n\t\t\t\t\t\t\t\t\t<span>21</span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t<div class=\"com-time\">6 hours ago</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<!-- <div class=\"post-follow-block\"></div> -->\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/posts/posts.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/posts/posts.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PostsComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var PostsComponent = (function () {
    function PostsComponent() {
    }
    PostsComponent.prototype.ngOnInit = function () {
    };
    PostsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-posts',
            template: __webpack_require__("../../../../../src/app/posts/posts.component.html"),
            styles: [__webpack_require__("../../../../../src/app/posts/posts.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], PostsComponent);
    return PostsComponent;
}());



/***/ }),

/***/ "../../../../../src/app/right-side-bar/right-side-bar.component.html":
/***/ (function(module, exports) {

module.exports = "<aside class=\"sidebar\">\n\n\t<div class=\"post-block post-side-tabs\">\n\t\t<ul class=\"nav nav-tabs\" role=\"tablist\">\n\t\t\t<li class=\"nav-item\">\n\t\t\t\t<a class=\"nav-link active\" data-toggle=\"tab\" href=\"#global\" role=\"tab\">Global</a>\n\t\t\t</li>\n\t\t\t<li class=\"nav-item\">\n\t\t\t\t<a class=\"nav-link\" data-toggle=\"tab\" href=\"#following\" role=\"tab\">Following</a>\n\t\t\t</li>\n\t\t</ul>\n\t\t<div class=\"tab-content\">\n\t\t\t<div class=\"tab-pane active\" id=\"global\" role=\"tabpanel\">\n\t\t\t\t<div class=\"side-tab-inner mCustomScrollbar\">\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Ilyas Zahir Hitima</a>\n\t\t\t\t\t\t\t\tshared a\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">Trip Plan</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">5 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Zahir</a>\n\t\t\t\t\t\t\t\tis now following\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">New York</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">6 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Mara Eahir</a>\n\t\t\t\t\t\t\t\tadd a photo to\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">Paris</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">8 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Ilyas Zahir</a>\n\t\t\t\t\t\t\t\tcommented in\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">United States</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">12 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Suzanne</a>\n\t\t\t\t\t\t\t\tis now following\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">Oujda</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">16 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-pane-row\">\n\t\t\t\t\t\t<div class=\"side-pane-avatar-wrap\">\n\t\t\t\t\t\t\t<img src=\"http://placehold.it/45x45\" alt=\"\">\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"side-pane-txt\">\n\t\t\t\t\t\t\t<div class=\"side-pane-post-ttl\">\n\t\t\t\t\t\t\t\t<a class=\"in-side-link\" href=\"#\">Zahir</a>\n\t\t\t\t\t\t\t\tis now following\n\t\t\t\t\t\t\t\t<a class=\"in-side-link link-thin\" href=\"#\">New York</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"side-pane-date\">6 min ago</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"tab-pane\" id=\"following\" role=\"tabpanel\">following tab</div>\n\t\t</div>\n\t</div>\n\n\t<div class=\"post-block post-side-block\">\n\t\t<div class=\"post-side-top\">\n\t\t\t<h3 class=\"side-ttl\">Popular destinations</h3>\n\t\t\t<div class=\"side-right-control\">\n\t\t\t\t<a href=\"#\" class=\"see-more-link\">See more</a>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-side-inner\">\n\t\t\t<div class=\"side-dest-block-wrap\">\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Eiffel tower</h4>\n\t\t\t\t\t\t<p>Paris, France</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Seine River</h4>\n\t\t\t\t\t\t<p>France</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Walt Disney World</h4>\n\t\t\t\t\t\t<p>Florida, United States</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Fushimi Inari-taisha</h4>\n\t\t\t\t\t\t<p>Kyoto, Japan</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Central Park</h4>\n\t\t\t\t\t\t<p>New York, United States</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"side-dest-block\" style=\"background-image:url(http://placehold.it/156x156)\">\n\t\t\t\t\t<div class=\"side-dest-ttl\">\n\t\t\t\t\t\t<h4>Ouzoud Falls</h4>\n\t\t\t\t\t\t<p>Morocco</p>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\n\t<div class=\"post-block post-side-block\">\n\t\t<div class=\"post-side-top\">\n\t\t\t<h3 class=\"side-ttl\">Top places</h3>\n\t\t\t<div class=\"side-right-control\">\n\t\t\t\t<a href=\"#\" class=\"see-more-link\">See more</a>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-side-inner\">\n\t\t\t<div class=\"side-place-block\">\n\t\t\t\t<div class=\"side-place-top\">\n\t\t\t\t\t<div class=\"side-place-avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/46x46\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-place-txt\">\n\t\t\t\t\t\t<a class=\"side-place-name\" href=\"#\">Disneyland</a>\n\t\t\t\t\t\t<div class=\"side-place-description\">\n\t\t\t\t\t\t\t<b>Park</b> in Wyoming, United States of America\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<ul class=\"side-place-image-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<div class=\"side-place-bottom\">\n\t\t\t\t\t<div class=\"side-follow-info\">\n\t\t\t\t\t\t<b>642</b> Following this place\n\t\t\t\t\t</div>\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"side-place-block\">\n\t\t\t\t<div class=\"side-place-top\">\n\t\t\t\t\t<div class=\"side-place-avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/46x46\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-place-txt\">\n\t\t\t\t\t\t<a class=\"side-place-name\" href=\"#\">Statue of Liberty</a>\n\t\t\t\t\t\t<div class=\"side-place-description\">\n\t\t\t\t\t\t\t<b>Sculpture</b> in New York, United States of America\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<ul class=\"side-place-image-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<div class=\"side-place-bottom\">\n\t\t\t\t\t<div class=\"side-follow-info\">\n\t\t\t\t\t\t<b>642</b> Following this place\n\t\t\t\t\t</div>\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-primary btn-bordered\">Following</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"side-place-block\">\n\t\t\t\t<div class=\"side-place-top\">\n\t\t\t\t\t<div class=\"side-place-avatar-wrap\">\n\t\t\t\t\t\t<img src=\"http://placehold.it/46x46\" alt=\"\">\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"side-place-txt\">\n\t\t\t\t\t\t<a class=\"side-place-name\" href=\"#\">Yellowstone National Park</a>\n\t\t\t\t\t\t<div class=\"side-place-description\">\n\t\t\t\t\t\t\t<b>Park</b> in United States of America\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<ul class=\"side-place-image-list\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/79x75\" alt=\"photo\">\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t\t<div class=\"side-place-bottom\">\n\t\t\t\t\t<div class=\"side-follow-info\">\n\t\t\t\t\t\t<b>642</b> Following this place\n\t\t\t\t\t</div>\n\t\t\t\t\t<button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\n\t<div class=\"post-block post-side-block\">\n\t\t<div class=\"post-side-top\">\n\t\t\t<h3 class=\"side-ttl\">Stories</h3>\n\t\t\t<div class=\"side-right-control\">\n\t\t\t\t<a href=\"#\" class=\"slide-link slide-prev\">\n\t\t\t\t\t<i class=\"trav-angle-left\"></i>\n\t\t\t\t</a>\n\t\t\t\t<a href=\"#\" class=\"slide-link slide-next\">\n\t\t\t\t\t<i class=\"trav-angle-right\"></i>\n\t\t\t\t</a>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"post-side-inner\">\n\t\t\t<div class=\"post-slide-wrap\">\n\t\t\t\t<ul id=\"storySlider\" class=\"post-slider\">\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/325x174\" alt=\"\">\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<a class=\"post-slide-name\" href=\"#\">4 Days from Morocco to Japan</a>\n\t\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t\tWhen I get the idea of going to japan I was thinking\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</li>\n\t\t\t\t\t<li>\n\t\t\t\t\t\t<img src=\"http://placehold.it/325x174\" alt=\"\">\n\t\t\t\t\t\t<div class=\"post-slider-caption\">\n\t\t\t\t\t\t\t<a class=\"post-slide-name\" href=\"#\">4 Days from Morocco to Japan</a>\n\t\t\t\t\t\t\t<div class=\"post-slide-description\">\n\t\t\t\t\t\t\t\tWhen I get the idea of going to japan I was thinking\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</li>\n\t\t\t\t</ul>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\n\t<app-side-footer></app-side-footer>\n</aside>"

/***/ }),

/***/ "../../../../../src/app/right-side-bar/right-side-bar.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/right-side-bar/right-side-bar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RightSideBarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var RightSideBarComponent = (function () {
    function RightSideBarComponent() {
    }
    RightSideBarComponent.prototype.ngOnInit = function () {
    };
    RightSideBarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-right-side-bar',
            template: __webpack_require__("../../../../../src/app/right-side-bar/right-side-bar.component.html"),
            styles: [__webpack_require__("../../../../../src/app/right-side-bar/right-side-bar.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], RightSideBarComponent);
    return RightSideBarComponent;
}());



/***/ }),

/***/ "../../../../../src/app/side-footer/side-footer.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"aside-footer\">\n\t<ul class=\"aside-foot-menu\">\n\t\t<li>\n\t\t\t<a href=\"#\">Privacy</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">Terms</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">Advertising</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">Cookies</a>\n\t\t</li>\n\t\t<li>\n\t\t\t<a href=\"#\">More</a>\n\t\t</li>\n\t</ul>\n\t<p class=\"copyright\">Travooo &copy; 2017</p>\n</div>"

/***/ }),

/***/ "../../../../../src/app/side-footer/side-footer.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/side-footer/side-footer.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SideFooterComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var SideFooterComponent = (function () {
    function SideFooterComponent() {
    }
    SideFooterComponent.prototype.ngOnInit = function () {
    };
    SideFooterComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-side-footer',
            template: __webpack_require__("../../../../../src/app/side-footer/side-footer.component.html"),
            styles: [__webpack_require__("../../../../../src/app/side-footer/side-footer.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], SideFooterComponent);
    return SideFooterComponent;
}());



/***/ }),

/***/ "../../../../../src/app/signup/signup.component.html":
/***/ (function(module, exports) {

module.exports = "<app-signup-step1></app-signup-step1>\n<app-signup-step2></app-signup-step2>\n<app-signup-step3></app-signup-step3>\n<app-signup-step4></app-signup-step4>\n<app-signup-step5></app-signup-step5>"

/***/ }),

/***/ "../../../../../src/app/signup/signup.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/signup.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SignupComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser___ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var SignupComponent = (function () {
    function SignupComponent(route, router, userService, alertService, formBuilder, titleService) {
        this.route = route;
        this.router = router;
        this.userService = userService;
        this.alertService = alertService;
        this.formBuilder = formBuilder;
        this.titleService = titleService;
    }
    SignupComponent.prototype.ngOnInit = function () {
    };
    SignupComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup',
            template: __webpack_require__("../../../../../src/app/signup/signup.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/signup.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["f" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["a" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["a" /* FormBuilder */],
            __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser___["b" /* Title */]])
    ], SignupComponent);
    return SignupComponent;
}());



/***/ }),

/***/ "../../../../../src/app/signup/step1/step1.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- create an account -->\n<div class=\"modal fade signUpStep\" id=\"signUpStep1\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n\t<div class=\"modal-dialog sign-up-style\" role=\"document\">\n\t\t<div class=\"modal-content\">\n\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n\t\t\t\t<span aria-hidden=\"true\">&times;</span>\n\t\t\t</button>\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"top-layer\">\n\t\t\t\t\t<a href=\"#\" class=\"logo-wrap\">\n\t\t\t\t\t\t<img src=\"./assets/image/main-logo.png\" alt=\"\">\n\t\t\t\t\t</a>\n\t\t\t\t\t<h4 class=\"title\">Create a free account</h4>\n\t\t\t\t\t<!-- <p class=\"sub-ttl\">and write a text here</p> -->\n\t\t\t\t\t<!-- <p class=\"sub-ttl error-message\">Your password is too weak</p> -->\n\t\t\t\t\t<!-- <p class=\"sub-ttl error-message\">Please fill the required fields</p> -->\n\t\t\t\t\t<p class=\"sub-ttl error-message\" *ngFor=\"let msg of errors\">{{ msg }}</p>\n\t\t\t\t</div>\n\t\t\t\t<form class=\"login-form\" name=\"signupForm1\" [formGroup]=\"signupForm1\" (ngSubmit)=\"continueStep1()\" novalidate>\n\t\t\t\t\t<div class=\"step-1\">\n\t\t\t\t\t\t\n\t\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"validate('email')\">\n\t\t\t\t\t\t\t<input class=\"form-control\" type=\"email\" name=\"email\" formControlName=\"email\" placeholder=\"Email address\" aria-describedby=\"emailHelp\" />\n\t\t\t\t\t\t\t<!-- <input type=\"email\" class=\"form-control\" name=\"username\" [(ngModel)]=\"model.username\" #username=\"ngModel\" required aria-describedby=\"emailHelp\" placeholder=\"Email address\"/> -->\n\t\t\t\t\t\t\t<!-- <div *ngIf=\"f.submitted && !username.valid\" class=\"help-block\">Email is required</div> -->\n\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.email\">\n\t\t\t\t\t\t\t\t<p>{{ signupErrors.email }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"validate('username')\">\n\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" name=\"username\" formControlName=\"username\" placeholder=\"Username\" aria-describedby=\"username\" />\n\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.username\">\n\t\t\t\t\t\t\t\t<p>{{ signupErrors.username }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\n\t\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"validate('password')\">\n\t\t\t\t\t\t\t<input class=\"form-control\" type=\"password\" name=\"password\" formControlName=\"password\" placeholder=\"Password\" aria-describedby=\"pass\" />\n\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.password\">\n\t\t\t\t\t\t\t\t<p>{{ signupErrors.password }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"validate('cpassword')\">\n\t\t\t\t\t\t\t<input class=\"form-control\" type=\"password\" name=\"cpassword\" formControlName=\"cpassword\" placeholder=\"Confirm Password\" aria-describedby=\"cpass\" />\n\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.cpassword\">\n\t\t\t\t\t\t\t\t<p>{{ signupErrors.cpassword }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"form-margin\"></div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-success\" [disabled]=\"!signupForm1.valid || loading\">{{ signupContinueBtnText }}</button>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<p class=\"simple-txt\">Or</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\">\n\t\t\t\t\t\t\t\t<i class=\"fa fa-facebook side-icon\"></i>\n\t\t\t\t\t\t\t\tContinue with Facebook\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-info\">\n\t\t\t\t\t\t\t\t<i class=\"fa fa-twitter side-icon\"></i>\n\t\t\t\t\t\t\t\tContinue with Twitter\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group bottom-txt-group\">\n\t\t\t\t\t\t<p class=\"bottom-txt\">Creating an account means you're okay with</p>\n\t\t\t\t\t\t<ul class=\"link-list\">\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<b>Travooo's</b>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<a href=\"#\"> Terms of Service,</a>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<a href=\"#\"> Privacy Policy</a>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t</ul>\n\t\t\t\t\t</div>\n\t\t\t\t</form>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<p class=\"foot-txt\">Already a member?</p>\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" (click)=\"openLogin()\">Log In</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n"

/***/ }),

/***/ "../../../../../src/app/signup/step1/step1.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/step1/step1.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Step1Component; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__helpers_custom_validators__ = __webpack_require__("../../../../../src/_helpers/custom-validators.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__angular_platform_browser___ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var Step1Component = (function () {
    function Step1Component(route, router, userService, alertService, formBuilder, titleService) {
        this.route = route;
        this.router = router;
        this.userService = userService;
        this.alertService = alertService;
        this.formBuilder = formBuilder;
        this.titleService = titleService;
        this.loading = false;
        this.signupContinueBtnText = "Continue";
        this.email = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required,
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].email
        ]);
        this.username = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required
        ]);
        this.password = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required
        ]);
        this.cpassword = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required,
            Object(__WEBPACK_IMPORTED_MODULE_4__helpers_custom_validators__["a" /* ConfirmPasswordValidator */])(this.password)
        ]);
        this.errors = [];
    }
    Step1Component.prototype.ngOnInit = function () {
        var step1 = {
            username: this.username,
            email: this.email,
            password: this.password,
            cpassword: this.cpassword
        };
        this.signupForm1 = this.formBuilder.group(step1);
        this.signupErrors = {};
    };
    Step1Component.prototype.openLogin = function () {
        this.titleService.setTitle("Travoo - Login");
        // close signup modals and open login model
        $('.signUpStep').modal("hide");
        $('#logIn').modal("show");
    };
    Step1Component.prototype.validate = function (name) {
        this.signupErrors[name] = '';
        var control = this.signupForm1.get(name);
        if ((!control.pristine || control.touched) && !control.valid) {
            if (control.errors.required) {
                this.signupErrors[name] = "This field is required.";
            }
            else if (control.errors.email) {
                this.signupErrors[name] = "This Email is not valid.";
            }
            else if (control.errors.ConfirmPassword) {
                this.signupErrors[name] = "Password must be repeated exactly.";
            }
            return 'has-danger';
        }
    };
    Step1Component.prototype.continueStep1 = function () {
        var _this = this;
        this.errors = [];
        this.toggleSignupStep1(false);
        var user = {};
        user.username = this.username.value;
        user.email = this.email.value;
        user.password = this.password.value;
        user.password_confirmation = this.cpassword.value;
        if (this.email.valid && this.username.valid && this.password.valid && this.cpassword.valid) {
            this.userService.signupStep1(user)
                .subscribe(function (data) {
                //console.log(data);
                if (data.success) {
                    var id = data.data;
                    //console.log(id);
                    localStorage.setItem('signupId', id);
                    _this.toggleSignupStep1(true);
                    // continue to step 2
                    $('#signUpStep1').modal("hide");
                    $('#signUpStep2').modal("show");
                }
                else {
                    _this.errors = data.data.message;
                    _this.toggleSignupStep1(true);
                }
            }, function (error) {
                console.log(error);
                _this.toggleSignupStep1(true);
            });
        }
        else {
            this.errors.push("Please fill all fields with valid values first.");
        }
    };
    Step1Component.prototype.toggleSignupStep1 = function (state) {
        if (state) {
            this.signupContinueBtnText = "Continue";
            this.loading = false;
        }
        else {
            this.signupContinueBtnText = "Signing Up ...";
            this.loading = true;
        }
    };
    Step1Component = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup-step1',
            template: __webpack_require__("../../../../../src/app/signup/step1/step1.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/step1/step1.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["f" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["a" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["a" /* FormBuilder */],
            __WEBPACK_IMPORTED_MODULE_5__angular_platform_browser___["b" /* Title */]])
    ], Step1Component);
    return Step1Component;
}());



/***/ }),

/***/ "../../../../../src/app/signup/step2/step2.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"modal fade signUpStep\" id=\"signUpStep2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\" data-backdrop=\"static\" data-keyboard=\"false\">\n\t<div class=\"modal-dialog sign-up-style\" role=\"document\">\n\t\t<div class=\"modal-content\">\n\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n\t\t\t\t<span aria-hidden=\"true\">&times;</span>\n\t\t\t</button>\n\t\t\t<div class=\"modal-body body-create\">\n\t\t\t\t<div class=\"top-layer\">\n\t\t\t\t\t<a href=\"#\" class=\"logo-wrap\">\n\t\t\t\t\t\t<img src=\"./assets/image/main-logo.png\" alt=\"\">\n\t\t\t\t\t</a>\n\t\t\t\t\t<h4 class=\"title\">Create a free account</h4>\n\t\t\t\t\t<!-- <p class=\"sub-ttl\">and write a text here</p> -->\n\t\t\t\t\t<!-- <p class=\"sub-ttl error-message\">Your password is too weak</p> -->\n\t\t\t\t\t<!-- <p class=\"sub-ttl error-message\">Please fill the required fields</p> -->\n\t\t\t\t\t<p class=\"sub-ttl error-message\" *ngFor=\"let msg of errors\">{{ msg }}</p>\n\t\t\t\t</div>\n\t\t\t\t<form class=\"login-form\" name=\"signupForm2\" [formGroup]=\"signupForm2\" (ngSubmit)=\"continueStep2()\" novalidate>\n\t\t\t\t\t<div class=\"step-2\">\n\t\t\t\t\t\t<!-- <div class=\"form-group\">\n\t\t\t\t\t\t\t<p class=\"email-field\">emailhere@gmail.com</p>\n\t\t\t\t\t\t</div> -->\n\t\t\t\t\t\t<div class=\"form-group flex-custom\">\n\t\t\t\t\t\t\t<div class=\"flex-input\" [ngClass]=\"validate('name')\">\n\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" name=\"name\" formControlName=\"name\" placeholder=\"Full Name\" aria-describedby=\"full name\" />\n\t\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.name\">\n\t\t\t\t\t\t\t\t\t<p>{{ signupErrors.name }}</p>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"validate('age')\">\n\t\t\t\t\t\t\t\t<select class=\"custom-select\" id=\"age\" formControlName=\"age\">\n\t\t\t\t\t\t\t\t\t<option [selected]=\"age\">Age</option>\n\t\t\t\t\t\t\t\t\t<option value=\"1\">26</option>\n\t\t\t\t\t\t\t\t\t<option value=\"2\">27</option>\n\t\t\t\t\t\t\t\t\t<option value=\"3\">28</option>\n\t\t\t\t\t\t\t\t</select>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-check flex-custom\" [ngClass]=\"validate('gender')\">\n\t\t\t\t\t\t\t<div class=\"custom-check-label\">\n\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"custom-check-input\" name=\"gender\" id=\"male\" formControlName=\"gender\" value=\"0\">\n\t\t\t\t\t\t\t\t<label for=\"male\">Male</label>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"custom-check-label\">\n\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"custom-check-input\" name=\"gender\" id=\"female\" formControlName=\"gender\" value=\"1\">\n\t\t\t\t\t\t\t\t<label for=\"female\">Female</label>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"signupErrors.gender\">\n\t\t\t\t\t\t\t\t<p>{{ signupErrors.gender }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-info\" [disabled]=\"!signupForm2.valid || loading\">{{ signupBtnText }}</button>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-transp\" (click)=\"backToSignup()\">\n\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-left\"></i>\n\t\t\t\t\t\t\t\t<span>Back</span>\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group bottom-txt-group\">\n\t\t\t\t\t\t<p class=\"bottom-txt\">Creating an account means you're okay with</p>\n\t\t\t\t\t\t<ul class=\"link-list\">\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<b>Travooo's</b>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<a href=\"#\"> Terms of Service,</a>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li>\n\t\t\t\t\t\t\t\t<a href=\"#\"> Privacy Policy</a>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t</ul>\n\t\t\t\t\t</div>\n\t\t\t\t</form>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<p class=\"foot-txt\">Already a member?</p>\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" (click)=\"openLogin()\">Log In</button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/signup/step2/step2.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/step2/step2.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Step2Component; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser___ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var Step2Component = (function () {
    function Step2Component(route, router, userService, alertService, formBuilder, titleService) {
        this.route = route;
        this.router = router;
        this.userService = userService;
        this.alertService = alertService;
        this.formBuilder = formBuilder;
        this.titleService = titleService;
        this.loading = false;
        this.signupBtnText = "Sign Up";
        this.name = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required
        ]);
        this.age = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', []);
        this.gender = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["b" /* FormControl */]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* Validators */].required
        ]);
        this.errors = [];
    }
    Step2Component.prototype.ngOnInit = function () {
        var step2 = {
            name: this.name,
            age: this.age,
            gender: this.gender
        };
        this.signupForm2 = this.formBuilder.group(step2);
        this.signupErrors = {};
    };
    Step2Component.prototype.validate = function (name) {
        this.signupErrors[name] = '';
        var control = this.signupForm2.get(name);
        if ((!control.pristine || control.touched) && !control.valid) {
            if (control.errors.required) {
                this.signupErrors[name] = "This field is required.";
            }
            else if (control.errors.email) {
                this.signupErrors[name] = "This Email is not valid.";
            }
            else if (control.errors.ConfirmPassword) {
                this.signupErrors[name] = "Password must be repeated exactly.";
            }
            return 'has-danger';
        }
    };
    Step2Component.prototype.continueStep2 = function () {
        var _this = this;
        this.errors = [];
        this.toggleSignup(false);
        var user = {};
        user.user_id = localStorage.getItem('signupId');
        user.name = this.name.value;
        user.age = this.age.value;
        user.gender = this.gender.value;
        this.userService.signupStep2(user)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                var response = data.data;
                //console.log(response);
                _this.toggleSignup(true);
                // continue to step 3
                $('#signUpStep2').modal("hide");
                $('#signUpStep3').modal("show");
            }
            else {
                _this.errors = data.data.message;
                _this.toggleSignup(true);
            }
        }, function (error) {
            console.log(error);
            //this.alertService.error(error);
            _this.toggleSignup(true);
        });
    };
    Step2Component.prototype.toggleSignup = function (state) {
        if (state) {
            this.signupBtnText = "Sign Up";
            this.loading = false;
        }
        else {
            this.signupBtnText = "Saving ...";
            this.loading = true;
        }
    };
    Step2Component = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup-step2',
            template: __webpack_require__("../../../../../src/app/signup/step2/step2.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/step2/step2.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["f" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_2__services_index__["a" /* AlertService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["a" /* FormBuilder */],
            __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser___["b" /* Title */]])
    ], Step2Component);
    return Step2Component;
}());



/***/ }),

/***/ "../../../../../src/app/signup/step3/step3.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- Modal -->\n<div class=\"modal fade signUpStep\" id=\"signUpStep3\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\" data-backdrop=\"static\" data-keyboard=\"false\">\n\t<div class=\"modal-dialog sign-up-step\" role=\"document\">\n\t\t<div class=\"modal-content\">\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"title-layer\">\n\t\t\t\t\t<h3 class=\"step-ttl\">Select at least 5 favorite\n\t\t\t\t\t\t<span>countries or cities</span>\n\t\t\t\t\t</h3>\n\t\t\t\t\t<div class=\"step-info\">\n\t\t\t\t\t\tStep 1\n\t\t\t\t\t\t<span>of 6</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"search-block-wrap\">\n\t\t\t\t\t<div class=\"search-block\">\n\t\t\t\t\t\t<a class=\"search-btn\" href=\"#\">\n\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<input type=\"text\" name=\"searchQuery\" [(ngModel)]=\"searchQuery\" placeholder=\"Country ...\" (input)=\"search()\"/>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class=\"check-block-wrap\" id=\"select_countries\">\n\t\t\t\t\t<div *ngFor=\"let country of countries\">\n\t\t\t\t\t\t<div class=\"check-block\" [style.background-image]=\"'url('+ getCoverImage(country.cover_image) +')'\" [class.checked-block]=\"selected.indexOf(country.id)>=0\" (click)=\"select(country.id)\">\n\t\t\t\t\t\t\t<div class=\"check-ttl\">\n\t\t\t\t\t\t\t\t<h4>{{ country.name }} </h4>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" [disabled]=\"5 - this.selected.length > 0 || loading\" (click)=\"continueStep3()\">{{ continueBtnText }}</button>\n\t\t\t\t<p class=\"sub-info\">(Next Step: Favorite Places)</p>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/signup/step3/step3.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/step3/step3.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Step3Component; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var Step3Component = (function () {
    function Step3Component(countriesService, userService) {
        this.countriesService = countriesService;
        this.userService = userService;
        this.defaultCoverImage = "http://placehold.it/181x181";
        this.continueBtnText = "Select 5 More";
        this.loading = false;
        this.countries = [];
        this.selected = [];
        this.searchQuery = "";
        this.limit = 20;
        this.offset = 0;
        this.language_id = 1;
    }
    Step3Component.prototype.ngOnInit = function () {
        this.selected = [];
        this.countries = [];
        this.loadMore();
        // initialize mCustomScrollbar plugin
        var t = this;
        $("#select_countries").mCustomScrollbar({
            callbacks: {
                onTotalScroll: function () { t.loadMore(); }
            }
        });
    };
    Step3Component.prototype.select = function (id) {
        if (this.selected.indexOf(id) >= 0) {
            var index = this.selected.indexOf(id);
            if (index !== -1) {
                this.selected.splice(index, 1);
            }
        }
        else {
            this.selected.push(id);
        }
        if (this.selected.length < 5) {
            this.continueBtnText = "Select " + (5 - this.selected.length) + " More";
        }
        else {
            this.continueBtnText = "Continue";
        }
        // console.log(this.selected);
    };
    Step3Component.prototype.getCoverImage = function (cover_image) {
        if (cover_image == "") {
            return this.defaultCoverImage;
        }
        return cover_image;
    };
    Step3Component.prototype.search = function () {
        if (this.searchQuery.length % 3 == 0) {
            this.offset = 0;
            this.loadMore();
        }
    };
    Step3Component.prototype.loadMore = function () {
        var _this = this;
        var data1 = {
            query: this.searchQuery,
            limit: this.limit,
            offset: this.offset,
            language_id: this.language_id
        };
        this.countriesService.loadMore(data1)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                if (data.data != "") {
                    _this.countries = JSON.parse(data.data);
                }
                else {
                    _this.countries = [];
                }
                _this.offset = _this.offset = _this.countries.length;
                // console.log(this.countries);
            }
            else {
                // api error
            }
        }, function (error) {
            console.log(error);
        });
    };
    Step3Component.prototype.continueStep3 = function () {
        var _this = this;
        this.toggleSignup(false);
        var arr = $.map(this.selected, function (n, i) {
            return { id: n };
        });
        var user = {};
        user.user_id = localStorage.getItem('signupId');
        user.countries = arr;
        this.userService.signupStep3(user)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                var response = data.data;
                //console.log(response);
                _this.toggleSignup(true);
                // continue to step 4
                $('#signUpStep3').modal("hide");
                $('#signUpStep4').modal("show");
            }
            else {
                _this.toggleSignup(true);
            }
        }, function (error) {
            console.log(error);
            //this.alertService.error(error);
            _this.toggleSignup(true);
        });
    };
    Step3Component.prototype.toggleSignup = function (state) {
        if (state) {
            this.continueBtnText = "Continue";
            this.loading = false;
        }
        else {
            this.continueBtnText = "Saving ...";
            this.loading = true;
        }
    };
    Step3Component = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup-step3',
            template: __webpack_require__("../../../../../src/app/signup/step3/step3.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/step3/step3.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["c" /* CountriesService */],
            __WEBPACK_IMPORTED_MODULE_1__services_index__["f" /* UserService */]])
    ], Step3Component);
    return Step3Component;
}());



/***/ }),

/***/ "../../../../../src/app/signup/step4/step4.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- Modal -->\n<div class=\"modal fade signUpStep\" id=\"signUpStep4\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\"\n data-backdrop=\"static\" data-keyboard=\"false\">\n\t<div class=\"modal-dialog sign-up-step\" role=\"document\">\n\t\t<div class=\"modal-content\">\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"title-layer\">\n\t\t\t\t\t<h3 class=\"step-ttl\">Select 3\n\t\t\t\t\t\t<span>favorite places</span> around the world</h3>\n\t\t\t\t\t<div class=\"step-info\">\n\t\t\t\t\t\tStep 2\n\t\t\t\t\t\t<span>of 6</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t\n\t\t\t\t<div class=\"search-block-wrap\">\n\t\t\t\t\t<div class=\"search-block\">\n\t\t\t\t\t\t<a class=\"search-btn\" href=\"#\">\n\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<input type=\"text\" name=\"searchQuery\" [(ngModel)]=\"searchQuery\" placeholder=\"Place name...\" (input)=\"search()\" />\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"check-block-wrap\"  id=\"select_places\">\n\t\t\t\t\t<div *ngFor=\"let place of places\">\n\t\t\t\t\t\t<div class=\"check-block\" [style.background-image]=\"'url('+ getCoverImage(place.cover_image) +')'\" [class.checked-block]=\"selected.indexOf(place.id)>=0\"\n\t\t\t\t\t\t (click)=\"select(place.id)\">\n\t\t\t\t\t\t\t<div class=\"check-ttl\">\n\t\t\t\t\t\t\t\t<h4>{{ place.name }} </h4>\n\t\t\t\t\t\t\t\t<p>{{ place.city_country_name }}</p>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" [disabled]=\"5 - this.selected.length > 0 || loading\" (click)=\"continueStep4()\">{{ continueBtnText }}</button>\n\t\t\t\t<p class=\"sub-info\">(Next Step: Favorite Travel Styles)</p>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/signup/step4/step4.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/step4/step4.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Step4Component; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var Step4Component = (function () {
    function Step4Component(placesService, userService) {
        this.placesService = placesService;
        this.userService = userService;
        this.defaultCoverImage = "http://placehold.it/181x181";
        this.continueBtnText = "Select 5 More";
        this.loading = false;
        this.places = [];
        this.selected = [1, 6, 9];
        this.searchQuery = "";
        this.limit = 20;
        this.offset = 0;
        this.language_id = 1;
    }
    Step4Component.prototype.ngOnInit = function () {
        this.selected = [];
        this.places = [];
        this.loadMore();
        // initialize mCustomScrollbar plugin
        var t = this;
        $("#select_places").mCustomScrollbar({
            callbacks: {
                onTotalScroll: function () { t.loadMore(); }
            }
        });
    };
    Step4Component.prototype.select = function (id) {
        if (this.selected.indexOf(id) >= 0) {
            var index = this.selected.indexOf(id);
            if (index !== -1) {
                this.selected.splice(index, 1);
            }
        }
        else {
            this.selected.push(id);
        }
        if (this.selected.length < 5) {
            this.continueBtnText = "Select " + (5 - this.selected.length) + " More";
        }
        else {
            this.continueBtnText = "Continue";
        }
        //console.log(this.selected);
    };
    Step4Component.prototype.getCoverImage = function (cover_image) {
        if (cover_image == "") {
            return this.defaultCoverImage;
        }
        return cover_image;
    };
    Step4Component.prototype.search = function () {
        if (this.searchQuery.length % 3 == 0) {
            this.offset = 0;
            this.loadMore();
        }
    };
    Step4Component.prototype.loadMore = function () {
        var _this = this;
        var data1 = {
            query: this.searchQuery,
            limit: this.limit,
            offset: this.offset,
            language_id: this.language_id,
        };
        this.placesService.loadMore(data1)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                _this.places = data.data;
                _this.offset = _this.offset = _this.places.length;
                // console.log(this.places);
            }
            else {
                // api error
            }
        }, function (error) {
            console.log(error);
        });
    };
    Step4Component.prototype.continueStep4 = function () {
        var _this = this;
        this.toggleSignup(false);
        var arr = $.map(this.selected, function (n, i) {
            return { id: n };
        });
        var user = {};
        user.user_id = localStorage.getItem('signupId');
        user.places = arr;
        this.userService.signupStep4(user)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                var response = data.data;
                //console.log(response);
                _this.toggleSignup(true);
                // continue to step 5
                $('#signUpStep4').modal("hide");
                $('#signUpStep5').modal("show");
            }
            else {
                _this.toggleSignup(true);
            }
        }, function (error) {
            console.log(error);
            //this.alertService.error(error);
            _this.toggleSignup(true);
        });
    };
    Step4Component.prototype.toggleSignup = function (state) {
        if (state) {
            this.continueBtnText = "Continue";
            this.loading = false;
        }
        else {
            this.continueBtnText = "Saving ...";
            this.loading = true;
        }
    };
    Step4Component = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup-step4',
            template: __webpack_require__("../../../../../src/app/signup/step4/step4.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/step4/step4.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["d" /* PlacesService */],
            __WEBPACK_IMPORTED_MODULE_1__services_index__["f" /* UserService */]])
    ], Step4Component);
    return Step4Component;
}());



/***/ }),

/***/ "../../../../../src/app/signup/step5/step5.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- Modal -->\n<div class=\"modal fade signUpStep\" id=\"signUpStep5\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\"\n data-backdrop=\"static\" data-keyboard=\"false\">\n\t<div class=\"modal-dialog sign-up-step\" role=\"document\">\n\t\t<div class=\"modal-content\">\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"title-layer\">\n\t\t\t\t\t<h3 class=\"step-ttl\">Select your preferred\n\t\t\t\t\t\t<span>travel styles</span>\n\t\t\t\t\t</h3>\n\t\t\t\t\t<div class=\"step-info\">\n\t\t\t\t\t\tStep 3\n\t\t\t\t\t\t<span>of 6</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"search-block-wrap\">\n\t\t\t\t\t<div class=\"search-block\">\n\t\t\t\t\t\t<a class=\"search-btn\" href=\"#\">\n\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<input type=\"text\" name=\"searchQuery\" [(ngModel)]=\"searchQuery\" placeholder=\"Travel style...\" (input)=\"search()\" />\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"check-block-wrap\" id=\"select_styles\">\n\t\t\t\t\t<div *ngFor=\"let style of styles\">\n\t\t\t\t\t\t<div class=\"check-block\" [style.background-image]=\"'url('+ getCoverImage(style.cover_image) +')'\" [class.checked-block]=\"selected.indexOf(style.id)>=0\"\n\t\t\t\t\t\t (click)=\"select(style.id)\">\n\t\t\t\t\t\t\t<div class=\"check-ttl\">\n\t\t\t\t\t\t\t\t<h4>{{ style.name }} </h4>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" [disabled]=\"5 - this.selected.length || loading\" (click)=\"continueStep5()\">{{ continueBtnText }}</button>\n\t\t\t\t<p class=\"sub-info\">(Next Step: Favorite Activities)</p>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/signup/step5/step5.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/signup/step5/step5.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Step5Component; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var Step5Component = (function () {
    function Step5Component(stylesService, userService) {
        this.stylesService = stylesService;
        this.userService = userService;
        this.defaultCoverImage = "http://placehold.it/181x181";
        this.continueBtnText = "Select 5 More";
        this.loading = false;
        this.styles = [];
        this.selected = [1, 6, 9];
        this.searchQuery = "";
        this.limit = 20;
        this.offset = 0;
        this.language_id = 1;
    }
    Step5Component.prototype.ngOnInit = function () {
        this.selected = [];
        this.styles = [
            { id: "1", name: "Adventurous", cover_image: "http://placehold.it/181x181" },
            { id: "2", name: "Holiday-themed", cover_image: "http://placehold.it/181x181" },
            { id: "3", name: "Spiritual", cover_image: "http://placehold.it/181x181" },
            { id: "4", name: "Solo Travel", cover_image: "http://placehold.it/181x181" },
            { id: "5", name: "Event-based", cover_image: "http://placehold.it/181x181" },
            { id: "6", name: "Group Travel", cover_image: "http://placehold.it/181x181" },
            { id: "7", name: "Nightlife", cover_image: "http://placehold.it/181x181" },
            { id: "8", name: "Long Tours", cover_image: "http://placehold.it/181x181" },
            { id: "9", name: "Group Travel", cover_image: "http://placehold.it/181x181" },
            { id: "10", name: "Nightlife", cover_image: "http://placehold.it/181x181" },
            { id: "11", name: "Long Tours", cover_image: "http://placehold.it/181x181" }
        ];
        this.loadMore();
        // initialize mCustomScrollbar plugin
        var t = this;
        $("#select_styles").mCustomScrollbar({
            callbacks: {
                onTotalScroll: function () { }
            }
        });
    };
    Step5Component.prototype.select = function (id) {
        if (this.selected.indexOf(id) >= 0) {
            var index = this.selected.indexOf(id);
            if (index !== -1) {
                this.selected.splice(index, 1);
            }
        }
        else {
            this.selected.push(id);
        }
        if (this.selected.length < 5) {
            this.continueBtnText = "Select " + (5 - this.selected.length) + " More";
        }
        else {
            this.continueBtnText = "Continue";
        }
        //console.log(this.selected);
    };
    Step5Component.prototype.getCoverImage = function (cover_image) {
        if (cover_image == undefined || cover_image == "") {
            return this.defaultCoverImage;
        }
        return cover_image;
    };
    Step5Component.prototype.search = function () {
        if (this.searchQuery.length % 3 == 0) {
            this.offset = 0;
            this.loadMore();
        }
    };
    Step5Component.prototype.loadMore = function () {
        var _this = this;
        var data1 = {
            query: this.searchQuery,
            limit: this.limit,
            offset: this.offset,
            language_id: this.language_id,
            country_id: 1,
        };
        this.stylesService.loadMore(data1)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                _this.styles = data.data;
                _this.offset = _this.offset = _this.styles.length;
                // console.log(this.styles);
            }
            else {
                // api error
            }
        }, function (error) {
            console.log(error);
        });
    };
    Step5Component.prototype.continueStep5 = function () {
        var _this = this;
        this.toggleSignup(false);
        var arr = $.map(this.selected, function (n, i) {
            return { id: n };
        });
        var user = {};
        user.user_id = localStorage.getItem('signupId');
        user.travel_styles = arr;
        this.userService.signupStep5(user)
            .subscribe(function (data) {
            //console.log(data);
            if (data.success) {
                var response = data.data;
                //console.log(response);
                _this.toggleSignup(true);
                // continue to step 5
                $('#signUpStep5').modal("hide");
                $('#signUpStep6').modal("show");
            }
            else {
                _this.toggleSignup(true);
            }
        }, function (error) {
            console.log(error);
            //this.alertService.error(error);
            _this.toggleSignup(true);
        });
    };
    Step5Component.prototype.toggleSignup = function (state) {
        if (state) {
            this.continueBtnText = "Continue";
            this.loading = false;
        }
        else {
            this.continueBtnText = "Saving ...";
            this.loading = true;
        }
    };
    Step5Component = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup-step5',
            template: __webpack_require__("../../../../../src/app/signup/step5/step5.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/step5/step5.component.scss")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["e" /* TravelStylesService */],
            __WEBPACK_IMPORTED_MODULE_1__services_index__["f" /* UserService */]])
    ], Step5Component);
    return Step5Component;
}());



/***/ }),

/***/ "../../../../../src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
var environment = {
    production: false
};


/***/ }),

/***/ "../../../../../src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("../../../platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("../../../../../src/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("../../../../../src/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_13" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("../../../../../src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map