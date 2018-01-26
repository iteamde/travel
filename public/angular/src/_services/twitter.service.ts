import { Injectable } from '@angular/core';

declare var jquery: any;
declare var $: any;
declare var twttr: any;

@Injectable()
export class TwitterService {

	constructor() {
		$.getScript('assets/js/twitter-script.js');
	}

	login(ref: any, callback: (ref:any, res: object) => any){
		console.log("twitter is called");
		twttr.connect(function (response) {
			console.log('response');
			console.log(response);
			if (response.success) {
				//request = response;
			} else {
				console.log("Twitter Login Error");
			}
			console.log(response);
			// displayAuthorizeSection(JSON.stringify(response));
		})
	}
}
