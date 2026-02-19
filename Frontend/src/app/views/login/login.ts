import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ReactiveFormsModule , FormControl,FormGroup } from '@angular/forms';
@Component({
  selector: 'app-login',
  imports: [ReactiveFormsModule,RouterLink, RouterLinkActive],
  templateUrl: './login.html',
  styleUrl: './login.css',
})
export class Login {

  
public form= new FormGroup({
  email: new FormControl('',{nonNullable:true}),
  password :new FormControl('',{nonNullable:true})
})

public onClick(){
  let info = this.form.getRawValue();

}


}
