import { Injectable } from '@angular/core';

import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Observable } from 'rxjs';
import 'rxjs/add/operator/map'

import { AuthenticationService } from '../_services/authentication.service';
import { User } from '../_models/user.model';
import { ManagerService } from './manager.service';

@Injectable()
export class UserService extends ManagerService{
    constructor(
        private http: Http,
        private authenticationService: AuthenticationService) {
            super();
    }

    // signup
    signupStep1(user: User) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: user, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/create', user)
            .map((response: Response) => response.json());
    }

    // save user profile info
    signupStep2(user: User) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: user, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/create/step2', user)
            .map((response: Response) => response.json());
    }

    // save user selected countries
    signupStep3(data) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: data, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/set/fav_countries', data)
            .map((response: Response) => response.json());
    }

    // save user selected places
    signupStep4(data) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: data, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/set/fav_places', data)
            .map((response: Response) => response.json());
    }

    // save user selected styles
    signupStep5(data) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: data, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/set/travel_styles', data)
            .map((response: Response) => response.json());
    }

    getUsers(): Observable<User[]> {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "" });
        let options = new RequestOptions({ headers: headers });

        // get users from api
        return this.http.get('/api/users', options)
            .map((response: Response) => response.json());
    }
}