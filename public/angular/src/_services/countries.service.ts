import { Injectable } from '@angular/core';

import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Observable } from 'rxjs';
import 'rxjs/add/operator/map'

import { AuthenticationService } from '../_services/authentication.service';
import { ManagerService } from './manager.service';

@Injectable()
export class CountriesService extends ManagerService {
	constructor(
		private http: Http,
		private authenticationService: AuthenticationService) {
		super();
	}

	loadMore(data) {
		// add authorization header with jwt token
		let headers = new Headers({ 'Authorization': 'Bearer ' + "as" });
		let options = new RequestOptions({ body: data, headers: headers });

		// get users from api
		return this.http.post(this.apiPrefix + '/countries/search', data)
			.map((response: Response) => response.json());
	}
}
