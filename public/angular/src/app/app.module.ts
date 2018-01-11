import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
// used to create fake backend
//import { fakeBackendProvider } from '../_helpers/index';
import { AlertComponent } from '../_directives/index';
import { AuthGuard } from '../_guards/index';
import { JwtInterceptor } from '../_helpers/index';
import { AlertService, AuthenticationService, UserService } from '../_services/index';

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

@NgModule({
    imports: [
      BrowserModule,
      AppRoutingModule,
      FormsModule,
      HttpClientModule,
      ReactiveFormsModule
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
      CreatePostComponent
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

        // provider used to create fake backend
        //fakeBackendProvider
    ],
    bootstrap: [AppComponent]
})

export class AppModule { }