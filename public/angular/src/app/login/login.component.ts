import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AuthenticationService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Title } from '@angular/platform-browser';
import { MainComponent } from '../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-login',
	templateUrl: './login.component.html',
	styleUrls: ['./login.component.scss']
})


export class LoginComponent implements OnInit {

	loading = false;
	returnUrl: string;
	loginBtnText: string = "Login";
	FbButtonText: string = "Continue with Facebook";
	TwitterButtonText: string = "Continue with Twitter";
	errors = [];
	emailMsg: string = "";
	passwordMsg: string = "";

	loginForm: FormGroup;
	email = new FormControl('', [
		Validators.required,
		Validators.email
	]);
	password = new FormControl('', [
		Validators.required
	]);

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private authenticationService: AuthenticationService,
		private formBuilder: FormBuilder,
		private titleService: Title,
		private mainC: MainComponent) { }

	ngOnInit() {
		
		// get return url from route parameters or default to '/home'
		this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/home';

		this.loginForm = this.formBuilder.group({
			email: this.email,
			password: this.password
		});
		var t = this;
		$('#logIn').modal("show");
		$('#logIn').on('hidden.bs.modal', function (e) {
			t.closeLogin();
		});
	}

	FBlogin(){
		this.mainC.FBlogin();
	}

	TwitterLogin(){
		this.mainC.TwitterLogin();
	}

	closeLogin(){
		this.mainC.closeAll();
	}

	openSignup() {
		this.mainC.openSignup(1);
	}

	openForgotPassword(){
		this.mainC.openForgotPassword();
	}

	setClassEmail() {
		if ((!this.email.pristine || this.email.touched) && !this.email.valid) {
			if (this.email.errors.required) {
				this.emailMsg = "Email is required.";
			}
			else if (this.email.errors.email) {
				this.emailMsg = "Email is not valid.";
			}
			return 'has-danger';
		}
	}

	setClassPassword() {
		if ((!this.password.pristine || this.password.touched) && !this.password.valid) {
			if (this.password.errors.required) {
				this.passwordMsg = "Password is required.";
			}
			return 'has-danger';
		}
	}

	login() {
		this.errors = [];
		this.toggleLogin(false);

		this.authenticationService.login(this.email.value, this.password.value)
			.subscribe(result => {
				if (result === true) {
					// close login modal and open homepage
					$('#logIn').modal("hide");
					$.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });

					// If login is successful, redirect to the home state
					var t = this;
					setTimeout(function () {
						$.unblockUI();

						t.mainC.openUrl(t.returnUrl);
						//t.router.navigate([t.returnUrl]);
					}, 1000);
				} else {
					this.errors.push(result);
					this.toggleLogin(true);
				}
			});
	}

	toggleLogin(state) {
		if (state) {
			this.loginBtnText = "Login";
			this.loading = false;
		}
		else {
			this.loginBtnText = "Checking Login ...";
			this.loading = true;
		}
	}
}
