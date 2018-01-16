import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AlertService, UserService } from '../../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ConfirmPasswordValidator } from '../../../_helpers/custom-validators';
import { User } from '../../../_models/user.model';
import { Title } from '@angular/platform-browser/';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup-step2',
	templateUrl: './step2.component.html',
	styleUrls: ['./step2.component.scss']
})
export class Step2Component implements OnInit {

	loading = false;
	signupBtnText: string = "Sign Up";
	signupForm2: FormGroup;

	name = new FormControl('', [
		Validators.required
	]);
	age = new FormControl('', [
	]);
	gender = new FormControl('', [
		Validators.required
	]);

	errors = [];
	signupErrors: Object;

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private userService: UserService,
		private alertService: AlertService,
		private formBuilder: FormBuilder,
		private titleService: Title
	) { }

	ngOnInit() {
		var step2 = {
			name: this.name,
			age: this.age,
			gender: this.gender
		}

		this.signupForm2 = this.formBuilder.group(step2);
		this.signupErrors = {};
	}

	validate(name: string) {
		this.signupErrors[name] = '';
		var control = this.signupForm2.get(name);
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

	continueStep2() {
		this.errors = [];
		this.toggleSignup(false);

		var user: any = {};
		user.user_id = localStorage.getItem('signupId');
		user.name = this.name.value;
		user.age = this.age.value;
		user.gender = this.gender.value;

		this.userService.createStep2(user)
			.subscribe(
			data => {
				//console.log(data);

				if (data.success) {
					var response = data.data;
					//console.log(response);
					this.toggleSignup(true);

					// continue to step 3
					$('#signUpStep2').modal("hide");
					$('#signUpStep3').modal("show");
				}
				else {
					this.errors = data.data.message;
					this.toggleSignup(true);
				}
			},
			error => {
				console.log(error);
				//this.alertService.error(error);
				this.toggleSignup(true);
			}
			);
	}

	toggleSignup(state) {
		if (state) {
			this.signupBtnText = "Sign Up";
			this.loading = false;
		}
		else {
			this.signupBtnText = "Signing Up ...";
			this.loading = true;
		}
	}

}
