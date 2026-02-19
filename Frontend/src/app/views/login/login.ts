import { Component, inject } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ReactiveFormsModule , FormControl,FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { RequestClients } from '../../services/request-clients';
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

public onClick(){
  let info = this.form.getRawValue();
  
    this.requestClient.login(info.email, info.password).subscribe({
      next: (response: { token: string; }) => {
        // Guardar el token
        this.requestClient.saveToken(response.token);
        // Redirigir al formulario
        this.router.navigate(['/']);
      },
      error: (err) => {
        this.errorMessage = 'Email o contraseña incorrectos';
        this.form.reset()
      }
    });
  }

}
