import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../_services/index';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor(
    private authenticationService: AuthenticationService,
    private router: Router) { }

  ngOnInit() {
    if (!this.authenticationService.isLoggedIn()) {
			//this.router.navigate(['/']);
		}
  }

}
