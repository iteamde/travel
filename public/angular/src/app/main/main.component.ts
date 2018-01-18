import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

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
	progressWidth: string = "0%"

	constructor(private titleService: Title) { }

	ngOnInit() {
		this.titleService.setTitle("Travooo");
		$.getScript('assets/js/script.js');
	}

	closeExistingSignups(){
		$( ".modal" ).each(function( index ) {
			if($(this).hasClass('show'))
			{
				$(this).modal('hide');
			}
		});
	}

	openLogin() {
		this.titleService.setTitle("Travoo - Login");
		$('.signUpProgress').hide();
		// close all other modals and open login model
		this.closeExistingSignups();
		$('#logIn').modal("show");
		this.signupStepCount = 0;
	}

	openSignup(stepNum) {
		//stepNum = 5;
		this.titleService.setTitle("Travoo - Signup");
		// close all other modals and open login model
		this.closeExistingSignups();
		$('.signUpProgress').show();
		$('#signUpStep'+stepNum).modal('show');
		this.signupStepCount = stepNum;
		this.progressWidth = (this.signupStepCount/this.signupSteps)*100 + "%";
	}
}
