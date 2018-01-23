import { Injectable } from '@angular/core';

declare var jquery: any;
declare var $: any;
declare var FB: any;

@Injectable()
export class FacebookService {

	constructor() {
		$.getScript('assets/js/fb-script.js');
	}

	// pass a call back method to be called after successful/unsuccessful login
	login(callback: (res: object) => any) {
		var t = this;
		FB.login(
			function(response){
				if(response.status = "connected")
				{
					var obj = response.authResponse;
					var userid = obj.userID;
					FB.api('/me?fields=id,name,email,picture', function(response1) {
						//console.log(response1);
						callback({status: true, user: response1});
					});
				}
				else
				{
					callback({status: false});
				}
			},
			{scope: 'public_profile,email'});
	}
}
