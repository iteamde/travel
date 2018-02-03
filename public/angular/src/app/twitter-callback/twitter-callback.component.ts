import { Component, OnInit } from '@angular/core';
import { MainComponent } from '../main/main.component';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { Subscription } from 'rxjs/Subscription';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-twitter-callback',
	templateUrl: './twitter-callback.component.html',
	styleUrls: ['./twitter-callback.component.scss']
})
export class TwitterCallbackComponent implements OnInit {

	private sub: Subscription;
	oauthToken: string;
	oauthVerifier: string;

	constructor(
		private mainC: MainComponent,
		private route: ActivatedRoute,
		private router: Router,
	) { }

	ngOnInit() {
		$.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });

		// assign the subscription to a variable so we can unsubscribe to prevent memory leaks
		this.sub = this.route.queryParams.subscribe((params: Params) => {
			this.oauthToken = params['oauth_token'];
			this.oauthVerifier = params['oauth_verifier'];
		});

		this.mainC.TwitterCallbackLogin(this.oauthToken, this.oauthVerifier);

		// setTimeout(function () {
		// 	window.close();
		// }, 2000);
	}

	ngOnDestroy() {
		this.sub.unsubscribe();
	}
}
