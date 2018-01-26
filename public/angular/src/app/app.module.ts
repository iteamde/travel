import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { HttpModule } from '@angular/http';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';

import { AppRoutingModule } from './app-routing.module';

// used to create fake backend
//import { fakeBackendProvider } from '../_helpers/index';
import { AlertComponent } from '../_directives/index';
import { AuthGuard } from '../_guards/index';
import { JwtInterceptor } from '../_helpers/index';
import { AlertService, AuthenticationService, UserService, CountriesService, PlacesService , TravelStylesService, FacebookService, TwitterService} from '../_services/index';

import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { MainComponent } from './main/main.component';
import { SignupComponent } from './signup/signup.component';
import { HomeComponent } from './home/home.component';
import { HeaderComponent } from './header/header.component';
import { LeftSideBarComponent } from './left-side-bar/left-side-bar.component';
import { SideFooterComponent } from './side-footer/side-footer.component';
import { RightSideBarComponent } from './right-side-bar/right-side-bar.component';
import { PostsComponent } from './posts/posts.component';
import { CreatePostComponent } from './create-post/create-post.component';
import { Step1Component } from './signup/step1/step1.component';
import { Step2Component } from './signup/step2/step2.component';
import { Step3Component } from './signup/step3/step3.component';
import { Step4Component } from './signup/step4/step4.component';
import { Step5Component } from './signup/step5/step5.component';
import { ForgotPasswordComponent } from './forgot-password/forgot-password.component';
import { ResetPasswordComponent } from './reset-password/reset-password.component';

@NgModule({
    imports: [
      BrowserModule,
      AppRoutingModule,
      FormsModule,
      HttpClientModule,
      HttpModule,
      ReactiveFormsModule,
      InfiniteScrollModule
    ],
    declarations: [
      AppComponent,
      LoginComponent,
      MainComponent,
      SignupComponent,
      AlertComponent,
      HomeComponent,
      HeaderComponent,
      LeftSideBarComponent,
      SideFooterComponent,
      RightSideBarComponent,
      PostsComponent,
      CreatePostComponent,
      Step1Component,
      Step2Component,
      Step3Component,
      Step4Component,
      Step5Component,
      ForgotPasswordComponent,
      ResetPasswordComponent
    ],
    providers: [
        AuthGuard,
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