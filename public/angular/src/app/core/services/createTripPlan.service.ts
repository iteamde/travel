import { Injectable } from '@angular/core';
import { ManagerService } from './manager.service';
import { AuthenticationService } from './authentication.service';
import { Http, Headers, Response } from '@angular/http';

declare var jquery: any;
declare var $: any;

@Injectable()
export class CreateTripPlan extends ManagerService{

	constructor(private authService: AuthenticationService,private http: Http) {
		super();
	}

	createTripPlanStepForm(tripPlanStep): any {
        return this.http.post(this.apiPrefix+'trips/new', tripPlanStep)
    }
}
