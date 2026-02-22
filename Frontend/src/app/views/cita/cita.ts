import { Component, inject } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { Router} from '@angular/router';
import { Appointment } from '../../interfaces/appointment.interface';
import { RequestAppointment } from '../../services/request-appointment';
import { first } from 'rxjs';

@Component({
  selector: 'app-cita',
  imports: [FormsModule, ReactiveFormsModule],
  templateUrl: './cita.html',
  styleUrl: './cita.css',
})
export class Cita {

  private requestAppointment = inject(RequestAppointment);
  private router = inject(Router);

  public form = new FormGroup({
    name: new FormControl('',{ nonNullable: true }),
    surname1: new FormControl('',{ nonNullable: true }),
    surname2: new FormControl(''),
    phone: new FormControl('',{ nonNullable: true }),
    email: new FormControl('',{ nonNullable: true }),
    datetime: new FormControl('',{ nonNullable: true }),
    agreeterms: new FormControl('',{ nonNullable: true }),
    type: new FormControl('',{ nonNullable: true }),
    firstTime: new FormControl(false ,{ nonNullable: true })

  })


 public onSubmit(event: Event) {
     const form = event.target as HTMLFormElement;
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
    }

    form.classList.add('was-validated')

    console.log(this.form)

    let info = this.form.getRawValue();
this.requestAppointment.setAppointmnet( info.name,info.surname1,info.surname2,info.phone,info.email,info.firstTime,info.datetime,info.type, info.agreeterms).subscribe({
      next: () => {
        // Redirigir al formulario
        this.router.navigate(['/index']);
      },
    });
 }
  }
