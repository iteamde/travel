import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';
import { Router, ActivatedRoute } from '@angular/router';

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

	constructor(
		private route: ActivatedRoute,
		private router: Router,
		private titleService: Title) { }

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

	closeAll() {
		this.titleService.setTitle("Travoo");
		$('.signUpProgress').hide();
		$('.modal-backdrop').remove();
		$('body').removeClass('modal-open');
		this.signupStepCount = 0;
		this.router.navigate(['/']);
	}

	openLogin() {
		this.titleService.setTitle("Travoo - Login");
		$('.signUpProgress').hide();
		$('.modal-backdrop').remove();
		this.signupStepCount = 0;
		this.router.navigate(['/login']);
	}

	openSignup(stepNum) {
		this.titleService.setTitle("Travoo - Signup");
		$('.signUpProgress').show();
		$('.modal-backdrop').remove();
		this.signupStepCount = stepNum;
		this.progressWidth = (this.signupStepCount/this.signupSteps)*100 + "%";
		if(stepNum == 1)
		{
			this.router.navigate(['/signup']);
		}
		else
		{
			this.router.navigate(['/signup/step'+stepNum]);
		}
	}
}
