import { Component, Input , OnInit , ViewChild } from '@angular/core';
import { Produit } from '../../layout/models/produit.model';
import { Client } from '../../layout/models/client.model';
import { DetailCommande } from '../../layout/models/detailcommande.model';
import { Surface } from '../../layout/models/surface.model';
import {CookieService} from 'ngx-cookie-service';
import {ShoppingCartService} from '../../layout/services/shopping-cart.service';
import {ShoppingCart} from '../../layout/models/shopping-cart.model';
import {CartItem} from '../../layout/models/cart-item.model';
import {Liste} from '../../layout/models/liste.model';
import {DetaillisteService} from '../../layout/services/detailliste.service';
import {DetailListe} from '../../layout/models/detailliste.model';


@Component({
    selector: 'app-product',
    templateUrl: './product.component.html',
    styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

    @Input('produit') produit: Produit;
    @Input('surface') surface: Surface;
    @Input('listes') listes: Liste[];
    client: Client;
    panier: ShoppingCart;
    cartItem: CartItem;
    detailcommande: DetailCommande;

    // TODO: INTÉGRATION DU MODULE AJOUT A LA LISTE ET PAGINATION AU NIVEAU DES PRODUITS

    nom: string;

    constructor( private cookies: CookieService, private shoppingCartService: ShoppingCartService, private detaillisteService: DetaillisteService) { }

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

    actionToListe(action: string, liste_code, event) {
        event.stopPropagation();
        let detailliste: DetailListe;
        let add = true;
        try {
            detailliste = this.listes.filter(liste =>
                liste.code === liste_code)[0].details.filter(detail => detail.produit.code === this.produit.code)[0];
                action === '+' ? detailliste.quantite++ : detailliste.quantite = detailliste.quantite--;
                if (detailliste.quantite < 0)
                    detailliste.quantite = 0;
                add = false;
        } catch (e) {
            detailliste = new DetailListe();
            detailliste.quantite = 1;
        }

        this.detaillisteService.add({'produit_code': this.produit.code, 'liste_code': liste_code, 'quantite': detailliste.quantite}).then(detail => {
            console.log(detail);
            detailliste = detail;
            if (add) {
                this.listes.filter(liste => liste.code === liste_code)[0].details.push(detailliste);
            } else {
               this.listes.filter(liste =>
                   liste.code === liste_code)[0].details.filter(detail_O => detail_O.produit.code === this.produit.code)[0].quantite = detailliste.quantite;
            }
        });
    }

    actionToCommande(action: string) {
        this.cartItem = this.shoppingCartService.actionItem(this.produit, action);
    }
}
