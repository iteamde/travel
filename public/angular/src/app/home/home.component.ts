import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../_services/index';
import { Router, ActivatedRoute } from '@angular/router';
import { Title } from '@angular/platform-browser';

declare var jquery:any;
declare var $ :any;

@Component({
	selector: 'app-home',
	templateUrl: './home.component.html',
	styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

	constructor(
		private authenticationService: AuthenticationService,
		private router: Router,
		private titleService: Title) { }

	ngOnInit() {
		this.titleService.setTitle( "Travoo - Home" );
		$.getScript('assets/js/script.js');
	}

}
