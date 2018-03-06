import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup} from '@angular/forms';
import {TripService} from "../../../core/services/trip.service";

@Component({
  selector: 'app-trip',
  templateUrl: 'trip.component.html',
  styleUrls: ['trip.component.scss']
})
export class TripComponent implements OnInit {

  /**
   * Holds user's input data
   */
  private tripForm: FormGroup;

  /**
   * User JWT token
   * @type {string}
   */
  private jwtToken: string = 'token'/*localStorage.getItem('currentUser').token;*/

  /**
   * Default constructor
   * @param fb
   * @param tripService
   */
  constructor(private fb: FormBuilder, private tripService: TripService) {}

  ngOnInit() {
    this.tripForm = this.fb.group({
      'user_id': this.jwtToken,
      'title': '',
      'date': '',
      'privacy': 1
    })
  }

  /**
   * On form submit
   */
  onSubmit() {
    this.tripService.createTrip(this.tripForm.value).subscribe();
  }

}
