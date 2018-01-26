import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthGuard } from '../_guards/index';
import { HomeComponent } from './home/home.component';
import { MainComponent } from './main/main.component';
import { LoginComponent } from './login/login.component';
import { Step1Component } from './signup/step1/step1.component';
import { SignupComponent } from './signup/signup.component';
import { Step2Component } from './signup/step2/step2.component';
import { Step3Component } from './signup/step3/step3.component';
import { Step4Component } from './signup/step4/step4.component';
import { Step5Component } from './signup/step5/step5.component';
import { ForgotPasswordComponent } from './forgot-password/forgot-password.component';
import { ResetPasswordComponent } from './reset-password/reset-password.component';

const routes: Routes = [
    {
      	path: '', component: MainComponent,
		children: [
			{path: 'login', component: LoginComponent},
			{path: 'signup', component: SignupComponent,
				children: [
					{path: '', component: Step1Component},
					{path: 'step1', component: Step1Component},
					{path: 'step2', component: Step2Component},
					{path: 'step3', component: Step3Component},
					{path: 'step4', component: Step4Component},
					{path: 'step5', component: Step5Component}
				]
			},
			{path: 'forgot-password', component: ForgotPasswordComponent},
			{path: 'reset-password', component: ResetPasswordComponent},
		]
  	},
  	{
      	path: 'home',
		component: HomeComponent,
		canActivate: [AuthGuard]
	},
	
	// otherwise redirect to home
	{ path: '**', redirectTo: 'login' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
