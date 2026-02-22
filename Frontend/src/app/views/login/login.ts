import { Component, inject } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ReactiveFormsModule , FormControl,FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { RequestClients } from '../../services/request-clients';
import { User } from '../../interfaces/user.interface';
import { switchMap, tap } from 'rxjs';
@Component({
  selector: 'app-login',
  imports: [ReactiveFormsModule,RouterLink, RouterLinkActive],
  templateUrl: './login.html',
  styleUrl: './login.css',
})
export class Login {

  private requestClient = inject(RequestClients);
  private router = inject(Router);
  errorMessage: string = '';
  
public form= new FormGroup({      
  email: new FormControl('',{nonNullable:true}),
  password :new FormControl('',{nonNullable:true})
})

public onClick() {
  const info = this.form.getRawValue();
  this.errorMessage = '';

  this.requestClient.login(info.email, info.password).pipe( //modifico el response por pipe para poder transformar datos
    // 1) guardar token
    tap(res => this.requestClient.saveToken(res.token)),
    // 2) pedir usuario autenticado (con el token)
    switchMap(() => this.requestClient.me()) //cuando termina lanza otra peticion 
  ).subscribe({
    next: (user: User) => {
      // 3) comprobar rol
      //debugger;
      if (user.roles.includes('ROLE_ADMIN')) {
        window.location.href = 'http://127.0.0.1:8000/';
        return;
      }
      
      this.router.navigate(['/']);
    },
    error: () => {
      this.errorMessage = 'Email o contraseña incorrectos';
      this.form.reset();
    }
  });
}
}
