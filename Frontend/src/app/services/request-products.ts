import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Products } from '../interfaces/product.interface';

@Injectable({
  providedIn: 'root',
})
export class RequestProducts {
  
  private http = inject(HttpClient)

  public getProduct():Observable<Products[]>{
    return this.http.get<Products[]>("http://localhost:8000/api/product")
  }
}
