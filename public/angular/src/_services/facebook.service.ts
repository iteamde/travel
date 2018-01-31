import { Injectable } from '@angular/core';
import { ManagerService } from './manager.service';
import { AuthenticationService } from './authentication.service';

declare var jquery: any;
declare var $: any;
declare var FB: any;

@Injectable()
export class FacebookService extends ManagerService{

	constructor(private authService: AuthenticationService) {
		super();
		$.getScript('assets/js/fb-script.js');
	}

	// pass a call back method to be called after successful/unsuccessful login
	login(ref: any, callback: (ref:any, res: object) => any) {
		var t = this;
		FB.login(
			function(response){
				if(response.status == "connected")
				{
					var obj = response.authResponse;
					var userid = obj.userID;
					FB.api('/me?fields=id,name,email,picture', function(response1) {
						//console.log(response1);
						var user = response1;
						t.authService.facebookLogin(user.id, user.email).subscribe(
							result => {
								callback(ref, {status: result});
							});
					});
				}
				else
				{
					callback(ref, {status: false});
				}
			},
			{scope: 'public_profile,email'});
	}
}
