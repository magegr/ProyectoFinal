import { Component ,Input , Output ,EventEmitter } from '@angular/core';

@Component({
  selector: 'app-info-product',
  imports: [],
  templateUrl: './info-product.html',
  styleUrl: './info-product.css',
})
export class InfoProduct {
@Input() url:string = '';
@Input() name:string = '';
@Input() price:number = 0;
@Input() gender:string|null='';
@Input() trend:string|null='';
@Input() mount_type:string|null='';
@Input() material:string|null='';
@Input() color:string|null='';
@Input() diameter:number|null=0;
@Input() stock:number|null=0;
@Input() duration:string|null='';
@Input() graduation :string|null='';

}
