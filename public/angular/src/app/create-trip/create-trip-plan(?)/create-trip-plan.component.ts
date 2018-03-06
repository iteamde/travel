import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {NgbModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import { AuthenticationService } from '../../_services/index';

@Component({
	selector: 'app-create-trip-plan',
	templateUrl: 'create-trip-plan.component.html',
	styleUrls: ['create-trip-plan.component.scss']
})
export class CreateTripPlanComponent implements OnInit {

	privacy: number = 1;

	constructor(private modalService: NgbModal, private http: HttpClient, private authenticationService: AuthenticationService) {}

	ngOnInit() {}

	open(content) {
		this.privacy = 1;
		this.modalService.open(content, {size: 'lg'}).result.then((result) => {}, (reason) => {});
	}

	setPrivacy(type) {
		this.privacy = type;
	}

	saveTrip(form) {
		console.log(this.authenticationService);

		let data = form.value;
		data.user_id = this.authenticationService.user.id;
		data.privacy = this.privacy;
		this.http.post('/api/trips/new', data).subscribe(data => {

		}, error => {

		});
	}

}
