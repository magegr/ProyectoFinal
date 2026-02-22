import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Appointment } from '../interfaces/appointment.interface';

@Injectable({
  providedIn: 'root',
})
export class RequestAppointment {

   private http = inject(HttpClient)
    private apiUrl = 'http://localhost:8000/api';

    public setAppointmnet (name:string , surname1:string, surname2:string|null ,phone:string, email:string,  firstTime:boolean, datetime:string,   type: string, agreeTerms: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/appointment`, { name , surname1 , surname2 ,phone, email,firstTime, datetime , type, agreeTerms  });
  }
}
