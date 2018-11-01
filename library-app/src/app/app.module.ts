import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { LoginComponent } from './user/page/login/login.component';
import { RegisterComponent } from './user/page/register/register.component';
import { HomeComponent } from './user/page/home/home.component';
import { LibraryComponent } from './user/page/library/library.component';
import { ProjectViewComponent } from './user/page/project-view/project-view.component';
import { ProjectCreateComponent } from './user/page/project-create/project-create.component';
import { FooterComponent } from './user/component/footer/footer.component';
import { AppRoutingModule } from './app-routing/app-routing.module';
import { HeaderComponent } from './user/component/header/header.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    LibraryComponent,
    ProjectViewComponent,
    ProjectCreateComponent,
    HeaderComponent,
    FooterComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
