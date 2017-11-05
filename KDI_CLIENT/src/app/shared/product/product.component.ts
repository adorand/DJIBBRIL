import { Component, Input , OnInit , ViewChild } from '@angular/core';
import { Produit } from '../../layout/models/produit.model';
import { Client } from '../../layout/models/client.model';
import { DetailCommande } from '../../layout/models/detailcommande.model';
import { Surface } from '../../layout/models/surface.model';
import {CookieService} from 'ngx-cookie-service';
import {ShoppingCartService} from '../../layout/services/shopping-cart.service';
import {ShoppingCart} from '../../layout/models/shopping-cart.model';
import {CartItem} from '../../layout/models/cart-item.model';


@Component({
    selector: 'app-product',
    templateUrl: './product.component.html',
    styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

    @Input('produit') produit: Produit;
    @Input('surface') surface: Surface;
    client: Client;
    panier: ShoppingCart;
    cartItem: CartItem;
    detailcommande: DetailCommande;


    // TODO: INTÉGRATION DU MODULE AJOUT A LA LISTE ET PAGINATION AU NIVEAU DES PRODUITS

    nom: string;

    constructor( private cookies: CookieService, private shoppingCartService: ShoppingCartService) { }

    ngOnInit() {
        this.client = this.cookies.check('client') ? JSON.parse(this.cookies.get('client')) as Client : null;

        this.shoppingCartService.get().forEach(value => {
            this.panier = value;
            let existe = false;
            this.panier.items.forEach(item => {
                if (item.productId === this.produit.code) {
                    this.cartItem = item;
                    existe = true;
                }
            });
            existe === false ? this.cartItem = new CartItem() : '' ;
        });


    }

    actionToCommande(action: string) {
        this.cartItem = this.shoppingCartService.actionItem(this.produit, action);
    }
}
