import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, NavigationEnd, Router} from '@angular/router';
import { Client } from '../models/client.model';
import {DetailcommandeService} from '../services/detailcommande.service';
import {CookieService} from 'ngx-cookie-service';


import {ShoppingCart} from '../../layout/models/shopping-cart.model';
import {ShoppingCartService} from '../services/shopping-cart.service';
import {Observable} from 'rxjs/Observable';
import {CartItem} from '../models/cart-item.model';
import {Produit} from '../models/produit.model';
import {ProduitService} from '../services/produit.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html'
})
export class HeaderComponent implements OnInit {

    public client: Client;
    public panier: ShoppingCart;
    public cart: Observable<ShoppingCart>;

    nomproduit: string;

    constructor(
      private router: Router,
      private route: ActivatedRoute,
      private produitservice: ProduitService,
      private cookieService: CookieService,
      private shoppingCartService: ShoppingCartService) {
        this.router.routeReuseStrategy.shouldReuseRoute = function(){
            return false;
        };
        this.router.events.subscribe((evt) => {
            if (evt instanceof NavigationEnd) {
                this.router.navigated = false;
            }
        });
    }

    ngOnInit() {

        /*Pour afficher le nom du produit recherhé dans la barre de recherche lorsqu'il y a un rechargement*/
        if (location.href.indexOf('home') !== -1) {
            this.produitservice.nomproduit_cookie('');
        }
        this.nomproduit = this.cookieService.check('nomproduit') ? this.cookieService.get('nomproduit') : '' ;


        this.client = this.cookieService.check('client') ? JSON.parse(this.cookieService.get('client')) as Client : null;

        this.shoppingCartService.get().forEach(value => {
            this.panier = value;
        });

    }

    gotosearch() {
        this.router.navigate(['/produits-recherche/', this.nomproduit]);
    }

    deconnexion() {

        this.cookieService.delete('client', '/');
        this.shoppingCartService.empty();
        this.router.navigate(['/home']);
        location.reload();
    }

    removeFromCommande(productId: string) {
        const prod = new Produit();
        prod.code = productId;
        this.shoppingCartService.actionItem(prod, '-');
    }

}
