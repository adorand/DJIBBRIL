import { Component, Input , OnInit , ViewChild } from '@angular/core';
import {ProduitClass} from '../../layout/services/produit/produit.class';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {UserClass} from '../../layout/services/User/user.class';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

  @Input('produit') produit: ProduitClass;
  @Input('surface') surface: boolean;
  @LocalStorage('user') user: UserClass[];

  constructor(private storage: LocalStorageService) { }

  ngOnInit() {
  }

}
