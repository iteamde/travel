import { Injectable } from '@angular/core';

// import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Response } from '@angular/http';
import { Observable } from 'rxjs';
import 'rxjs/add/operator/map'

import { AuthenticationService } from './/authentication.service';
import { User } from '../app/core/models/user.model';
import { ManagerService } from './manager.service';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class UserService extends ManagerService{
    constructor(
        private http: HttpClient,
        private authenticationService: AuthenticationService) {
            super();
    }

    // signup
    signupStep1(user: User): Observable<any> {
        // add authorization header with jwt token
        // let headers = new Headers({ 'Authorization': 'Bearer ' + "" });
        // let options = new RequestOptions({ body: user, headers: headers });

        return this.http.post(this.apiPrefix+'/users/create', user);
    }

    // save user profile info
    signupStep2(user: User): Observable<any> {
        return this.http.post(this.apiPrefix+'/users/create/step2', user);
    }

    // save user selected countries
    signupStep3(data): Observable<any> {
        return this.http.post(this.apiPrefix+'/users/set/fav_countries', data);
    }

    // save user selected places
    signupStep4(data): Observable<any> {
        return this.http.post(this.apiPrefix+'/users/set/fav_places', data);
    }

    // save user selected styles
    signupStep5(data): Observable<any> {
        return this.http.post(this.apiPrefix+'/users/set/travel_styles', data);
    }

    getUsers(): Observable<User[]> {
        // get users from api
        return this.http.get('/api/users', {})
            .map((response: Response) => response.json());
    }
}
