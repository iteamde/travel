import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map'
import { retry } from 'rxjs/operator/retry';
import { ManagerService } from './manager.service';

@Injectable()
export class AuthenticationService extends ManagerService{
    public token: string;

    constructor(private http: Http) {
        super();
        // set token if saved in local storage
        var currentUser = JSON.parse(localStorage.getItem('currentUser'));
        this.token = currentUser && currentUser.token;
    }

    login(username: string, password: string): Observable<boolean> {
        return this.http.post(this.apiPrefix+'/users/login', { email: username, password: password })
            .map((response: Response) => {
                
                if(response.ok)
                {
                    var result = response.json();
                    //console.log(result);

                    // api response is found
                    var apidata = result.data;
                    //console.log(apidata);

                    if(result.success)
                    {
                        // api result success is true
                        var user = apidata.user;
                        // login successful if there's a jwt token in the response
                        let token = apidata.token;
                        //console.log(token);

                        if(token)
                        {
                            // set token property
                            this.token = token;
            
                            // store username and jwt token in local storage to keep user logged in between page refreshes
                            localStorage.setItem('currentUser', JSON.stringify({ user: user, token: token }));

                            // return true to indicate successful login
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        // api result success is false // return api result message
                        return apidata.message;
                    }
                } else {
                    // api response not found
                    return false;
                }
            });
    }

    forgotPassword(email: string) {
        return this.http.post(this.apiPrefix+'/users/forgot', { email: email })
            .map((response: Response) => response.json());
    }

    resetPassword(token: string, pass: string, cpass:string) {
        return this.http.post(this.apiPrefix+'/users/reset', { token: token, newpassword: pass, newpassword_confirmation: cpass })
            .map((response: Response) => response.json());
    }

    logout(): void {
        // clear token remove user from local storage to log user out
        this.token = null;
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