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

    create(user: User) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: user, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/create', user)
            .map((response: Response) => response.json());
    }

    createStep2(user: User) {
        // add authorization header with jwt token
        let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
        let options = new RequestOptions({ body: user, headers: headers });

        // get users from api
        return this.http.post(this.apiPrefix+'/users/create/step2', user)
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