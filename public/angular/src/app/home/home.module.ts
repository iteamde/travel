import { NgModule } from '@angular/core';
import { CreatePostComponent } from './components/create-post/create-post.component';
import { HeaderComponent } from './components/header/header.component';
import { HomeComponent } from './components/home/home.component';
import { LeftSideBarComponent } from './components/left-side-bar/left-side-bar.component';
import { RightSideBarComponent } from './components/right-side-bar/right-side-bar.component';
import { SideFooterComponent } from './components/side-footer/side-footer.component';
import { SharedModule } from '../shared/shared.module';
import {PostsComponent} from "./components/posts/posts.component";

NgModule({
  imports: [
    SharedModule
  ],
  declarations: [
    HomeComponent,
    HeaderComponent,
    CreatePostComponent,
    LeftSideBarComponent,
    RightSideBarComponent,
    SideFooterComponent,
    PostsComponent
    ]
});
