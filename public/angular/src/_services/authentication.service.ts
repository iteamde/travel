import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map'
import { retry } from 'rxjs/operator/retry';
import { ManagerService } from './manager.service';

@Injectable()
export class AuthenticationService extends ManagerService{
    constructor(private http: HttpClient) {
        super();
     }

    login(username: string, password: string) {
        return this.http.post<any>(this.apiPrefix+'/users/login', { email: username, password: password })
            .map(user => {
                // login successful if there's a jwt token in the response
                if (user && user.token) {
                    console.log("UserToken:"+user.token);
                    // store user details and jwt token in local storage to keep user logged in between page refreshes
                    localStorage.setItem('currentUser', JSON.stringify(user));
                }

                return user;
            });
    }

    logout() {
        // remove user from local storage to log user out
        localStorage.removeItem('currentUser');
    }

    isLoggedIn(){
        if (localStorage.getItem('currentUser')) {
            // logged in so return true
            return true;
        }
        return false;
    }
}