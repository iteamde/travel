import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AuthenticationService } from '../../_services/index';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BsDatepickerConfig } from 'ngx-bootstrap/datepicker';
import {CreateTripPlan} from '../../_services/createTripPlan.service';
declare var jquery: any;
declare var $: any;

@Component({
  selector: 'app-create-trip-plan',
  templateUrl: './create-trip-plan.component.html',
  styleUrls: ['./create-trip-plan.component.scss'],
  providers:[CreateTripPlan]
})
export class CreateTripPlanComponent implements OnInit {

  constructor(private route: ActivatedRoute,
		private router: Router,
		private authenticationService: AuthenticationService,
		private formBuilder: FormBuilder,private _createTripPlan:CreateTripPlan) { }

  createTripPlanStepForm: FormGroup;
  bsConfig: Partial<BsDatepickerConfig>={ containerClass: 'theme-blue' };
  ngOnInit() {
    $('#createTripPlanStep').modal("show");

    this.createTripPlanStepForm = this.formBuilder.group({
			tital: new FormControl('', [
        Validators.required
      ]),
      date: new FormControl(null, [
        Validators.required
      ]),
      privacy : new FormControl(1, [
        Validators.required
      ])
    });
    
  }

  setPrivacy(v){
    this.createTripPlanStepForm.controls.privacy.patchValue(v*1)
  }

  createTripPlan(){
    if(this.createTripPlanStepForm.valid && this.authenticationService.user){
      var temp=this.createTripPlanStepForm.value;
      temp.user_id =this.authenticationService.user.id;
      this._createTripPlan.createTripPlanStepForm(temp).subscribe(res=>{
        console.log(res)
      })
    }
  }

}
