import { Injectable } from '@angular/core';

// import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Response } from '@angular/http';
import { Observable } from 'rxjs';
import 'rxjs/add/operator/map'

import { AuthenticationService } from '../_services/authentication.service';
import { User } from '../_models/user.model';
import { ManagerService } from './manager.service';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class UserService extends ManagerService{
    constructor(
        private http: HttpClient,
        private authenticationService: AuthenticationService) {
            super();
    }

    signupFB(email: string, fbuid: string){
        // get users from api
        return this.http.post(this.apiPrefix+'/users/create/facebook', {email: email, fbuid: fbuid})
            .map((response: Response) => response.json());
    }

    // signup
    signupStep1(user: User) {
        // add authorization header with jwt token
        // let headers = new Headers({ 'Authorization': 'Bearer ' + "" });
        // let options = new RequestOptions({ body: user, headers: headers });

        return this.http.post(this.apiPrefix+'/users/create', user)
            .map((response: Response) => response.json());
    }

    // save user profile info
    signupStep2(user: User) {
        return this.http.post(this.apiPrefix+'/users/create/step2', user)
            .map((response: Response) => response.json());
    }

    // save user selected countries
    signupStep3(data) {
        return this.http.post(this.apiPrefix+'/users/set/fav_countries', data)
            .map((response: Response) => response.json());
    }

    // save user selected places
    signupStep4(data) {
        return this.http.post(this.apiPrefix+'/users/set/fav_places', data)
            .map((response: Response) => response.json());
    }

    // save user selected styles
    signupStep5(data) {
        return this.http.post(this.apiPrefix+'/users/set/travel_styles', data)
            .map((response: Response) => response.json());
    }

    getUsers(): Observable<User[]> {
        // get users from api
        return this.http.get('/api/users', {})
            .map((response: Response) => response.json());
    }
}