import { Injectable } from '@angular/core';
import { ManagerService } from './manager.service';
import { AuthenticationService } from './authentication.service';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

declare var jquery: any;
declare var $: any;
declare var twttr: any;

@Injectable()
export class TwitterService extends ManagerService{

	constructor(
		private authService: AuthenticationService,
		private http: HttpClient) {
		super();
		//$.getScript('assets/js/twitter-script.js');
	}

	login(ref: any, callback: (ref:any, res: object) => any){
		var t = this;

		this.getOauthToken().subscribe(
			result => {
				if(result.success){
					var oauth_token = result.data.oauth_token;
					localStorage.setItem('twtOauthToken', result.data.oauth_token);
					localStorage.setItem('twtOauthTokenSecret', result.data.oauth_token_secret);
					window.location.href = 'https://api.twitter.com/oauth/authenticate?oauth_token='+oauth_token;
				} else {
					callback(ref, {status: false});
				}
			});

		// twttr.connect(function (response) {
		// 	// console.log(response);
		// 	if (response.success) {
		// 		t.authService.twitterLogin(response).subscribe(
		// 			result => {
		// 				callback(ref, {status: result});
		// 			});
		// 	} else {
		// 		callback(ref, {status: false});
		// 	}
		// })
	}

	getOauthToken(): Observable<any>{
		return this.http.get(this.apiPrefix+'/users/create/twitter/login', { });
	}
}
