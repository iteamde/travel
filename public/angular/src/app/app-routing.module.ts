import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './home/components/home/home.component';
import { MainComponent } from './main/main.component';
import { LoginComponent } from './auth/components/login/login.component';
import { Step1Component } from './auth/components/signup/step1/step1.component';
import { SignupComponent } from './auth/components/signup/signup.component';
import { Step2Component } from './auth/components/signup/step2/step2.component';
import { Step3Component } from './auth/components/signup/step3/step3.component';
import { Step4Component } from './auth/components/signup/step4/step4.component';
import { Step5Component } from './auth/components/signup/step5/step5.component';
import { ForgotPasswordComponent } from './auth/components/forgot-password/forgot-password.component';
import { ResetPasswordComponent } from './auth/components/reset-password/reset-password.component';
import { TwitterCallbackComponent } from './pages/components/twitter-callback/twitter-callback.component';
import { PrivacyPolicyComponent } from './pages/components/privacy-policy/privacy-policy.component';
import { TermsOfServiceComponent } from './pages/components/terms-of-service/terms-of-service.component';
import { LogoutComponent } from './auth/components/logout/logout.component';
import { TripComponent } from './create-trip/components/trip/trip.component';
import {NonAuthGuard} from "./auth/guards/non-auth.guard";

const routes: Routes = [
    {
		path: '', component: MainComponent,
		canActivate: [NonAuthGuard],
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
			{path: 'twitter-callback', component: TwitterCallbackComponent},
		]
  	},
  	{
      	path: 'home',
		component: HomeComponent,
		canActivate: [AuthGuard]
	},
	{
		path: 'twitter-callback',
		component: TwitterCallbackComponent
	},
	{
		path: 'privacy-policy',
		component: PrivacyPolicyComponent
	},
	{
		path: 'terms-of-service',
		component: TermsOfServiceComponent
	},
	{
		path: 'logout',
		component: LogoutComponent
	},
	{
		path:'createTripPlan',
		component:CreateTripPlanComponent,
		canActivate: [AuthGuard]
	},
  {
    path:'trip/create',
    component: TripComponent,
    canActivate: [AuthGuard]
  },
	// otherwise redirect to home
	{ path: '**', redirectTo: '/' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
