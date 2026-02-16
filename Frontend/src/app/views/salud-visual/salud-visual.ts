import { Component } from '@angular/core';
import { Carrusel } from '../../components/carrusel/carrusel';
import { Cards } from '../../components/cards/cards';

@Component({
  selector: 'app-salud-visual',
  imports: [Carrusel, Cards],
  templateUrl: './salud-visual.html',
  styleUrl: './salud-visual.css',
})
export class SaludVisual {

}
