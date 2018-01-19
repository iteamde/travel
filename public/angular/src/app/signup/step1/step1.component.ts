import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { UserService } from '../../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ConfirmPasswordValidator } from '../../../_helpers/custom-validators';
import { User } from '../../../_models/user.model';
import { Title } from '@angular/platform-browser/';
import { MainComponent } from '../../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step1',
	templateUrl: './step1.component.html',
	styleUrls: ['./step1.component.scss']
})
export class Step1Component implements OnInit {

	loading = false;
	signupContinueBtnText: string = "Continue";
	signupForm1: FormGroup;

	email = new FormControl('', [
		Validators.required,
		Validators.email
	]);
	username = new FormControl('', [
		Validators.required
	]);
	password = new FormControl('', [
		Validators.required
	]);
	cpassword = new FormControl('', [
		Validators.required,
		ConfirmPasswordValidator(this.password)
	]);

	errors = [];
	signupErrors = {username:"", email: "", password: "", cpassword:""};

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private userService: UserService,
		private formBuilder: FormBuilder,
		private titleService: Title,
		private mainC: MainComponent) { }

	ngOnInit() {
		var step1 = {
			username: this.username,
			email: this.email,
			password: this.password,
			cpassword: this.cpassword
		};

		this.signupForm1 = this.formBuilder.group(step1);
		var t = this;
		$('#signUpStep1').modal("show");
		$('#signUpStep1').on('hidden.bs.modal', function (e) {
			t.closeSignup();
		});
	}

	closeSignup(){
		this.mainC.closeAll();
	}

	openLogin() {
		this.mainC.openLogin();
	}

	validate(name: string) {
		this.signupErrors[name] = '';
		var control = this.signupForm1.get(name);
		if ((!control.pristine || control.touched) && !control.valid) {
			if (control.errors.required) {
				this.signupErrors[name] = "This field is required.";
			}
			else if (control.errors.email) {
				this.signupErrors[name] = "This Email is not valid.";
			}
			else if (control.errors.ConfirmPassword) {
				this.signupErrors[name] = "Password must be repeated exactly.";
			}
			return 'has-danger';
		}
	}

	continueStep1() {
		this.errors = [];
		this.toggleSignup(false);

		var user: any = {};
		user.username = this.username.value;
		user.email = this.email.value;
		user.password = this.password.value;
		user.password_confirmation = this.cpassword.value;

		if (this.email.valid && this.username.valid && this.password.valid && this.cpassword.valid) {

			this.userService.signupStep1(user)
			.subscribe(
				data => {
					//console.log(data);

					if (data.success) {
						var id = data.data;
						//console.log(id);

						localStorage.setItem('signupId', id);
						this.toggleSignup(true);

						// continue to step 2
						this.mainC.openSignup(2);
					}
					else {
						this.errors = data.data.message;
						this.toggleSignup(true);
					}
				},
				error => {
					console.log(error);
					this.toggleSignup(true);
				}
			);
		}
		else {
			this.errors.push("Please fill all required fields with valid values first.")
		}
	}

	toggleSignup(state) {
		if (state) {
			this.signupContinueBtnText = "Continue";
			this.loading = false;
		}
		else {
			this.signupContinueBtnText = "Signing Up ...";
			this.loading = true;
		}
	}

}
