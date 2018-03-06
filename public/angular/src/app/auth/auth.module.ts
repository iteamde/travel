import {NgModule} from "@angular/core";
import {LoginComponent} from "./components/login/login.component";
import {LogoutComponent} from "./components/logout/logout.component";
import {ForgotPasswordComponent} from "./components/forgot-password/forgot-password.component";
import {ResetPasswordComponent} from "./components/reset-password/reset-password.component";
import {SignupComponent} from "./components/signup/signup.component";
import {Step1Component} from "./components/signup/step1/step1.component";
import {Step2Component} from "./components/signup/step2/step2.component";
import {Step3Component} from "./components/signup/step3/step3.component";
import {Step4Component} from "./components/signup/step4/step4.component";
import {Step5Component} from "./components/signup/step5/step5.component";

@NgModule({
  imports: [],
  declarations: [
    LoginComponent,
    LogoutComponent,
    ForgotPasswordComponent,
    ResetPasswordComponent,
    SignupComponent,
    Step1Component,
    Step2Component,
    Step3Component,
    Step4Component,
    Step5Component,
  ],
  providers: []
})

export class AuthModule {}
