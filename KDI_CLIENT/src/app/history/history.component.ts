import { Component, OnInit } from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import { Commande } from '../layout/models/commande.model';

import { ShoppingCartService } from '../layout/services/shopping-cart.service';
import {ShoppingCart} from '../layout/models/shopping-cart.model';
import {SurfaceService} from '../layout/services/surface.service';
import {Surface} from '../layout/models/surface.model';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html'
})
export class HistoryComponent implements OnInit {

    panier: ShoppingCart;
    details: any[];
    private surfaces: Surface[];


    constructor(private surfaceservice: SurfaceService,
                private shoppingCartService: ShoppingCartService) {

    }

    ngOnInit() {
        // this.surfaceservice.getall('').then(surfaces => {
        //     this.surfaces = surfaces;
        // });
        this.shoppingCartService.get().forEach(value => {
            this.panier = value;
            this.details = this.panier.items;
        });
    }

    getDetail(productId: string): any {
        let det ;
        let surface_existe=false ;
        this.panier.items.forEach(item => {

            if (!surface_existe) {
                this.surfaceservice.getall('').then(surfaces => {
                    this.surfaces = surfaces;
                });
                surface_existe = true;
            }
            else this.surfaces.forEach((surface, surf) => {
                surface.categories.forEach((categorie, ctg) => {
                    categorie.souscategories.forEach((souscategorie, ssctg) => {
                        souscategorie.produits.forEach((produit, prod) => {
                            if (produit.code === item.productId && item.productId === productId) {
                                det = { 'produit': produit, 'surface': surface };
                            }
                        });
                    });
                });
            });
        });
        return det;
    }

}
