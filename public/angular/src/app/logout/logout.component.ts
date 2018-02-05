import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../_services/index';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
  styleUrls: ['./logout.component.scss']
})
export class LogoutComponent implements OnInit {

  constructor(
    private authService: AuthenticationService,
    private route: ActivatedRoute,
		private router: Router,) { }

  ngOnInit() {
    // reset login status
    this.authService.logout();
    // not logged in so redirect to login page with the return url
    this.router.navigate(['/login']);
  }

}
