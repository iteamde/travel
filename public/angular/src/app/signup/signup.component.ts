import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AlertService, UserService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ConfirmPasswordValidator } from '../../_helpers/custom-validators';
import { User } from '../../_models/user.model';
import { Title } from '@angular/platform-browser/';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup',
	templateUrl: './signup.component.html',
	styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {

	loading = false;
	signupContinueBtnText: string = "Continue";
	signupBtnText: string = "Sign Up";
	signupForm1: FormGroup;
	signupForm2: FormGroup;

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
		private titleService: Title) { }

	ngOnInit() {

		var step1 = {
			username: this.username,
			email: this.email,
			password: this.password,
			cpassword: this.cpassword
		}
		var step2 = {
			name: this.name,
			age: this.age,
			gender: this.gender
		}

		this.signupForm1 = this.formBuilder.group(step1);
		this.signupForm2 = this.formBuilder.group(step2);
		this.signupErrors = {};
	}

	openLogin() {
		this.titleService.setTitle( "Travoo - Login" );
		// close signup modals and open login model
		$('#createAccount1').modal("hide");
		$('#createAccount2').modal("hide");
		$('#signUp').modal("show");
	}

	backToSignup() {
		//$('#createAccount2').modal("hide");
		//$('#createAccount1').modal("show");
	}

	validate(name: string){
		this.signupErrors[name] = '';
		var control = this.signupForm1.get(name) || this.signupForm2.get(name);
		if((!control.pristine || control.touched) && !control.valid)
		{
			if(control.errors.required)
			{
				this.signupErrors[name] = "This field is required.";
			}
			else if(control.errors.email)
			{
				this.signupErrors[name] = "This Email is not valid.";
			}
			else if(control.errors.ConfirmPassword)
			{
				this.signupErrors[name] = "Password must be repeated exactly.";
			}
			return 'has-danger';
		}
	}

	continueStep1() {
		this.errors = [];
		this.signupContinueBtnText = "Signing up ...";
		this.loading = true;

		var user: any = {};
		user.username = this.username.value;
		user.email = this.email.value;
		user.password = this.password.value;
		user.password_confirmation = this.cpassword.value;

		if(this.email.valid && this.username.valid && this.password.valid && this.cpassword.valid){

			this.userService.create(user)
			.subscribe(
				data => {

					//console.log(data);

					if(data.success)
					{
						var id = data.data;
						//console.log(id);
						localStorage.setItem('signupId', id );

						this.signupContinueBtnText = "Continue";
						this.loading = false;

						$('#createAccount1').modal("hide");
						$('#createAccount2').modal("show");
					}
					else
					{
						this.errors = data.data.message;
						this.signupContinueBtnText = "Continue";
						this.loading = false;
					}
				},
				error => {
					console.log(error);
					//this.alertService.error(error);
					this.signupContinueBtnText = "Continue";
					this.loading = false;
				}
			);
		}
		else{
			this.errors.push("Please fill all fields with valid values first.")
		}
	}

	continueStep2()
	{
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

				if(data.success)
				{
					var response = data.data;
					//console.log(response);
					// close signup modals and open login model
					this.openLogin();
				}
				else
				{
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

	toggleSignup(state){
		if(state)
		{
			this.signupBtnText = "Sign Up";
			this.loading = false;
		}
		else
		{
			this.signupBtnText = "Signing Up ...";
			this.loading = true;
		}
	}

}
