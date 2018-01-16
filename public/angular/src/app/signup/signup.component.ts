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

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private userService: UserService,
		private alertService: AlertService,
		private formBuilder: FormBuilder,
		private titleService: Title) { }

	ngOnInit() {	
	}

}
