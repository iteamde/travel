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
        this.router.navigate(['/login'], { queryParams: { returnUrl: state.url } });
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
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["d" /* HttpResponse */]({ status: 200, body: body }));
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
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["d" /* HttpResponse */]({ status: 200, body: users }));
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
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["d" /* HttpResponse */]({ status: 200, body: user }));
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
                return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["d" /* HttpResponse */]({ status: 200 }));
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
                    return __WEBPACK_IMPORTED_MODULE_2_rxjs_Observable__["a" /* Observable */].of(new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["d" /* HttpResponse */]({ status: 200 }));
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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
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
        return _this;
    }
    AuthenticationService.prototype.login = function (username, password) {
        return this.http.post(this.apiPrefix + '/users/login', { email: username, password: password })
            .map(function (user) {
            // login successful if there's a jwt token in the response
            if (user && user.token) {
                console.log("UserToken:" + user.token);
                // store user details and jwt token in local storage to keep user logged in between page refreshes
                localStorage.setItem('currentUser', JSON.stringify(user));
            }
            return user;
        });
    };
    AuthenticationService.prototype.logout = function () {
        // remove user from local storage to log user out
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
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["b" /* HttpClient */]])
    ], AuthenticationService);
    return AuthenticationService;
}(__WEBPACK_IMPORTED_MODULE_3__manager_service__["a" /* ManagerService */]));



/***/ }),

/***/ "../../../../../src/_services/index.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__alert_service__ = __webpack_require__("../../../../../src/_services/alert.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_0__alert_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__authentication_service__ = __webpack_require__("../../../../../src/_services/authentication.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_1__authentication_service__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_service__ = __webpack_require__("../../../../../src/_services/user.service.ts");
/* harmony namespace reexport (by used) */ __webpack_require__.d(__webpack_exports__, "c", function() { return __WEBPACK_IMPORTED_MODULE_2__user_service__["a"]; });





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
        this.apiPrefix = "/public/api";
    }
    ManagerService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [])
    ], ManagerService);
    return ManagerService;
}());



/***/ }),

/***/ "../../../../../src/_services/user.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var UserService = (function () {
    function UserService(http) {
        this.http = http;
    }
    UserService.prototype.getAll = function () {
        return this.http.get('/api/users');
    };
    UserService.prototype.getById = function (id) {
        return this.http.get('/api/users/' + id);
    };
    UserService.prototype.create = function (user) {
        return this.http.post('/api/users', user);
    };
    UserService.prototype.update = function (user) {
        return this.http.put('/api/users/' + user.id, user);
    };
    UserService.prototype.delete = function (id) {
        return this.http.delete('/api/users/' + id);
    };
    UserService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["b" /* HttpClient */]])
    ], UserService);
    return UserService;
}());



/***/ }),

/***/ "../../../../../src/app/app-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__main_main_component__ = __webpack_require__("../../../../../src/app/main/main.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var routes = [
    {
        path: '',
        component: __WEBPACK_IMPORTED_MODULE_3__main_main_component__["a" /* MainComponent */]
    },
    {
        path: 'home',
        component: __WEBPACK_IMPORTED_MODULE_2__home_home_component__["a" /* HomeComponent */]
    }
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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__app_routing_module__ = __webpack_require__("../../../../../src/app/app-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__directives_index__ = __webpack_require__("../../../../../src/_directives/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__guards_index__ = __webpack_require__("../../../../../src/_guards/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__helpers_index__ = __webpack_require__("../../../../../src/_helpers/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__services_index__ = __webpack_require__("../../../../../src/_services/index.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__app_component__ = __webpack_require__("../../../../../src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__login_login_component__ = __webpack_require__("../../../../../src/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__main_main_component__ = __webpack_require__("../../../../../src/app/main/main.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__signup_signup_component__ = __webpack_require__("../../../../../src/app/signup/signup.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__header_header_component__ = __webpack_require__("../../../../../src/app/header/header.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__left_side_bar_left_side_bar_component__ = __webpack_require__("../../../../../src/app/left-side-bar/left-side-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__side_footer_side_footer_component__ = __webpack_require__("../../../../../src/app/side-footer/side-footer.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__right_side_bar_right_side_bar_component__ = __webpack_require__("../../../../../src/app/right-side-bar/right-side-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__posts_posts_component__ = __webpack_require__("../../../../../src/app/posts/posts.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__create_post_create_post_component__ = __webpack_require__("../../../../../src/app/create-post/create-post.component.ts");
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
                __WEBPACK_IMPORTED_MODULE_4__app_routing_module__["a" /* AppRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["c" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["d" /* ReactiveFormsModule */]
            ],
            declarations: [
                __WEBPACK_IMPORTED_MODULE_9__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_10__login_login_component__["a" /* LoginComponent */],
                __WEBPACK_IMPORTED_MODULE_11__main_main_component__["a" /* MainComponent */],
                __WEBPACK_IMPORTED_MODULE_12__signup_signup_component__["a" /* SignupComponent */],
                __WEBPACK_IMPORTED_MODULE_5__directives_index__["a" /* AlertComponent */],
                __WEBPACK_IMPORTED_MODULE_13__home_home_component__["a" /* HomeComponent */],
                __WEBPACK_IMPORTED_MODULE_14__header_header_component__["a" /* HeaderComponent */],
                __WEBPACK_IMPORTED_MODULE_15__left_side_bar_left_side_bar_component__["a" /* LeftSideBarComponent */],
                __WEBPACK_IMPORTED_MODULE_16__side_footer_side_footer_component__["a" /* SideFooterComponent */],
                __WEBPACK_IMPORTED_MODULE_17__right_side_bar_right_side_bar_component__["a" /* RightSideBarComponent */],
                __WEBPACK_IMPORTED_MODULE_18__posts_posts_component__["a" /* PostsComponent */],
                __WEBPACK_IMPORTED_MODULE_19__create_post_create_post_component__["a" /* CreatePostComponent */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_6__guards_index__["a" /* AuthGuard */],
                __WEBPACK_IMPORTED_MODULE_8__services_index__["a" /* AlertService */],
                __WEBPACK_IMPORTED_MODULE_8__services_index__["b" /* AuthenticationService */],
                __WEBPACK_IMPORTED_MODULE_8__services_index__["c" /* UserService */],
                {
                    provide: __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["a" /* HTTP_INTERCEPTORS */],
                    useClass: __WEBPACK_IMPORTED_MODULE_7__helpers_index__["a" /* JwtInterceptor */],
                    multi: true
                },
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_9__app_component__["a" /* AppComponent */]]
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
    function HomeComponent(authenticationService, router) {
        this.authenticationService = authenticationService;
        this.router = router;
    }
    HomeComponent.prototype.ngOnInit = function () {
        if (!this.authenticationService.isLoggedIn()) {
            //this.router.navigate(['/']);
        }
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-home',
            template: __webpack_require__("../../../../../src/app/home/home.component.html"),
            styles: [__webpack_require__("../../../../../src/app/home/home.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_index__["b" /* AuthenticationService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["c" /* Router */]])
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

module.exports = "<!-- Modal -->\n\n<div class=\"modal fade\" id=\"signUp\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n  \t<div class=\"modal-dialog sign-up-style\" role=\"document\">\n    \t<div class=\"modal-content\">\n\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n\t\t\t\t<span aria-hidden=\"true\">&times;</span>\n\t\t\t</button>\n\t\t\t<div class=\"modal-body\">\n\t\t\t\t<div class=\"top-layer\">\n\t\t\t\t\t<a href=\"#\" class=\"logo-wrap\">\n\t\t\t\t\t\t<img src=\"./assets/image/main-logo.png\" alt=\"\">\n\t\t\t\t\t</a>\n\t\t\t\t\t<h4 class=\"title\">Login to your account</h4>\n\t\t\t\t\t<!-- <p class=\"sub-ttl\">and write a text here</p> -->\n\t\t\t\t\t<p class=\"sub-ttl error-message\" *ngFor=\"let msg of errors\">{{ msg }}</p>\n\t\t\t\t</div>\n\n\t\t\t\t<form class=\"login-form\" name=\"loginForm\" [formGroup]=\"loginForm\" (ngSubmit)=\"login()\" novalidate>\n\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"setClassEmail()\">\n\t\t\t\t\t\t<!-- <label for=\"username\">Username</label> -->\n\t\t\t\t\t\t<input class=\"form-control\" type=\"email\" name=\"email\" formControlName=\"email\" placeholder=\"Email address\" autofocus aria-describedby=\"emailHelp\" />\n\t\t\t\t\t\t<!-- <input type=\"email\" class=\"form-control\" name=\"username\" [(ngModel)]=\"model.username\" #username=\"ngModel\" required aria-describedby=\"emailHelp\" placeholder=\"Email address\"/> -->\n\t\t\t\t\t\t<!-- <div *ngIf=\"f.submitted && !username.valid\" class=\"help-block\">Email is required</div> -->\n\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"email.errors && (email.dirty || email.touched)\">\n\t\t\t\t\t\t\t<p>{{ emailMsg }}</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\" [ngClass]=\"setClassPassword()\">\n\t\t\t\t\t\t<!-- <label for=\"password\">Password</label> -->\n\t\t\t\t\t\t<input class=\"form-control\" type=\"password\" name=\"password\" formControlName=\"password\" placeholder=\"Password\" aria-describedby=\"pass\" />\n\t\t\t\t\t\t<!-- <input type=\"password\" class=\"form-control\" name=\"password\" [(ngModel)]=\"model.password\" #password=\"ngModel\" required aria-describedby=\"pass\" placeholder=\"Password\"/> -->\n\t\t\t\t\t\t<!-- <div *ngIf=\"f.submitted && !password.valid\" class=\"help-block\">Password is required</div> -->\n\t\t\t\t\t\t<div class=\"form-control-feedback\" *ngIf=\"password.errors && (password.dirty || password.touched)\">\n\t\t\t\t\t\t\t<p>{{ passwordMsg }}</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<a href=\"#\" class=\"forget-password-link\">Forget your password?</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button class=\"btn btn-primary\" type=\"submit\" [disabled]=\"!loginForm.valid || loading\">{{ loginBtnText }}</button>\n\t\t\t\t\t\t<!-- <button [disabled]=\"loading\" class=\"btn btn-primary\">{{ loginBtnText }}</button> -->\n\t\t\t\t\t\t<!-- <img *ngIf=\"loading\" src=\"data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==\" /> -->\n\t\t\t\t\t\t<!-- <a [routerLink]=\"['/register']\" class=\"btn btn-link\">Register</a> -->\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<p class=\"simple-txt\">Or</p>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\">\n\t\t\t\t\t\t\t<i class=\"fa fa-facebook side-icon\"></i>\n\t\t\t\t\t\t\tContinue with Facebook\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class=\"form-group\">\n\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-info\">\n\t\t\t\t\t\t\t<i class=\"fa fa-twitter side-icon\"></i>\n\t\t\t\t\t\t\tContinue with Twitter\n\t\t\t\t\t\t</button>\n\t\t\t\t\t</div>\n\t\t\t\t</form>\n\t\t\t</div>\n\t\t\t<div class=\"modal-footer\">\n\t\t\t\t<p class=\"foot-txt\">You are not a member yet?</p>\n\t\t\t\t<button type=\"button\" class=\"btn btn-grey\" (click)=\"openSignup()\">Sign Up</button>\n\t\t\t</div>\n    \t</div>\n  \t</div>\n</div>"

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
    function LoginComponent(route, router, authenticationService, alertService, formBuilder) {
        this.route = route;
        this.router = router;
        this.authenticationService = authenticationService;
        this.alertService = alertService;
        this.formBuilder = formBuilder;
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
        // reset login status
        // this.authenticationService.logout();
        if (this.authenticationService.isLoggedIn()) {
            // this.router.navigate(['/home']);
        }
        // get return url from route parameters or default to '/home'
        this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/home';
        this.loginForm = this.formBuilder.group({
            email: this.email,
            password: this.password
        });
    };
    LoginComponent.prototype.openSignup = function () {
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
            .subscribe(function (data) {
            console.log("Data:" + data);
            var response = data.data;
            console.log("Response:" + response);
            if (data.status) {
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
                _this.errors.push(response.message);
                _this.toggleLogin(true);
            }
        }, function (error) {
            console.log(error);
            //this.alertService.error(error);
            _this.toggleLogin(true);
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
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["a" /* FormBuilder */]])
    ], LoginComponent);
    return LoginComponent;
}());



/***/ }),

/***/ "../../../../../src/app/main/main.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"main-wrapper login-layer\">\n  <!-- Button trigger modal -->\n  <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#signUp\">\n    Launch signup\n  </button>\n  <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#createAccount1\">\n    Launch createAccount step1\n  </button>\n  <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#createAccount2\">\n    Launch createAccount step2\n  </button>\n</div>\n<!-- <footer class=\"footer\"></footer> -->\n\n<app-login></app-login>\n\n<app-signup></app-signup>"

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
    function MainComponent() {
    }
    MainComponent.prototype.ngOnInit = function () {
    };
    MainComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-main',
            template: __webpack_require__("../../../../../src/app/main/main.component.html"),
            styles: [__webpack_require__("../../../../../src/app/main/main.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], MainComponent);
    return MainComponent;
}());



/***/ }),

/***/ "../../../../../src/app/posts/posts.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Burno</a>\n        </div>\n        <div class=\"post-info\">\n          Uploaded\n          <b>2 photos</b> yesterday at 10:33pm\n          <i class=\"trav-set-location-icon\"></i>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <!-- <i class=\"trav-angle-down\"></i> -->\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/295x335\" alt=\"\">\n      </li>\n      <li>\n        <img src=\"http://placehold.it/295x335\" alt=\"\">\n      </li>\n    </ul>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">\n      <i class=\"trav-trending-destination-icon\"></i> Trending destinations\n      <span class=\"count\">20</span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"trendingDescription\" class=\"post-slider\">\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Central park</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Park</span> in New York City\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Niagara falls</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Waterfalls</span> in New York\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Grand canyon national park</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Park</span> in Arizona\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Richard hylton</a>\n        </div>\n        <div class=\"post-info\">\n          Uploaded a\n          <b>photo</b> yesterday at 10:33am\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x624\" alt=\"\">\n      </li>\n    </ul>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>12</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>189 Comments</span>\n    </div>\n  </div>\n  <div class=\"post-comment-layer\">\n    <div class=\"post-comment-top-info\">\n      <ul class=\"comment-filter\">\n        <li class=\"active\">Top</li>\n        <li>New</li>\n      </ul>\n      <div class=\"comm-count-info\">\n        3 / 20\n      </div>\n    </div>\n    <div class=\"post-comment-wrapper\">\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Katherin</a>\n            <a href=\"#\" class=\"comment-nickname\">@katherin</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n              culpa qui odit delectus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n              <span>21</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Amine</a>\n            <a href=\"#\" class=\"comment-nickname\">@ak0117</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-like.png\" alt=\"\">\n              <span>19</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Katherin</a>\n            <a href=\"#\" class=\"comment-nickname\">@katherin</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n              culpa qui odit delectus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n              <span>15</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <a href=\"#\" class=\"load-more-link\">Load more...</a>\n    </div>\n    <div class=\"post-add-comment-block\">\n      <div class=\"avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-add-com-input\">\n        <input type=\"text\" placeholder=\"Write a comment\">\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-round-icon-wrap\">\n        <i class=\"trav-event-icon\"></i>\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Quick Chek New Jersey Festival of Ballooning</a>\n        </div>\n        <div class=\"post-event-info\">\n          <span class=\"event-tag\">Event</span>\n          in\n          <a class=\"event-place\" href=\"#\">New York City</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x250\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"date-block\">\n          <span class=\"month\">jul</span>\n          <span class=\"count-day\">15</span>\n        </div>\n        <div class=\"follow-txt\">\n          <p class=\"follow-posted\">Posted by\n            <a href=\"#\">Donec Ultrices Nunc</a>\n          </p>\n          <p class=\"follow-description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, veritatis.</p>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n        </div>\n        <div class=\"post-info\">\n          Checked in at\n          <i class=\"trav-set-location-icon\"></i>\n          <a class=\"link-place\" href=\"#\">Central Park</a> yesterday - 10:33am\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container\">\n    <div class=\"post-txt-wrap\">\n      <p class=\"post-txt\">Sed ultricies quam id mattis venenatis\n        <img src=\"./assets/image/icon-smile-heart.png\" alt=\"\"> vivamus sapien purus, tincidunt quis aliquet vitae, eleifend nec sem.</p>\n    </div>\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/192x210\" alt=\"\">\n      </li>\n      <li>\n        <img src=\"http://placehold.it/192x210\" alt=\"\">\n      </li>\n      <li class=\"more-photos-wrap\">\n        <img src=\"http://placehold.it/192x210\" alt=\"\">\n        <a href=\"#\" class=\"more-photos-link\">\n          <span>5 More Photos</span>\n        </a>\n      </li>\n    </ul>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction p-disabled\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>React</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>1 Comment</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Places you might like\n      <span class=\"count\">20</span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap\">\n      <ul id=\"placeYouMightLike\" class=\"post-slider post-slider-active\">\n        <li>\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/222x151\" alt=\"\">\n          </div>\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Statue of Liberty</p>\n            <div class=\"post-slide-description\">\n              United States of America\n            </div>\n          </div>\n        </li>\n        <li>\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/222x151\" alt=\"\">\n          </div>\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Reichstag</p>\n            <div class=\"post-slide-description\">\n              Germany\n            </div>\n          </div>\n        </li>\n        <li>\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/222x151\" alt=\"\">\n          </div>\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Kruger National Park</p>\n            <div class=\"post-slide-description\">\n              South Africa\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n    <div class=\"post-map-wrap\">\n      <img src=\"http://placehold.it/597x400\" alt=\"map\">\n\n      <!-- <iframe width=\"600\" height=\"400\" src=\"https://www.mapsdirections.info/en/custom-google-maps/map.php?width=600&height=400&hl=ru&q=New%20York%20City+(Your%20Business%20Name)&ie=UTF8&t=p&z=4&iwloc=B&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"><a href=\"https://www.mapsdirections.info/en/custom-google-maps/\">Embed Google Map</a> by <a href=\"https://www.mapsdirections.info/en/\">Measure area on map</a></iframe> -->\n\n      <div class=\"post-map-info-caption map-black\">\n        <div class=\"map-avatar\">\n          <img src=\"http://placehold.it/25x25\" alt=\"ava\">\n        </div>\n        <div class=\"map-label-txt\">When is the best time to visit?</div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Places you might like\n      <span class=\"count\">20</span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"placeYouMightLikePostCard\" class=\"post-slider\">\n        <li class=\"post-card\">\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/274x234\" alt=\"\">\n            <a href=\"#\" class=\"place-location\">\n              <i class=\"trav-set-location-icon\"></i>\n            </a>\n          </div>\n          <div class=\"post-slider-caption\">\n            <p class=\"post-card-name\" href=\"#\">Walt Disney World</p>\n            <p class=\"post-card-placement\">\n              <b>Park</b> in Florida\n            </p>\n            <div class=\"post-footer-info\">\n              <div class=\"post-comment-info\">\n                <ul class=\"foot-avatar-list\">\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                </ul>\n                <span>20 Talking about this</span>\n              </div>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-card\">\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/274x234\" alt=\"\">\n            <a href=\"#\" class=\"place-location\">\n              <i class=\"trav-set-location-icon\"></i>\n            </a>\n          </div>\n          <div class=\"post-slider-caption\">\n            <p class=\"post-card-name\" href=\"#\">Niagara Falls</p>\n            <p class=\"post-card-placement\">\n              <b>Waterfalls</b> in North America\n            </p>\n            <div class=\"post-footer-info\">\n              <div class=\"post-comment-info\">\n                <ul class=\"foot-avatar-list\">\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                </ul>\n                <span>18 Talking about this</span>\n              </div>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-card\">\n          <div class=\"image-wrap\">\n            <img src=\"http://placehold.it/274x234\" alt=\"\">\n            <a href=\"#\" class=\"place-location\">\n              <i class=\"trav-set-location-icon\"></i>\n            </a>\n          </div>\n          <div class=\"post-slider-caption\">\n            <p class=\"post-card-name\" href=\"#\">Grand Canyon National Park</p>\n            <p class=\"post-card-placement\">\n              <b>Park</b> in Florida\n            </p>\n            <div class=\"post-footer-info\">\n              <div class=\"post-comment-info\">\n                <ul class=\"foot-avatar-list\">\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                  <li>\n                    <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                  </li>\n                </ul>\n                <span>20 Talking about this</span>\n              </div>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Richard hylton</a>\n        </div>\n        <div class=\"post-info\">\n          Added a\n          <b>photo</b> yesterday at 10:33am\n          <i class=\"trav-set-location-icon\"></i>\n          <b>21 Km</b> from\n          <a class=\"link-place\" href=\"#\">Arizona</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x404\" alt=\"\">\n      </li>\n    </ul>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li class=\"dropdown\">\n          <span data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </span>\n          <div class=\"dropdown-menu dropdown-info-style post-profile-block\">\n            <div class=\"post-prof-image\">\n              <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n                alt=\"photo\">\n            </div>\n            <div class=\"post-prof-main\">\n              <div class=\"avatar-wrap\">\n                <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n              </div>\n              <div class=\"post-person-info\">\n                <div class=\"prof-name\">Sue Perez</div>\n                <div class=\"prof-location\">United States of America</div>\n              </div>\n              <div class=\"drop-bottom-link\">\n                <a href=\"#\" class=\"profile-link\">View profile</a>\n              </div>\n            </div>\n          </div>\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n  <div class=\"post-comment-layer\">\n    <div class=\"post-comment-top-info\">\n      <ul class=\"comment-filter\">\n        <li class=\"active\">Top</li>\n        <li>New</li>\n      </ul>\n      <div class=\"comm-count-info\">\n        3 / 20\n      </div>\n    </div>\n    <div class=\"post-comment-wrapper\">\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Katherin</a>\n            <a href=\"#\" class=\"comment-nickname\">@katherin</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n              culpa qui odit delectus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n              <span>21</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Amine</a>\n            <a href=\"#\" class=\"comment-nickname\">@ak0117</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-like.png\" alt=\"\">\n              <span>19</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-comment-row\">\n        <div class=\"post-com-avatar-wrap\">\n          <img src=\"http://placehold.it/45x45\" alt=\"\">\n        </div>\n        <div class=\"post-comment-text\">\n          <div class=\"post-com-name-layer\">\n            <a href=\"#\" class=\"comment-name\">Katherin</a>\n            <a href=\"#\" class=\"comment-nickname\">@katherin</a>\n          </div>\n          <div class=\"comment-txt\">\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex doloribus labore tenetur vel. Neque molestiae repellat\n              culpa qui odit delectus.</p>\n          </div>\n          <div class=\"comment-bottom-info\">\n            <div class=\"com-reaction\">\n              <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n              <span>15</span>\n            </div>\n            <div class=\"com-time\">6 hours ago</div>\n          </div>\n        </div>\n      </div>\n      <a href=\"#\" class=\"load-more-link\">Load more...</a>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Bugno Senevirathne</a>\n        </div>\n        <div class=\"post-info\">\n          15 July at 10:33am\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container\">\n    <div class=\"post-txt-wrap\">\n      <p class=\"post-txt-lg\">Duis elementum aliquet sapien hendrerit faucibus. Proin et felis quis mi scelerisque dignissim. Etiam pellentesque\n        ut massa malesuada scelerisque.</p>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/30x30\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Small</a>\n          is now friend with\n          <a href=\"#\" class=\"post-name-link\">Sue Perez</a>\n        </div>\n        <div class=\"post-info-date\">\n          4 Hours ago\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-profile-wrap\">\n      <div class=\"post-profile-block\">\n        <div class=\"post-prof-image\">\n          <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n            alt=\"photo\">\n          <a href=\"#\" class=\"btn btn-light-primary btn-follow\">\n            <i class=\"trav-user-plus-icon\"></i>\n          </a>\n        </div>\n        <div class=\"post-prof-main\">\n          <div class=\"avatar-wrap\">\n            <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n          </div>\n          <div class=\"post-person-info\">\n            <div class=\"prof-name\">Stephanie small</div>\n            <div class=\"prof-location\">Morocco</div>\n          </div>\n          <ul class=\"post-person-photo-list\">\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n          </ul>\n        </div>\n        <div class=\"drop-bottom-link\">\n          <a href=\"#\" class=\"profile-link\">View profile</a>\n        </div>\n      </div>\n      <div class=\"post-profile-block\">\n        <div class=\"post-prof-image\">\n          <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n            alt=\"photo\">\n          <a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n            <i class=\"trav-user-plus-icon\"></i>\n          </a>\n        </div>\n        <div class=\"post-prof-main\">\n          <div class=\"avatar-wrap\">\n            <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n          </div>\n          <div class=\"post-person-info\">\n            <div class=\"prof-name\">Sue Perez</div>\n            <div class=\"prof-location\">United States of America</div>\n          </div>\n          <ul class=\"post-person-photo-list\">\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n          </ul>\n        </div>\n        <div class=\"drop-bottom-link\">\n          <a href=\"#\" class=\"profile-link\">View profile</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-footer-info\">\n      <div class=\"post-reaction\">\n        <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n        <span>\n          <b>3</b> Reactions</span>\n      </div>\n      <div class=\"post-comment-info\">\n        <i class=\"trav-comment-icon\"></i>\n        <ul class=\"foot-avatar-list\">\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n        </ul>\n        <span>5 Comments</span>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n        </div>\n        <div class=\"post-info\">\n          Shared a\n          <b>Trip Plan</b> yesterday at 10:33am\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x400\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"follow-txt\">\n          <p class=\"follow-destination\">4 Days to Dallas</p>\n          <div class=\"follow-tag-wrap\">\n            <span class=\"follow-tag\">solo</span>\n            <span class=\"follow-tag\">urban</span>\n          </div>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-icon-side btn-icon-right\">\n          View plan\n          <span class=\"icon-wrap\">\n            <i class=\"trav-view-plan-icon\"></i>\n          </span>\n        </button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Discover new people</h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"newPeopleDiscover\" class=\"post-slider\">\n        <li class=\"post-follow-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/42x42\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Stephanie small</p>\n              <p class=\"post-card-spec\">Photographer</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">12K Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/42x42\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Beatriz kim park</p>\n              <p class=\"post-card-spec\">Traveler</p>\n              <button type=\"button\" class=\"btn btn-light-primary btn-bordered\">Following</button>\n              <p class=\"post-card-follow-count\">248 Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/42x42\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Kathleen brown</p>\n              <p class=\"post-card-spec\">Write</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">39 Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/42x42\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Alex ah</p>\n              <p class=\"post-card-spec\">Photographer</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">8K Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/42x42\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Louie olson</p>\n              <p class=\"post-card-spec\">Photographer</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">198K Followers</p>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-round-icon-wrap\">\n        <i class=\"trav-event-icon\"></i>\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Independence day</a>\n        </div>\n        <div class=\"post-event-info\">\n          <span class=\"event-tag\">National Holiday</span>\n          in\n          <span class=\"dropdown\">\n            <a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Unites States of America</a>\n            <div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n              <div class=\"post-prof-image\">\n                <img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n                  alt=\"photo\">\n              </div>\n              <div class=\"post-prof-main\">\n                <div class=\"flag-wrap\">\n                  <img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n                </div>\n                <div class=\"post-person-info\">\n                  <div class=\"prof-name\">United States of America</div>\n                  <div class=\"prof-location\">Country in North America</div>\n                  <div class=\"prof-button-wrap\">\n                    <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                  </div>\n                  <div class=\"prof-follow-count\">28K Followers</div>\n                </div>\n                <div class=\"drop-bottom-link\">\n                  <a href=\"#\" class=\"profile-link\">View profile</a>\n                </div>\n              </div>\n            </div>\n          </span>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x250\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"date-block\">\n          <span class=\"month blue\">jul</span>\n          <span class=\"count-day\">15</span>\n        </div>\n        <div class=\"follow-txt\">\n          <p class=\"follow-posted\">Posted by\n            <a href=\"#\">Donec Ultrices Nunc</a>\n          </p>\n          <p class=\"follow-description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, veritatis.</p>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-icon-side btn-icon-right\">\n          Follow\n          <span class=\"icon-wrap\">\n            <i class=\"trav-view-plan-icon\"></i>\n          </span>\n        </button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>12</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>23 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/30x30\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Small</a>\n          is now friend with\n          <a href=\"#\" class=\"post-name-link\">Sue Perez</a>\n          and\n          <span class=\"dropdown\">\n            <a href=\"#\" class=\"post-name-link\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">5 more people</a>\n            <div class=\"dropdown-menu dropdown-arrow dropdown-info-style dropdown-people-list\">\n              <ul class=\"people-list\">\n                <li class=\"people-row\">\n                  <div class=\"avatar-wrap\">\n                    <img src=\"http://placehold.it/45x45\" alt=\"ava\">\n                  </div>\n                  <div class=\"people-txt\">\n                    <div class=\"people-name\">Gerald stuber</div>\n                    <div class=\"people-location\">United States</div>\n                  </div>\n                  <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                </li>\n                <li class=\"people-row\">\n                  <div class=\"avatar-wrap\">\n                    <img src=\"http://placehold.it/45x45\" alt=\"ava\">\n                  </div>\n                  <div class=\"people-txt\">\n                    <div class=\"people-name\">Timothy pellingson</div>\n                    <div class=\"people-location\">Germany</div>\n                  </div>\n                  <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                </li>\n                <li class=\"people-row\">\n                  <div class=\"avatar-wrap\">\n                    <img src=\"http://placehold.it/45x45\" alt=\"ava\">\n                  </div>\n                  <div class=\"people-txt\">\n                    <div class=\"people-name\">Joseth talley</div>\n                    <div class=\"people-location\">Italy</div>\n                  </div>\n                  <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                </li>\n                <li class=\"people-row\">\n                  <div class=\"avatar-wrap\">\n                    <img src=\"http://placehold.it/45x45\" alt=\"ava\">\n                  </div>\n                  <div class=\"people-txt\">\n                    <div class=\"people-name\">Sharen holt</div>\n                    <div class=\"people-location\">Japan</div>\n                  </div>\n                  <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                </li>\n                <li class=\"people-row\">\n                  <div class=\"avatar-wrap\">\n                    <img src=\"http://placehold.it/45x45\" alt=\"ava\">\n                  </div>\n                  <div class=\"people-txt\">\n                    <div class=\"people-name\">Robert casteel</div>\n                    <div class=\"people-location\">United States</div>\n                  </div>\n                  <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                </li>\n              </ul>\n            </div>\n          </span>\n        </div>\n        <div class=\"post-info-date\">\n          4 Hours ago\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-profile-wrap\">\n      <div class=\"post-profile-block\">\n        <div class=\"post-prof-image\">\n          <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n            alt=\"photo\">\n          <a href=\"#\" class=\"btn btn-light-primary btn-follow\">\n            <i class=\"trav-user-plus-icon\"></i>\n          </a>\n        </div>\n        <div class=\"post-prof-main\">\n          <div class=\"avatar-wrap\">\n            <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n          </div>\n          <div class=\"post-person-info\">\n            <div class=\"prof-name\">Stephanie small</div>\n            <div class=\"prof-location\">Morocco</div>\n          </div>\n          <ul class=\"post-person-photo-list\">\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n            <li>\n              <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n            </li>\n          </ul>\n        </div>\n        <div class=\"drop-bottom-link\">\n          <a href=\"#\" class=\"profile-link\">View profile</a>\n        </div>\n      </div>\n      <!-- post profile block with slider -->\n      <div class=\"post-profile-block-slider-wrap\">\n        <div class=\"post-profile-block-slider\" id=\"postProfileSlider\">\n          <div class=\"post-profile-slide\">\n            <div class=\"post-prof-image\">\n              <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n                alt=\"photo\">\n              <a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n                <i class=\"trav-user-plus-icon\"></i>\n              </a>\n            </div>\n            <div class=\"post-prof-main\">\n              <div class=\"avatar-wrap\">\n                <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n              </div>\n              <div class=\"post-person-info\">\n                <div class=\"prof-name\">Sue Perez</div>\n                <div class=\"prof-location\">United States of America</div>\n              </div>\n              <ul class=\"post-person-photo-list\">\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n              </ul>\n            </div>\n            <div class=\"drop-bottom-link\">\n              <a href=\"#\" class=\"profile-link\">View profile</a>\n            </div>\n          </div>\n          <div class=\"post-profile-slide\">\n            <div class=\"post-prof-image\">\n              <img class=\"prof-cover\" src=\"http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/1450820945/Godafoss-Iceland-waterfall-winter-SPIRIT1215.jpg?itok=hvUl-l-S\"\n                alt=\"photo\">\n              <a href=\"#\" class=\"btn btn-light-primary btn-follow btn-disabled\">\n                <i class=\"trav-user-plus-icon\"></i>\n              </a>\n            </div>\n            <div class=\"post-prof-main\">\n              <div class=\"avatar-wrap\">\n                <img src=\"http://placehold.it/70x70\" alt=\"ava\">\n              </div>\n              <div class=\"post-person-info\">\n                <div class=\"prof-name\">Sue Perez</div>\n                <div class=\"prof-location\">United States of America</div>\n              </div>\n              <ul class=\"post-person-photo-list\">\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n                <li>\n                  <img src=\"http://placehold.it/80x80\" alt=\"photo\">\n                </li>\n              </ul>\n            </div>\n            <div class=\"drop-bottom-link\">\n              <a href=\"#\" class=\"profile-link\">View profile</a>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-footer-info\">\n      <div class=\"post-reaction\">\n        <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n        <span>\n          <b>3</b> Reactions</span>\n      </div>\n      <div class=\"post-comment-info\">\n        <i class=\"trav-comment-icon\"></i>\n        <ul class=\"foot-avatar-list\">\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n        </ul>\n        <span>5 Comments</span>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">\n      <i class=\"trav-trending-destination-icon\"></i> Trending activities\n      <span class=\"dropdown\">\n        <a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">#Morocco</a>\n        <i class=\"trav-caret-down\"></i>\n        <div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n          <div class=\"post-prof-image\">\n            <img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n              alt=\"photo\">\n          </div>\n          <div class=\"post-prof-main\">\n            <div class=\"flag-wrap\">\n              <img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n            </div>\n            <div class=\"post-person-info\">\n              <div class=\"prof-name\">Morocco</div>\n              <div class=\"prof-location\">Country in North Africa</div>\n              <div class=\"prof-button-wrap\">\n                <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              </div>\n              <div class=\"prof-follow-count\">28K Followers</div>\n            </div>\n            <div class=\"drop-bottom-link\">\n              <a href=\"#\" class=\"profile-link\">View profile</a>\n            </div>\n          </div>\n        </div>\n      </span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"trendingActivity\" class=\"post-slider\">\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Sahara quad biking</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">event</span> in Ouarzazate\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Surf Lesson at Devils Rock</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Event</span> in Agadir\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Morocco skiing</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">event</span> in Ifran\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n        </div>\n        <div class=\"post-info\">\n          Shared a\n          <a href=\"#\" class=\"link-place\">Trip Plan</a> to\n          <a href=\"#\" class=\"link-place\">7 Destinations</a> in\n          <a href=\"#\" class=\"link-place\">Tokyo</a>\n          on 1 Sep 2017\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <div class=\"post-image-inner\">\n      <div class=\"post-map-wrap\">\n        <img src=\"http://placehold.it/595x400\" alt=\"map\">\n        <div class=\"post-map-info-caption map-blue\">\n          <div class=\"map-avatar\">\n            <img src=\"http://placehold.it/25x25\" alt=\"ava\">\n          </div>\n          <div class=\"map-label-txt\">\n            Checking on\n            <b>2 Sep</b> at\n            <b>8:30 am</b> and will stay\n            <b>30 min</b>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-destination-block slide-dest-hide-right-margin\">\n        <div class=\"post-dest-slider\" id=\"postDestSlider\">\n          <div class=\"post-dest-card\">\n            <div class=\"post-dest-card-inner\">\n              <div class=\"dest-image\">\n                <img src=\"http://placehold.it/68x68\" alt=\"\">\n              </div>\n              <div class=\"dest-info\">\n                <div class=\"dest-name\">Bulgari Tokyo</div>\n                <div class=\"dest-place\">Restaurant</div>\n              </div>\n            </div>\n          </div>\n          <div class=\"post-dest-card\">\n            <div class=\"post-dest-card-inner\">\n              <div class=\"dest-image\">\n                <img src=\"http://placehold.it/68x68\" alt=\"\">\n              </div>\n              <div class=\"dest-info\">\n                <div class=\"dest-name\">Bulgari Tokyo</div>\n                <div class=\"dest-place\">Restaurant</div>\n              </div>\n            </div>\n          </div>\n          <div class=\"post-dest-card\">\n            <div class=\"post-dest-card-inner\">\n              <div class=\"dest-image\">\n                <img src=\"http://placehold.it/68x68\" alt=\"\">\n              </div>\n              <div class=\"dest-info\">\n                <div class=\"dest-name\">Bulgari Tokyo</div>\n                <div class=\"dest-place\">Restaurant</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Senevirathne</a>\n        </div>\n        <div class=\"post-info\">\n          Started following\n          <a href=\"#\" class=\"link-place\">\n            <img src=\"./assets/image/icon-small-flag.png\" alt=\"flag\"> United States of America</a> today at 5:29pm\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x210\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"follow-flag-wrap\">\n          <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n        </div>\n        <div class=\"follow-txt\">\n          <p class=\"follow-name\">United States of America</p>\n          <div class=\"follow-foot-info\">\n            <ul class=\"foot-avatar-list\">\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n            </ul>\n            <i class=\"trav-talk-icon icon-grey-comment\"></i>\n            <span>64K Talking about this</span>\n          </div>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n          Follow\n        </button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Stephen Bugno</a>\n        </div>\n        <div class=\"post-info\">\n          Planning a\n          <a href=\"#\" class=\"link-place\">Trip Plan</a> to\n          <a href=\"#\" class=\"link-place\">16 Destinations</a> in\n          <a href=\"#\" class=\"link-place\">Japan</a>\n          on 1 Sep 2017\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <div class=\"post-follow-slider\" id=\"postFollowSlider\">\n      <div class=\"post-image-inner\">\n        <div class=\"post-map-wrap\">\n          <img src=\"http://placehold.it/595x400\" alt=\"map\">\n        </div>\n        <div class=\"post-destination-block slide-dest-hide-right-margin\">\n          <div class=\"post-dest-slider\" id=\"postDestSliderInner1\">\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Okayama</div>\n                  <div class=\"dest-count\">6 Destinations</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Tokyo</div>\n                  <div class=\"dest-count\">7 Destinations</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Miyagi</div>\n                  <div class=\"dest-count\">3 Destinations</div>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-image-inner\">\n        <div class=\"post-map-wrap\">\n          <img src=\"http://placehold.it/595x400\" alt=\"map\">\n          <div class=\"post-map-info-caption map-blue\">\n            <div class=\"map-avatar\">\n              <img src=\"http://placehold.it/25x25\" alt=\"ava\">\n            </div>\n            <div class=\"map-label-txt\">\n              Checking on\n              <b>2 Sep</b> at\n              <b>8:30 am</b> and will stay\n              <b>30 min</b>\n            </div>\n          </div>\n        </div>\n        <div class=\"post-destination-block slide-dest-hide-right-margin\">\n          <div class=\"post-dest-slider\" id=\"postDestSliderInner2\">\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Bulgari Tokyo</div>\n                  <div class=\"dest-place\">Restaurant</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Bulgari Tokyo</div>\n                  <div class=\"dest-place\">Restaurant</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Bulgari Tokyo</div>\n                  <div class=\"dest-place\">Restaurant</div>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n      <div class=\"post-image-inner\">\n        <div class=\"post-map-wrap\">\n          <img src=\"http://placehold.it/595x400\" alt=\"map\">\n        </div>\n        <div class=\"post-destination-block slide-dest-hide-right-margin\">\n          <div class=\"post-dest-slider\" id=\"postDestSliderInner3\">\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Morocco</div>\n                  <div class=\"dest-count\">1 Destination</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">United Arab Emirate</div>\n                  <div class=\"dest-count\">2 Destinations</div>\n                </div>\n              </div>\n            </div>\n            <div class=\"post-dest-card\">\n              <div class=\"post-dest-card-inner\">\n                <div class=\"dest-image\">\n                  <img src=\"http://placehold.it/68x68?text=flag\" alt=\"\">\n                </div>\n                <div class=\"dest-info\">\n                  <div class=\"dest-name\">Japan</div>\n                  <div class=\"dest-count\">10 Destinations</div>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Mariel</a>\n        </div>\n        <div class=\"post-info\">\n          Started following\n          <a href=\"#\" class=\"link-place\">\n            <i class=\"trav-set-location-icon\"></i> Los Angeles</a> today at 5:29pm\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x210\" alt=\"\">\n        <div class=\"post-image-title\">\n          Los Angeles\n          <img src=\"http://placehold.it/28x16/666?text=flag\" alt=\"flag\">\n        </div>\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"follow-txt\">\n          <p class=\"follow-place-info\">City in\n            <a href=\"#\">United States of America</a>\n          </p>\n          <div class=\"follow-foot-info\">\n            <ul class=\"foot-avatar-list\">\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n              <li>\n                <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n              </li>\n            </ul>\n            <i class=\"trav-talk-icon icon-grey-comment\"></i>\n            <span>64K Talking about this</span>\n          </div>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n          Follow\n        </button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Cheryl cornett</a>\n        </div>\n        <div class=\"post-info\">\n          Started following\n          <a href=\"#\" class=\"link-place\">\n            <i class=\"trav-set-location-icon\"></i> Disneyland</a> today at 5:29pm\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x210\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"follow-txt\">\n          <p class=\"follow-place-name\">Disneyland</p>\n          <p class=\"follow-place-info\">Park in\n            <a href=\"#\">California, United States of America</a>\n          </p>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n          Follow\n        </button>\n      </div>\n    </div>\n    <div class=\"follow-main-content\">\n      <p>Disneyland Park, originally Disneyland, is the first of two theme parks built at the Disneyland Resort in Anaheim,\n        California, opened...\n        <a href=\"#\">More</a>\n      </p>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          Today\n          <a class=\"post-name-link\" href=\"#\">Mariel</a>\n          started following these cities\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-same-block-inner\">\n      <div class=\"post-top-info-layer\">\n        <div class=\"post-top-info-wrap\">\n          <div class=\"post-top-avatar-wrap\">\n            <img src=\"http://placehold.it/45x45\" alt=\"\">\n          </div>\n          <div class=\"post-top-info-txt\">\n            <div class=\"post-top-name\">\n              <a class=\"post-name-link\" href=\"#\">Mariel</a>\n            </div>\n            <div class=\"post-info\">\n              Started following\n              <i class=\"trav-set-location-icon\"></i>\n              <a href=\"#\" class=\"link-place\">Los Angeles</a>\n              today at 5:29 pm\n            </div>\n          </div>\n        </div>\n        <div class=\"post-top-info-action\">\n          <a href=\"#\" class=\"slide-link slide-prev\">\n            <i class=\"trav-angle-left\"></i>\n          </a>\n          <a href=\"#\" class=\"slide-link slide-next\">\n            <i class=\"trav-angle-right\"></i>\n          </a>\n        </div>\n      </div>\n      <div class=\"post-slide-wrap slide-hide-right-margin\">\n        <ul id=\"placeInfoPostCard\" class=\"post-slider\">\n          <li class=\"post-place-info-card\">\n            <div class=\"post-card-inner\">\n              <div class=\"image-wrap\">\n                <img src=\"http://placehold.it/400x210\" alt=\"\">\n                <div class=\"post-place-image-info\">\n                  <div class=\"place-flag-image\">\n                    <img class=\"flag-image\" src=\"http://placehold.it/105x53/e70c24?text=flag\" alt=\"flag\">\n                  </div>\n                  <div class=\"follow-btn-wrap\">\n                    <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                  </div>\n                </div>\n              </div>\n              <div class=\"post-slider-caption\">\n                <p class=\"post-place-name\" href=\"#\">Los Angeles</p>\n                <p class=\"post-card-placement\">\n                  City in\n                  <a href=\"#\">United States of America</a>\n                </p>\n                <ul class=\"post-footer-info-list\">\n                  <li>\n                    <p class=\"info-count\">26.581</p>\n                    <p class=\"info-label\">Followers</p>\n                  </li>\n                  <li>\n                    <p class=\"info-count\">34</p>\n                    <p class=\"info-label\">Trip Plans</p>\n                  </li>\n                  <li>\n                    <p class=\"info-count\">#7</p>\n                    <p class=\"info-label\">Ranking</p>\n                  </li>\n                </ul>\n              </div>\n            </div>\n          </li>\n          <li class=\"post-place-info-card\">\n            <div class=\"post-card-inner\">\n              <div class=\"image-wrap\">\n                <img src=\"http://placehold.it/400x210\" alt=\"\">\n                <div class=\"post-place-image-info\">\n                  <div class=\"place-flag-image\">\n                    <img class=\"flag-image\" src=\"http://placehold.it/105x53/e70c24?text=flag\" alt=\"flag\">\n                  </div>\n                  <div class=\"follow-btn-wrap\">\n                    <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n                  </div>\n                </div>\n              </div>\n              <div class=\"post-slider-caption\">\n                <p class=\"post-place-name\" href=\"#\">Vancouver</p>\n                <p class=\"post-card-placement\">\n                  City in\n                  <a href=\"#\">British Columbia, Canada</a>\n                </p>\n                <ul class=\"post-footer-info-list\">\n                  <li>\n                    <p class=\"info-count\">34.581</p>\n                    <p class=\"info-label\">Followers</p>\n                  </li>\n                  <li>\n                    <p class=\"info-count\">82</p>\n                    <p class=\"info-label\">Trip Plans</p>\n                  </li>\n                  <li>\n                    <p class=\"info-count\">#7</p>\n                    <p class=\"info-label\">Ranking</p>\n                  </li>\n                </ul>\n              </div>\n            </div>\n          </li>\n        </ul>\n      </div>\n    </div>\n    <div class=\"post-footer-info\">\n      <div class=\"post-reaction\">\n        <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n        <span>\n          <b>6</b> Reactions</span>\n      </div>\n      <div class=\"post-comment-info\">\n        <i class=\"trav-comment-icon\"></i>\n        <ul class=\"foot-avatar-list\">\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n          <li>\n            <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n          </li>\n        </ul>\n        <span>20 Comments</span>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Tom</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Sockets & Plugs</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">United States of America</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-socket-plugin-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">United States of America</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Tom</a>\n                <a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Tom</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Weather</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">New York City</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-title\">\n            New York City\n          </div>\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-weather-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-txt\">\n            <p class=\"follow-place-info\">City in\n              <a href=\"#\">United States of America</a>\n            </p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <i class=\"trav-talk-icon icon-grey-comment\"></i>\n              <span>60 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Tom</a>\n                <a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>It's a nice weather here</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Clara Newkirk</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">National Holidays</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">Japan</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-national-holiday-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Japan</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Clara Newkirk</a>\n                <a href=\"#\" class=\"comment-nickname\">@claraN</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Cras ut diam non nisi sollicitudin viverra sit amet efficitur odio rellentesque id imperdiet mi.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Tom</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Emergency Numbers</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">New York City</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-emergency-number-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">New York City</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Tom</a>\n                <a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>It's a nice weather here</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">James Hamilton</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Visa Requirement</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">Morocco</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-visa-requirement-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Morocco</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">James Hamilton</a>\n                <a href=\"#\" class=\"comment-nickname\">@jamesH</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>How easy it is to get a visa for morocco?</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Clara Newkirk</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Average Flights Prices</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">Japan</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-average-flight-price-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Japan</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Clara Newkirk</a>\n                <a href=\"#\" class=\"comment-nickname\">@claraN</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Cras ut diam non nisi sollicitudin viverra sit amet efficitur odio rellentesque id imperdiet mi.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">Tom</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Safety</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">United States of America</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-safety-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">United States of America</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Tom</a>\n                <a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name\">\n          <a class=\"post-name-link\" href=\"#\">James Hamilton</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Morocco</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-about-city-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"follow-flag-wrap\">\n            <img src=\"http://placehold.it/80x60?text=flag\" alt=\"\">\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Morocco</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">James Hamilton</a>\n                <a href=\"#\" class=\"comment-nickname\">@jamesH</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name post-ellipsis\">\n          <a class=\"post-name-link\" href=\"#\">Kenneth Burgess</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Public Event Quick Chek New Jersey test test test</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-public-event-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"date-block\">\n            <div class=\"follow-round\">\n              <span class=\"month blue\">jul</span>\n              <span class=\"count-day\">15</span>\n            </div>\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Public Event Quick Chek New Jersey</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Kenneth Burgess</a>\n                <a href=\"#\" class=\"comment-nickname\">@kanneth</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra per inceptos himenaeos.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Videos you might like\n      <span class=\"count\">20</span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"videoYouMightLikePostCard\" class=\"post-slider slide-same-height\">\n        <li class=\"post-card post-video-card\">\n          <div class=\"post-video-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-video-txt\">Tokyo Vacation Travel Guide | Expedia</p>\n              <p class=\"post-card-posted\">\n                Posted by\n                <a href=\"#\" class=\"card-name-link\">Mike</a>\n              </p>\n              <div class=\"post-footer-info\">\n                <div class=\"post-reaction\">\n                  <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n                  <span>\n                    <b>6</b> Reactions</span>\n                </div>\n              </div>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-card post-video-card\">\n          <div class=\"post-video-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-video-txt\">1 year traveling around the world</p>\n              <p class=\"post-card-posted\">\n                Posted by\n                <a href=\"#\" class=\"card-name-link\">Kenneth Burgess</a>\n              </p>\n              <div class=\"post-footer-info\">\n                <div class=\"post-reaction\">\n                  <img src=\"./assets/image/icon-like.png\" alt=\"smile\">\n                  <span>\n                    <b>2</b> Reactions</span>\n                </div>\n              </div>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-card post-video-card\">\n          <div class=\"post-video-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/230x130?text=video\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-video-txt\">We Call This Home</p>\n              <p class=\"post-card-posted\">\n                Posted by\n                <a href=\"#\" class=\"card-name-link\">Alix</a>\n              </p>\n              <div class=\"post-footer-info\">\n                <div class=\"post-reaction\">\n                  <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n                  <span>\n                    <b>6</b> Reactions</span>\n                </div>\n              </div>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name post-ellipsis\">\n          <a class=\"post-name-link\" href=\"#\">Betty Obrien</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Event Programm</a>\n          on\n          <a href=\"#\" class=\"post-name-link\">Cherry Blossom</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-event-program-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"date-block\">\n            <div class=\"follow-round\">\n              <span class=\"month blue\">jul</span>\n              <span class=\"count-day\">18</span>\n            </div>\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Cherry Blossom</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Betty Obrien</a>\n                <a href=\"#\" class=\"comment-nickname\">@berryO</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">\n      <i class=\"trav-trending-destination-icon\"></i> Trending activities\n      <span class=\"dropdown\">\n        <a class=\"event-place\" href=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">#United States</a>\n        <i class=\"trav-caret-down\"></i>\n        <div class=\"dropdown-menu dropdown-info-style post-profile-block location-block\">\n          <div class=\"post-prof-image\">\n            <img class=\"prof-cover\" src=\"http://www.midtownhotelnyc.com/resourcefiles/homeimages/hilton-garden-inn-new-york-manhattan-midtown-east-home1-top.jpg\"\n              alt=\"photo\">\n          </div>\n          <div class=\"post-prof-main\">\n            <div class=\"flag-wrap\">\n              <img src=\"http://placehold.it/153x53?text=flag\" alt=\"ava\">\n            </div>\n            <div class=\"post-person-info\">\n              <div class=\"prof-name\">United States</div>\n              <div class=\"prof-location\">Country in North America</div>\n              <div class=\"prof-button-wrap\">\n                <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              </div>\n              <div class=\"prof-follow-count\">28K Followers</div>\n            </div>\n            <div class=\"drop-bottom-link\">\n              <a href=\"#\" class=\"profile-link\">View profile</a>\n            </div>\n          </div>\n        </div>\n      </span>\n    </h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"trendingActivity2\" class=\"post-slider\">\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Super Bowl 2018</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Event</span> in Minneapolis\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">2017-18 NBA Season</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Event</span> in United States\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Event name here</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Event</span> in New York City\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name post-ellipsis\">\n          <a class=\"post-name-link\" href=\"#\">Kenneth Burgess</a>\n          added a comment about\n          <a href=\"#\" class=\"post-name-link\">Disneyland</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x210\" alt=\"\">\n          <div class=\"post-image-mark-icon\">\n            <i class=\"trav-about-city-icon\"></i>\n          </div>\n        </li>\n      </ul>\n      <div class=\"post-follow-block\">\n        <div class=\"follow-txt-wrap\">\n          <div class=\"date-block\">\n            <div class=\"follow-round\">\n              <i class=\"trav-map-marker-icon\"></i>\n            </div>\n          </div>\n          <div class=\"follow-txt\">\n            <p class=\"follow-name\">Disneyland</p>\n            <div class=\"follow-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n              <span>437 Comments</span>\n            </div>\n          </div>\n        </div>\n        <div class=\"follow-btn-wrap\">\n          <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">\n            Join the discussion\n          </button>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Kenneth Burgess</a>\n                <a href=\"#\" class=\"comment-nickname\">@kanneth</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Discover new travelers</h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap\">\n      <ul id=\"newTravelerDiscover\" class=\"post-slider slide-same-height\">\n        <li class=\"post-follow-card post-travel-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/62x62\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Bijay uprety</p>\n              <p class=\"post-card-spec\">Traveler</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">Followed by Nina Crespi and 22 more</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card post-travel-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/62x62\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Beatriz kim park</p>\n              <p class=\"post-card-spec\">Traveler</p>\n              <button type=\"button\" class=\"btn btn-light-primary btn-bordered\">Following</button>\n              <p class=\"post-card-follow-count\">Followed by Martin</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card post-travel-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/62x62\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Kathleen brown</p>\n              <p class=\"post-card-spec\">Write</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">39 Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card post-travel-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/62x62\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Alex ah</p>\n              <p class=\"post-card-spec\">Photographer</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">8K Followers</p>\n            </div>\n          </div>\n        </li>\n        <li class=\"post-follow-card post-travel-card\">\n          <div class=\"follow-card-inner\">\n            <div class=\"image-wrap\">\n              <img src=\"http://placehold.it/62x62\" alt=\"\">\n            </div>\n            <div class=\"post-slider-caption\">\n              <p class=\"post-card-name\">Louie olson</p>\n              <p class=\"post-card-spec\">Photographer</p>\n              <button type=\"button\" class=\"btn btn-light-grey btn-bordered\">Follow</button>\n              <p class=\"post-card-follow-count\">198K Followers</p>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Discover New destinations</h3>\n    <div class=\"side-right-control\">\n      <a href=\"#\" class=\"slide-link slide-prev\">\n        <i class=\"trav-angle-left\"></i>\n      </a>\n      <a href=\"#\" class=\"slide-link slide-next\">\n        <i class=\"trav-angle-right\"></i>\n      </a>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-slide-wrap slide-hide-right-margin\">\n      <ul id=\"discoverNewDestination\" class=\"post-slider\">\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Central park</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Park</span> in New York City\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Tokyo</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">City</span> in Japan\n            </div>\n          </div>\n        </li>\n        <li>\n          <img src=\"http://placehold.it/230x300\" alt=\"\">\n          <div class=\"post-slider-caption transparent-caption\">\n            <p class=\"post-slide-name\" href=\"#\">Grand canyon national park</p>\n            <div class=\"post-slide-description\">\n              <span class=\"tag\">Park</span> in Arizona\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-side-top\">\n    <h3 class=\"side-ttl\">Upcoming event in\n      <a class=\"event-place\" href=\"#\">New York City</a>\n      <i class=\"trav-caret-down\"></i>\n    </h3>\n    <div class=\"side-right-control\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-side-inner\">\n    <div class=\"post-event-block\">\n      <div class=\"post-event-image\">\n        <img class=\"event-cover\" src=\"https://www.runnersworld.com/sites/runnersworld.com/files/styles/article_main_custom_user_phone_1x/public/articles/2016/09/nyc_marathon.jpg?itok=mrgDghrv&timestamp=1473862824\"\n          alt=\"photo\">\n      </div>\n      <div class=\"post-event-main\">\n        <div class=\"logo-wrap\">\n          <img src=\"./assets/image/upcoming-event-logo.png\" alt=\"ava\">\n        </div>\n        <div class=\"post-placement-info\">\n          <a class=\"event-name\">New York City half marathon</a>\n          <div class=\"event-info-layer\">\n            <span class=\"date-event\">20 Mars 2018</span>\n            <div class=\"event-foot-info\">\n              <ul class=\"foot-avatar-list\">\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n                <li>\n                  <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n                </li>\n              </ul>\n            </div>\n            <span class='talking'>20 Talking about this</span>\n          </div>\n          <div class=\"event-main-content\">\n            <p>The New York City Half Marathon is an annual half marathon road running race. It passes through famous landmarks\n              such as Central Park and...\n              <a href=\"#\">More</a>\n            </p>\n          </div>\n        </div>\n        <ul class=\"post-event-photo-list\">\n          <li>\n            <img src=\"http://placehold.it/126x126\" alt=\"photo\">\n          </li>\n          <li>\n            <img src=\"http://placehold.it/126x126\" alt=\"photo\">\n          </li>\n          <li>\n            <img src=\"http://placehold.it/126x126\" alt=\"photo\">\n          </li>\n          <li>\n            <img src=\"http://placehold.it/126x126\" alt=\"photo\">\n          </li>\n        </ul>\n      </div>\n      <div class=\"event-bottom-link\">\n        <a href=\"#\" class=\"event-link\">Visit event page</a>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap\">\n        <img src=\"http://placehold.it/45x45\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name\">\n          <a class=\"post-name-link\" href=\"#\">Thomas Aranda</a>\n        </div>\n        <div class=\"post-info\">\n          Shared a\n          <a href=\"#\" class=\"link-place\">link</a> yesterday at 10:33pm\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-image-container post-follow-container\">\n    <ul class=\"post-image-list\">\n      <li>\n        <img src=\"http://placehold.it/595x330?text=video\" alt=\"\">\n      </li>\n    </ul>\n    <div class=\"post-follow-block\">\n      <div class=\"follow-txt-wrap\">\n        <div class=\"follow-txt\">\n          <p class=\"follow-destination\">200 Days - A Trip Around the World Travel Film</p>\n          <p class=\"follow-place-info\">My wife and I traveled to 17 countries in 200 days. This film is the sgs dfg sfgs fgsdf g</p>\n        </div>\n      </div>\n      <div class=\"follow-btn-wrap\">\n        <button type=\"button\" class=\"btn btn-light-grey btn-bordered btn-open-window\">\n          <i class=\"trav-open-video-in-window\"></i>\n        </button>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-footer-info\">\n    <div class=\"post-reaction\">\n      <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n      <span>\n        <b>6</b> Reactions</span>\n    </div>\n    <div class=\"post-comment-info\">\n      <i class=\"trav-comment-icon\"></i>\n      <ul class=\"foot-avatar-list\">\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n        <li>\n          <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n        </li>\n      </ul>\n      <span>20 Comments</span>\n    </div>\n  </div>\n</div>\n\n<div class=\"post-block post-top-bordered\">\n  <div class=\"post-top-info-layer\">\n    <div class=\"post-top-info-wrap\">\n      <div class=\"post-top-avatar-wrap post-marked-avatar\">\n        <img src=\"http://placehold.it/20x20\" alt=\"\">\n      </div>\n      <div class=\"post-top-info-txt\">\n        <div class=\"post-top-name profile-name post-ellipsis\">\n          <a class=\"post-name-link\" href=\"#\">Tom</a>\n          added a comment about a\n          <a href=\"#\" class=\"post-name-link\">Photo</a>\n          in\n          <a href=\"#\" class=\"post-name-link\">\n            <img src=\"./assets/image/icon-small-flag.png\" alt=\"flag\"> United States of America</a>\n        </div>\n      </div>\n    </div>\n    <div class=\"post-top-info-action\">\n      <div class=\"dropdown\">\n        <button class=\"btn btn-drop-round-grey btn-drop-transparent\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n          <i class=\"trav-angle-down\"></i>\n        </button>\n        <div class=\"dropdown-menu dropdown-menu-right dropdown-arrow\">\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-share-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Share</b>\n              </p>\n              <p>Spread the word</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-heart-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Add to favorites</b>\n              </p>\n              <p>Save it for later</p>\n            </div>\n          </a>\n          <a class=\"dropdown-item\" href=\"#\">\n            <span class=\"icon-wrap\">\n              <i class=\"trav-flag-icon\"></i>\n            </span>\n            <div class=\"drop-txt\">\n              <p>\n                <b>Report</b>\n              </p>\n              <p>Help us understand</p>\n            </div>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n  <div class=\"post-content-inner\">\n    <div class=\"post-image-container post-follow-container\">\n      <ul class=\"post-image-list\">\n        <li>\n          <img src=\"http://placehold.it/595x360\" alt=\"\">\n        </li>\n      </ul>\n      <div class=\"post-footer-info post-footer-padded\">\n        <div class=\"post-reaction\">\n          <img src=\"./assets/image/reaction-icon-smile-only.png\" alt=\"smile\">\n          <span>\n            <b>6</b> Reactions</span>\n        </div>\n        <div class=\"post-comment-info\">\n          <i class=\"trav-comment-icon\"></i>\n          <ul class=\"foot-avatar-list\">\n            <li>\n              <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n            </li>\n            <li>\n              <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n            </li>\n            <li>\n              <img class=\"small-ava\" src=\"http://placehold.it/20x20\" alt=\"ava\">\n            </li>\n          </ul>\n          <span>20 Comments</span>\n        </div>\n      </div>\n      <div class=\"follow-comment-wrap comment-on-photo\">\n        <div class=\"post-comment-wrapper\">\n          <div class=\"post-comment-row\">\n            <div class=\"post-com-avatar-wrap\">\n              <img src=\"http://placehold.it/45x45\" alt=\"\">\n            </div>\n            <div class=\"post-comment-text\">\n              <div class=\"post-com-name-layer\">\n                <a href=\"#\" class=\"comment-name\">Tom</a>\n                <a href=\"#\" class=\"comment-nickname\">@tom2011</a>\n              </div>\n              <div class=\"comment-txt\">\n                <p>Class aptent taciti sociosqu ad litora torquent per conubia.</p>\n              </div>\n              <div class=\"comment-bottom-info\">\n                <div class=\"com-reaction\">\n                  <img src=\"./assets/image/icon-smile.png\" alt=\"\">\n                  <span>21</span>\n                </div>\n                <div class=\"com-time\">6 hours ago</div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n      <!-- <div class=\"post-follow-block\"></div> -->\n    </div>\n  </div>\n</div>"

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

module.exports = "<!-- create an account -->\n<div class=\"modal fade\" id=\"createAccount1\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n  <div class=\"modal-dialog sign-up-style\" role=\"document\">\n    <div class=\"modal-content\">\n      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n        <span aria-hidden=\"true\">&times;</span>\n      </button>\n      <div class=\"modal-body body-create\">\n        <div class=\"top-layer\">\n          <a href=\"#\" class=\"logo-wrap\">\n            <img src=\"./assets/image/main-logo.png\" alt=\"\">\n          </a>\n          <h4 class=\"title\">Create a free account</h4>\n          <!-- <p class=\"sub-ttl\">and write a text here</p> -->\n          <!-- <p class=\"sub-ttl error-message\">Your password is too weak</p> -->\n          <p class=\"sub-ttl error-message\">Please fill the required fields</p>\n        </div>\n        <form class=\"login-form\">\n          <div class=\"step-1\">\n            <div class=\"form-group\">\n              <input type=\"email\" class=\"form-control\" id=\"emailAddress\" aria-describedby=\"emailHelp\" placeholder=\"Email address\">\n            </div>\n            <div class=\"form-group has-danger\">\n              <input type=\"password\" class=\"form-control\" id=\"password\" aria-describedby=\"pass\" placeholder=\"Password\">\n            </div>\n            <div class=\"form-margin\"></div>\n            <div class=\"form-group\">\n              <button type=\"button\" class=\"btn btn-success\" (click)=\"continueSignup()\">Continue</button>\n            </div>\n            <div class=\"form-group\">\n              <p class=\"simple-txt\">Or</p>\n            </div>\n            <div class=\"form-group\">\n              <button type=\"button\" class=\"btn btn-primary\">\n                <i class=\"fa fa-facebook side-icon\"></i>\n                Continue with Facebook</button>\n            </div>\n            <div class=\"form-group\">\n              <button type=\"button\" class=\"btn btn-info\">\n                <i class=\"fa fa-twitter side-icon\"></i>\n                Continue with Twitter</button>\n            </div>\n          </div>\n          <div class=\"form-group bottom-txt-group\">\n            <p class=\"bottom-txt\">Creating an account means you're okay with</p>\n            <ul class=\"link-list\">\n              <li><b>Travooo's</b></li>\n              <li>\n                <a href=\"#\"> Terms of Service,</a>\n              </li>\n              <li>\n                <a href=\"#\"> Privacy Policy</a>\n              </li>\n            </ul>\n          </div>\n        </form>\n      </div>\n      <div class=\"modal-footer\">\n        <p class=\"foot-txt\">Already a member?</p>\n        <button type=\"button\" class=\"btn btn-grey\" (click)=\"openLogin('createAccount1')\">Log In</button>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\"modal fade\" id=\"createAccount2\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n  <div class=\"modal-dialog sign-up-style\" role=\"document\">\n    <div class=\"modal-content\">\n      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n        <span aria-hidden=\"true\">&times;</span>\n      </button>\n      <div class=\"modal-body body-create\">\n        <div class=\"top-layer\">\n          <a href=\"#\" class=\"logo-wrap\">\n            <img src=\"./assets/image/main-logo.png\" alt=\"\">\n          </a>\n          <h4 class=\"title\">Create a free account</h4>\n          <!-- <p class=\"sub-ttl\">and write a text here</p> -->\n          <!-- <p class=\"sub-ttl error-message\">Your password is too weak</p> -->\n          <p class=\"sub-ttl error-message\">Please fill the required fields</p>\n        </div>\n        <form class=\"login-form\">\n          <div class=\"step-2\">\n            <div class=\"form-group\">\n              <p class=\"email-field\">emailhere@gmail.com</p>\n            </div>\n            <div class=\"form-group flex-custom has-danger\">\n              <input type=\"text\" class=\"form-control flex-input\" id=\"fullName\" aria-describedby=\"full name\" placeholder=\"Full Name\">\n              <select class=\"custom-select\" id=\"ageSelect\">\n                <option selected>Age</option>\n                <option value=\"1\">26</option>\n                <option value=\"2\">27</option>\n                <option value=\"3\">28</option>\n              </select>\n            </div>\n            <div class=\"form-check flex-custom\">\n              <div class=\"custom-check-label\">\n                <input type=\"radio\" class=\"custom-check-input\" name=\"gender\" id=\"male\" value=\"male\">\n                <label for=\"male\">Male</label>\n              </div>\n              <div class=\"custom-check-label\">\n                <input type=\"radio\" class=\"custom-check-input\" name=\"gender\" id=\"female\" value=\"female\">\n                <label for=\"female\">Female</label>\n              </div>\n            </div>\n            <div class=\"form-group\">\n              <button type=\"button\" class=\"btn btn-info\">Sign Up</button>\n            </div>\n            <div class=\"form-group\">\n              <button type=\"button\" class=\"btn btn-transp\"><i class=\"fa fa-angle-left\"></i> <span>Back</span></button>\n            </div>\n          </div>\n          <div class=\"form-group bottom-txt-group\">\n            <p class=\"bottom-txt\">Creating an account means you're okay with</p>\n            <ul class=\"link-list\">\n              <li><b>Travooo's</b></li>\n              <li>\n                <a href=\"#\"> Terms of Service,</a>\n              </li>\n              <li>\n                <a href=\"#\"> Privacy Policy</a>\n              </li>\n            </ul>\n          </div>\n        </form>\n      </div>\n      <div class=\"modal-footer\">\n        <p class=\"foot-txt\">Already a member?</p>\n        <button type=\"button\" class=\"btn btn-grey\" (click)=\"openLogin('createAccount2')\">Log In</button>\n      </div>\n    </div>\n  </div>\n</div>"

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
    function SignupComponent() {
    }
    SignupComponent.prototype.ngOnInit = function () {
    };
    SignupComponent.prototype.openLogin = function (id) {
        $('#' + id).modal("hide");
        $('#signUp').modal("show");
    };
    SignupComponent.prototype.continueSignup = function () {
        $('#createAccount1').modal("hide");
        $('#createAccount2').modal("show");
    };
    SignupComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup',
            template: __webpack_require__("../../../../../src/app/signup/signup.component.html"),
            styles: [__webpack_require__("../../../../../src/app/signup/signup.component.scss")]
        }),
        __metadata("design:paramtypes", [])
    ], SignupComponent);
    return SignupComponent;
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