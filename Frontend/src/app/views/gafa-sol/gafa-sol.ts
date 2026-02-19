import { ChangeDetectorRef, Component , inject } from '@angular/core';
import { Carrusel} from '../../components/carrusel/carrusel';
import { Cards } from '../../components/cards/cards';
import { RequestProducts } from '../../services/request-products';
import { Products } from '../../interfaces/product.interface';
import { InfoProduct } from '../../components/info-product/info-product';
@Component({
  selector: 'app-gafa-sol',
 imports: [Carrusel, Cards, InfoProduct],
  templateUrl: './gafa-sol.html',
  styleUrl: './gafa-sol.css',
})
export class GafaSol {

 public info: Products[]  = []

 public cdr = inject(ChangeDetectorRef) //servicio para actualizar

  private data = inject(RequestProducts)
  public getProducts(){

   this.data.getProduct().subscribe(response =>{
        this.info=response.filter(product=>product.type==='sol')
        this.cdr.markForCheck()//actualiza el componente
    });
 
  }
  public infoId: Products | null = null;

  public onClick(i:number){
    this.infoId = this.info.find(product => product.id === i) ?? null;
    this.activo=true
    console.log(this.infoId)
  }

  public retorn(){
    console.log('hola')
    this.activo=false
     this.infoId = null;

  }

  public activo:boolean=false;


  public ngOnInit(){
    this.getProducts()
  }

}
