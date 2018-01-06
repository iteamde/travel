import { Component, OnInit } from '@angular/core';
declare var jquery:any;
declare var $ :any;

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  openLogin(id)
  {
    $('#'+id).modal("hide");
    $('#signUp').modal("show");
  }

  continueSignup()
  {
    $('#createAccount1').modal("hide");
    $('#createAccount2').modal("show");
  }
}
