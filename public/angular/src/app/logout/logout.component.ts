import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../../_services/index';
import { MainComponent } from '../main/main.component';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
  styleUrls: ['./logout.component.scss']
})
export class LogoutComponent implements OnInit {

  constructor(
    private authService: AuthenticationService,
    private mainC: MainComponent) { }

  ngOnInit() {
    // reset login status
    this.authService.logout();
    this.mainC.openLogin;
  }

}
