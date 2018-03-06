import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import {HttpModule, Http} from '@angular/common/http';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';

import { AppRoutingModule } from './app-routing.module';

// NG Bootstrap
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

// used to create fake backend
//import { fakeBackendProvider } from '../_helpers/index';
import { AlertComponent } from '../_directives/index';
import { AuthGuard, NonAuthGuard } from '../_guards/index';
import { JwtInterceptor } from '../_helpers/index';
import { AlertService, AuthenticationService, UserService, CountriesService, PlacesService , TravelStylesService, FacebookService, TwitterService} from './core/services/index';

import { AppComponent } from './app.component';
import { MainComponent } from './main/main.component';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
import {AuthModule} from "./auth/auth.module";
import {CoreModule} from "./core/core.module";
import {PagesModule} from "./pages/pages.module";
import {CreateTripModule} from "./create-trip/create-trip.module";

@NgModule({
    imports: [
      BrowserModule,
      AppRoutingModule,
      FormsModule,
      HttpClientModule,
      Http,
      ReactiveFormsModule,
      InfiniteScrollModule,
      BsDatepickerModule.forRoot(),
      NgbModule.forRoot(),

      AuthModule,
      CoreModule,
      PagesModule,
      CreateTripModule
    ],
    declarations: [
      AppComponent,
      MainComponent
    ],
    providers: [
        AuthGuard,
        NonAuthGuard,
        AlertService,
        AuthenticationService,
        UserService,
        {
            provide: HTTP_INTERCEPTORS,
            useClass: JwtInterceptor,
            multi: true
        },
        CountriesService,
        PlacesService,
        TravelStylesService,
        FacebookService,
        TwitterService

        // provider used to create fake backend
        //fakeBackendProvider
    ],
    bootstrap: [AppComponent]
})

export class AppModule { }
