import {Component, Input, OnInit} from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {Commande} from '../../layout/models/commande.model';
import {ShoppingCart} from '../../layout/models/shopping-cart.model';
import {CartItem} from '../../layout/models/cart-item.model';
import {ShoppingCartService} from '../../layout/services/shopping-cart.service';
import {Produit} from '../../layout/models/produit.model';
import {ProduitService} from '../../layout/services/produit.service';
import {SousCategorie} from '../../layout/models/souscategorie.model';
import {Categorie} from '../../layout/models/categorie.model';
import {Surface} from '../../layout/models/surface.model';

@Component({
  selector: 'app-product-histo',
  templateUrl: './product-histo.component.html',
  styleUrls: ['./product-histo.component.css']
})
export class ProductHistoComponent implements OnInit {

    @Input('detail') detail: CartItem;
    @Input('liste') liste: boolean;
    panier: ShoppingCart;

    constructor(private shoppingCartService: ShoppingCartService, private produitService: ProduitService) { }

    ngOnInit() {

        /*this.shoppingCartService.get().forEach(value => {
            this.panier = value;
            let existe = false;
            this.panier.items.forEach(item => {
                if (item.productId === this.detail.productId) {
                    this.detail.quantity = item.quantity;
                    existe = true;
                }
            });
            existe === false ? this.detail = new CartItem() : '' ;
        });*/

    }


    actionToCommande(action: string) {
        const prod = new Produit();
        prod.code = this.detail.productId;
        prod.designation = this.detail.productDesignation;
        this.detail.quantity = this.shoppingCartService.actionItem(prod, action).quantity;
    }

}
