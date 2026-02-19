import { Component, Input , Output ,EventEmitter } from '@angular/core';

@Component({
  selector: 'app-cards',
  imports: [],
  templateUrl: './cards.html',
  styleUrl: './cards.css',
})
export class Cards {
  @Input() name:string = '';
  @Input() url:string ='';
  @Input() price:number=0;

@Output() showInfo = new EventEmitter<boolean>(); 

  public onClick(){
    this.showInfo.emit(true)

  }
}
