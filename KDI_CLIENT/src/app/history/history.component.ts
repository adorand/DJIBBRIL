import { Component, OnInit } from '@angular/core';

import { ShoppingCartService } from '../layout/services/shopping-cart.service';
import {ShoppingCart} from '../layout/models/shopping-cart.model';
import {ProduitService} from '../layout/services/produit.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html'
})
export class HistoryComponent implements OnInit {

    panier: ShoppingCart;
    details: any[];
    total: number;
    pagination: number;
    parpages: number = 3;
    pages: any;

    constructor(private produitservice: ProduitService, private shoppingCartService: ShoppingCartService) {}

    ngOnInit() {

        this.pagination = 1;

        let unefois = false;
        this.total = 0;
        this.shoppingCartService.get().forEach(value => {
            this.panier = value;
            this.panier.items.forEach(item => {
               this.total += item.quantity * item.prix;
            });

            // On récupère les informations sur le panier, juste la première fois et ensuite les changements sont détectés
            // depuis product-histo
            if (unefois === false) {
                this.details = [];
                this.panier.items.forEach(item => {
                    const reqinfos = 'image, souscategorie{ code,nom , parent{ surface{code, nom}}}';
                    this.produitservice.getinfos(item.productId, reqinfos).then(prod => {
                        item.productImg = prod.image;
                        item.productNamessctg = prod.souscategorie.nom;
                        item.productNamesurface = prod.souscategorie.parent.surface.nom;
                        this.details.push(item);
                    });
                });



                const nb: number =  Math.round( (this.panier.items.length / this.parpages) );
                console.log('array =>' + (this.panier.items.length / this.parpages));
                this.pages = Array(nb ).fill(nb ).map((x, i) => i);

                unefois = true;
            }
        });
    }

    setpagination(pagination: number) {

        this.pagination = pagination;
    }

}
