import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ɵInternalFormsSharedModule } from "@angular/forms";

@Component({
  selector: 'app-registro',
  imports: [RouterLink, RouterLinkActive, ɵInternalFormsSharedModule],
  templateUrl: './registro.html',
  styleUrl: './registro.css',
})
export class Registro {

}
