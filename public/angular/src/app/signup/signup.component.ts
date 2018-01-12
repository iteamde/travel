import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AlertService, UserService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ConfirmPasswordValidator } from '../../_helpers/custom-validators';
import { User } from '../../_models/user.model';

declare var jquery: any;
declare var $: any;

@Component({
	selector: 'app-signup',
	templateUrl: './signup.component.html',
	styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {

	loading = false;
	signupBtnText: string = "Sign Up";
	signupForm: FormGroup;

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
		private formBuilder: FormBuilder) { }

	ngOnInit() {

		var credentials = {
			username: this.username,
			email: this.email,
			password: this.password,
			cpassword: this.cpassword,
			name: this.name,
			age: this.age,
			gender: this.gender
		}

		this.signupForm = this.formBuilder.group(credentials);
		this.signupErrors = {};
	}

	openLogin(id) {
		$('#' + id).modal("hide");
		$('#signUp').modal("show");
	}

	continueSignup() {
		this.errors = [];
		if(this.email.valid && this.username.valid && this.password.valid && this.cpassword.valid){
			$('#createAccount1').modal("hide");
			$('#createAccount2').modal("show");
		}
		else{
			this.errors.push("Please fill all fields with valid values first.")
		}
	}

	backToSignup() {
		$('#createAccount2').modal("hide");
		$('#createAccount1').modal("show");
	}

	validate(name: string){
		this.signupErrors[name] = '';
		var control = this.signupForm.get(name);
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

	signup()
	{
		this.errors = [];
		this.toggleSignup(false);

		var user: any = {};
		user.username = this.username.value;
		user.email = this.email.value;
		user.password = this.password.value;
		user.password_confirmation = this.cpassword.value;
		user.name = this.name.value;
		user.age = this.age.value;
		user.gender = this.gender.value;

		var credentials = {
			username : this.username.value,
			email : this.email.value,
			password : this.password.value,
			password_confirmation : this.cpassword.value,
			name : this.name.value,
			age : this.age.value,
			gender : this.gender.value
		}

		console.log(user);
		
		this.userService.create(user)
		.subscribe(
			data => {
				//console.log(data);
				var response = data.data;
				//console.log(response);

				if(data.status)
				{
					// close signup modal and open login model
					$('#createAccount1').modal("hide");
					$('#createAccount2').modal("hide");
					$('#signUp').modal("show");
				}
				else
				{
					this.errors = response.message;
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
