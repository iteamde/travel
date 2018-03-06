import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class TripService {

  /**
   * Default constructor
   * @param http
   */
  constructor(private http: HttpClient) {
  }

  /**
   * Creates new trip
   */
  createTrip(data): Observable<Object> {
    return this.http.post('/trips/new', data);
  }
}
