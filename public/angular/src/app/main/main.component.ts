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

	constructor(private titleService: Title) { }

	ngOnInit() {
		this.titleService.setTitle("Travooo");
		$.getScript('assets/js/script.js');
	}

	openLogin() {
		$('#logIn').modal('show');
	}

	openSignup() {
		$('.step-header').show();
		$('#signUpStep1').modal('show');
	}

}
