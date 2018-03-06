import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AuthenticationService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { User } from '../../_models/user.model';
import { Title } from '@angular/platform-browser/';
import { MainComponent } from '../main/main.component';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-forgot-password',
	templateUrl: 'forgot-password.component.html',
	styleUrls: ['forgot-password.component.scss']
})
export class ForgotPasswordComponent implements OnInit {

	loading = false;
	submitBtnText: string = "Reset Password";
	forgotPasswordForm: FormGroup;

	email = new FormControl('', [
		Validators.required,
		Validators.email
	]);

	errors = [];
	formErrors = { email: "" };

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private authenticationService: AuthenticationService,
		private formBuilder: FormBuilder,
		private titleService: Title,
		private mainC: MainComponent) { }

	ngOnInit() {
		var credentials = {
			email: this.email
		};

		this.forgotPasswordForm = this.formBuilder.group(credentials);
		var t = this;
		$('#forgot_password').modal("show");
		$('#forgot_password').on('hidden.bs.modal', function (e) {
			t.closeForgotPassword();
		});
	}

	closeForgotPassword() {
		this.mainC.closeAll();
	}

	openSignup() {
		this.mainC.openSignup(1);
	}

	validate(name: string) {
		this.formErrors[name] = '';
		var control = this.forgotPasswordForm.get(name);
		if ((!control.pristine || control.touched) && !control.valid) {
			if (control.errors.required) {
				this.formErrors[name] = "This field is required.";
			}
			else if (control.errors.email) {
				this.formErrors[name] = "This Email is not valid.";
			}
			return 'has-danger';
		}
	}

	submit() {
		this.errors = [];
		this.toggleBtnState(false);

		if (this.email.valid) {

			this.authenticationService.forgotPassword(this.email.value)
				.subscribe(
				data => {
					//console.log(data);

					if (data.success) {
						var message = data.data.message;
						//console.log(message);

						alert(message);
						this.toggleBtnState(true);
						this.mainC.closeAll();
					}
					else {
						this.errors = data.data.message;
						this.toggleBtnState(true);
					}
				},
				error => {
					console.log(error);
					this.toggleBtnState(true);
				}
				);
		}
		else {
			this.errors.push("Please provide valid email first.");
		}
	}

	toggleBtnState(state) {
		if (state) {
			this.submitBtnText = "Reset Password";
			this.loading = false;
		}
		else {
			this.submitBtnText = "Submitting ...";
			this.loading = true;
		}
	}
}
