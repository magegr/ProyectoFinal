import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from '../interfaces/user.interface';

@Injectable({
  providedIn: 'root'
})
export class RequestClients {
  private http = inject(HttpClient);
  private apiUrl = 'http://localhost:8000/api';

 public me(): Observable<User> {
  return this.http.get<User>(
    `${this.apiUrl}/user/me`,
    { headers: this.getAuthHeaders() }
  );
}
  
  // Registro de usuario
  register(name:string , surname1:string, surname2:string|null , phone:string|null, email: string, password: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/register`, { name , surname1 , surname2 , phone , email, password });
  }

  // Login - devuelve el token
  login(email: string, password: string): Observable<any> {
    return this.http.post(`${this.apiUrl}/login_check`, { email, password });
  }

  // Guardar token en localStorage
  saveToken(token: string): void {
    localStorage.setItem('jwt_token', token);
  }

  // Obtener token
  getToken(): string | null {
    return localStorage.getItem('jwt_token');
  }

  // Eliminar token (logout)
  // logout(): void {
  //   localStorage.removeItem('jwt_token');
  // }

  // Comprobar si esta logueado
  // isLoggedIn(): boolean {
  //   return this.getToken() !== null;
  // }

  // Crear headers con el token para peticiones autenticadas
  getAuthHeaders(): HttpHeaders {
   const token = this.getToken();
   return new HttpHeaders({
       'Authorization': `Bearer ${token}`
   });
   }
}
