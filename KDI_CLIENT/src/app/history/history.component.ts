import { Component, OnInit } from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import { Commande } from '../layout/models/commande.model';

import { ShoppingCartService } from '../layout/services/shopping-cart.service';
import {ShoppingCart} from '../layout/models/shopping-cart.model';
import {SurfaceService} from '../layout/services/surface.service';
import {Surface} from '../layout/models/surface.model';
import {ProduitService} from '../layout/services/produit.service';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html'
})
export class HistoryComponent implements OnInit {

    panier: ShoppingCart;
    details: any[];
    private surfaces: Surface[];


    constructor(private surfaceservice: SurfaceService, private produitservice: ProduitService,
                private shoppingCartService: ShoppingCartService) {

    }

    ngOnInit() {

        let unefois = false;
        this.shoppingCartService.get().forEach(value => {
            this.panier = value;

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
                unefois = true;
            }
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
