import { Component } from '@angular/core';
import { Carrusel } from "../../components/carrusel/carrusel";
import { RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-index',
  imports: [Carrusel, RouterLink , RouterLinkActive],
  templateUrl: './index.html',
  styleUrl: './index.css',
})
export class Index {

}
