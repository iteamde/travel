import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AlertService, AuthenticationService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Title } from '@angular/platform-browser';

declare var jquery:any;
declare var $ :any;

@Component({
  	selector: 'app-login',
  	templateUrl: './login.component.html',
  	styleUrls: ['./login.component.scss']
})

export class LoginComponent implements OnInit {

    loading = false;
    returnUrl: string;
    loginBtnText: string = "Login";
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
		private alertService: AlertService,
		private formBuilder: FormBuilder,
		private titleService: Title ) { }

    ngOnInit() {
		this.titleService.setTitle( "Travoo - Login" );

		// reset login status
		this.authenticationService.logout();
		
		if (this.authenticationService.isLoggedIn()) {
			this.router.navigate(['/home']);
		}

        // get return url from route parameters or default to '/home'
		this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/home';
		
		this.loginForm = this.formBuilder.group({
		email: this.email,
		password: this.password
		});
    }

    openSignup()
    {
		this.titleService.setTitle( "Travoo - Signup" );
      	$('#signUp').modal("hide");
      	$('#createAccount1').modal("show");
	}
	
	setClassEmail() {
		if((!this.email.pristine || this.email.touched) && !this.email.valid)
		{
			if(this.email.errors.required)
			{
				this.emailMsg = "Email is required.";
			}
			else if(this.email.errors.email){
				this.emailMsg = "Email is not valid.";
			}
			return 'has-danger';
		}
	  }
	
	  setClassPassword() {
		if((!this.password.pristine || this.password.touched) && !this.password.valid)
		{
			if(this.password.errors.required)
			{
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
				$('#signUp').modal("hide");
				$.blockUI({ message: '<h4> Loading...  Please wait! </h4>' });

				// If login is successful, redirect to the home state
				var t = this;
				setTimeout(function() {
					$.unblockUI();
					t.router.navigate([t.returnUrl]);
				}, 1000);
			} else {
				this.errors.push(result);
				this.toggleLogin(true);
			}
		});
    }

    toggleLogin(state){
    	if(state)
      	{
        	this.loginBtnText = "Login";
        	this.loading = false;
      	}
      	else
      	{
        	this.loginBtnText = "Checking Login ...";
        	this.loading = true;
      	}
    }
}
