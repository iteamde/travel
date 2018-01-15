import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthGuard } from '../_guards/index';
import { HomeComponent } from './home/home.component';
import { MainComponent } from './main/main.component';

const routes: Routes = [
    {
      	path: '',
      	component: MainComponent
  	},
  	{
      	path: 'home',
		component: HomeComponent,
		canActivate: [AuthGuard]
	},
	
	// otherwise redirect to home
	{ path: '**', redirectTo: '' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
