import { Injectable } from '@angular/core';
import { ManagerService } from './manager.service';
import { AuthenticationService } from './authentication.service';

declare var jquery: any;
declare var $: any;
declare var twttr: any;

@Injectable()
export class TwitterService extends ManagerService{

	constructor(private authService: AuthenticationService) {
		super();
		$.getScript('assets/js/twitter-script.js');
	}

	login(ref: any, callback: (ref:any, res: object) => any){
		var t = this;
		twttr.connect(function (response) {
			// console.log(response);
			if (response.success) {
				t.authService.twitterLogin(response).subscribe(
					result => {
						callback(ref, {status: result});
					});
			} else {
				callback(ref, {status: false});
			}
		})
	}
}
