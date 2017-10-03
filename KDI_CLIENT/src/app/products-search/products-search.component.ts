import {Component, OnInit, DoCheck} from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {ActivatedRoute} from '@angular/router';
import {SurfaceClass} from '../layout/services/surface/surface.class';
import {ProduitClass} from '../layout/services/produit/produit.class';

@Component({
  selector: 'app-products-search',
  templateUrl: './products-search.component.html',
  styleUrls: ['./products-search.component.css']
})
export class ProductsSearchComponent implements OnInit, DoCheck {

    @LocalStorage('surfaces')
    public surfaces: SurfaceClass[];
    public surface: SurfaceClass;
    public produits: ProduitClass[];
    nomproduit: string;

    constructor(
        private storage: LocalStorageService,
        private route: ActivatedRoute
    ) {
        this.route.params.subscribe(params => this.nomproduit = params['produit']);
        console.log(this.nomproduit);

    }

    ngDoCheck(){
        this.route.params.subscribe(params => this.nomproduit = params['produit']);
        this.doSearch(this.nomproduit);
    }

    ngOnInit() {
        console.log('init');
        this.route.params.subscribe(params => this.nomproduit = params['produit']);
        this.doSearch(this.nomproduit);
    }

    doSearch(nomproduit: string)
    {
        this.produits = [];
        this.surfaces.forEach((surface, surf) => {
            surface.categories.forEach((categorie, ctg) => {
                categorie.souscategories.forEach((souscategorie, ssctg) => {
                    souscategorie.produits.forEach((produit, prod) => {
                        if (produit.designation.toLowerCase().includes(nomproduit.toLowerCase()))
                        {
                            this.produits.push(produit);
                        }
                    });
                });
            });
        });
    }

}
