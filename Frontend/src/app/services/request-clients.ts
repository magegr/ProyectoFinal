import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})

export class RequestClients {
  
  private http = inject(HttpClient)

  // public getClient():Observable<>{
  //   return this.http.get<>("http://localhost:8000/api/user")

  // }

  public getClient():Observable<User>{
  return this.http.post<User>("http://localhost:8000/api/user")

  }

}
