import { Component, inject } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Router, RouterLink, RouterLinkActive } from '@angular/router';
import { RequestClients } from '../../services/request-clients';

@Component({
  selector: 'app-registro',
  imports: [RouterLink, RouterLinkActive, FormsModule, ReactiveFormsModule],
  templateUrl: './registro.html',
  styleUrl: './registro.css',
})
export class Registro {

  private requestClient = inject(RequestClients);
  private router = inject(Router);

  public form = new FormGroup({
    name: new FormControl('', { nonNullable: true }),
    surname1: new FormControl('', { nonNullable: true }),
    surname2: new FormControl(''),
    phone: new FormControl(''),
    email: new FormControl('', { nonNullable: true }),
    password: new FormControl('', { nonNullable: true })
  })



  public onSubmit(event: Event) {
    const form = event.target as HTMLFormElement;
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
    }

    form.classList.add('was-validated')



    let info = this.form.getRawValue();

    this.requestClient.register( info.name, info.surname1 , info.surname2 , info.phone, info.email, info.password).subscribe({
      next: () => {
        // Redirigir al formulario
        this.router.navigate(['/login']);
      },
    });
  }
}

