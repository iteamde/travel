import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Router, ActivatedRoute } from '@angular/router';
import { AuthenticationService, FacebookService, TwitterService } from '../../_services/index';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-main',
	templateUrl: './main.component.html',
	styleUrls: ['./main.component.scss']
})
export class MainComponent implements OnInit {

	signupSteps: number = 8;
	signupStepCount: number = 0;
	progressWidth: string = "0%";

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private titleService: Title,
		private authenticationService: AuthenticationService,
		private fbService: FacebookService,
		private twtService: TwitterService) { }

	ngOnInit() {
		this.titleService.setTitle("Travooo");
		$.getScript('assets/js/script.js');
	}

	FBlogin() {
		this.toggleSocialLogin(false);
		this.fbService.login(this, this.loginCallBack);
	}

	TwitterLogin() {
		this.toggleSocialLogin(false);
		this.twtService.login(this, this.loginCallBack);
	}

	loginCallBack(ref, response) {
		//console.log(response);
		if (response.status) {
			var user = response.user;
			ref.authenticationService.facebookLogin(user.id, user.email)
				.subscribe(result => {
					ref.toggleSocialLogin(true);
					if (result === "login") {
						// close login modal and open homepage
						$('#logIn').modal("hide");
						$.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });

						// If login is successful, redirect to the home state
						setTimeout(function () {
							$.unblockUI();

							ref.openUrl('/home');
						}, 1000);
					} else if(result === "register"){
						ref.openSignup(2);
					} else {
						// login/signup failed
					}
				});
		}
		else {
			// failed to login to fb
		}
	}

	toggleSocialLogin(state) {
		if (state) {
			$.unblockUI();
		}
		else {
			$.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });
		}
	}

	closeAll() {
		this.titleService.setTitle("Travooo");
		$('.signUpProgress').hide();
		$('.modal-backdrop').remove();
		$('body').removeClass('modal-open');
		this.signupStepCount = 0;
		this.router.navigate(['/']);
	}

	openLogin() {
		if (this.authenticationService.isLoggedIn()) {
			this.router.navigate(['/home']);
		}
		else {
			this.titleService.setTitle("Travooo - Login");
			$('.signUpProgress').hide();
			$('.modal-backdrop').remove();
			this.signupStepCount = 0;
			this.router.navigate(['/login']);
		}
	}

	openSignup(stepNum = 1) {
		this.titleService.setTitle("Travooo - Signup");
		$('.signUpProgress').show();
		$('.modal-backdrop').remove();
		this.signupStepCount = stepNum;
		this.progressWidth = (this.signupStepCount / this.signupSteps) * 100 + "%";
		if (stepNum == 1) {
			this.router.navigate(['/signup']);
		}
		else {
			this.router.navigate(['/signup/step' + stepNum]);
		}
	}

	openForgotPassword() {
		this.titleService.setTitle("Travooo - Reset Password");
		$('.modal-backdrop').remove();
		this.router.navigate(['/forgot-password']);
	}

	openUrl(url) {
		this.titleService.setTitle("Travooo");
		$('.modal-backdrop').remove();
		this.router.navigate([url]);
	}
}
