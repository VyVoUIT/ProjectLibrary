import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from '../user/page/home/home.component';
import { LoginComponent } from '../user/page/login/login.component';
import { RegisterComponent } from '../user/page/register/register.component';
import { ProjectViewComponent } from '../user/page/project-view/project-view.component';
import { ProjectCreateComponent } from '../user/page/project-create/project-create.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'project-view', component: ProjectViewComponent },
  { path: 'create', component: ProjectCreateComponent}
];
@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule { }
