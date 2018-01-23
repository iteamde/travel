import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { AuthenticationService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ConfirmPasswordValidator } from '../../_helpers/custom-validators';
import { User } from '../../_models/user.model';
import { Title } from '@angular/platform-browser/';
import { MainComponent } from '../main/main.component';
import { Subscription } from 'rxjs/Subscription';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-reset-password',
	templateUrl: './reset-password.component.html',
	styleUrls: ['./reset-password.component.scss']
})
export class ResetPasswordComponent implements OnInit {

	token: string;
	loading = false;
	submitBtnText: string = "Update Password";
	resetPasswordForm: FormGroup;

	password = new FormControl('', [
		Validators.required
	]);
	cpassword = new FormControl('', [
		Validators.required,
		ConfirmPasswordValidator(this.password)
	]);

	errors = [];
	formErrors = { password: "", cpassword: "" };
	private sub: Subscription;

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private authenticationService: AuthenticationService,
		private formBuilder: FormBuilder,
		private titleService: Title,
		private mainC: MainComponent) { }

	ngOnInit() {

		// XLiBnE90YMuZedwo7zZA15163700355V5n7Sx8GwzHJsTpLMK7
		
		// assign the subscription to a variable so we can unsubscribe to prevent memory leaks
		this.sub = this.route.queryParams.subscribe((params: Params) => {
			this.token = params['token'];
		});

		if(this.token == undefined)
		{
			this.mainC.openForgotPassword();
		}

		var credentials = {
			password: this.password,
			cpassword: this.cpassword
		};

		this.resetPasswordForm = this.formBuilder.group(credentials);
		var t = this;
		$('#reset_password').modal("show");
		$('#reset_password').on('hidden.bs.modal', function (e) {
			t.closeResetPassword();
		});
	}

	ngOnDestroy() {
		this.sub.unsubscribe();
	}

	closeResetPassword() {
		this.mainC.closeAll();
	}

	openSignup() {
		this.mainC.openSignup(1);
	}

	openLogin() {
		this.mainC.openLogin();
	}

	validate(name: string) {
		this.formErrors[name] = '';
		var control = this.resetPasswordForm.get(name);
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

		if (this.password.valid && this.cpassword.valid) {

			this.authenticationService.resetPassword(this.token, this.password.value, this.cpassword.value)
				.subscribe(
				data => {
					//console.log(data);

					if (data.success) {
						$('#reset_password').modal('hide');
						$('#reset_success').modal('show');
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
			this.errors.push("Please fill all required fields with valid values first.");
		}
	}

	toggleBtnState(state) {
		if (state) {
			this.submitBtnText = "Update Password";
			this.loading = false;
		}
		else {
			this.submitBtnText = "Updating ...";
			this.loading = true;
		}
	}

}
