import { Component, OnInit } from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {SurfaceClass} from '../layout/services/surface/surface.class';
import {ProduitClass} from '../layout/services/produit/produit.class';
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-products-vendor',
  templateUrl: './products-vendor.component.html',
  styleUrls: ['./products-vendor.component.css']
})
export class ProductsVendorComponent implements OnInit {

    @LocalStorage('surfaces')
    public surfaces: SurfaceClass[];
    public surface: SurfaceClass;
    public produits: ProduitClass[];

    constructor(
        private storage: LocalStorageService,
        private route: ActivatedRoute
    ) {}

  ngOnInit() {
      // console.log(this.surfaces);
      this.produits = [];
      this.route.params.subscribe(params => {
          this.surface = this.surfaces.filter(surface => surface.nom === params['surface'])[0];

          this.surface.categories.forEach((categorie, ctg) => {
              categorie.souscategories.forEach( (souscategorie, ssctg) => {
                  souscategorie.produits.forEach( (produit, prod) => {
                      this.produits.push(produit);
                  });
              });
          });
      });
      console.log(this.produits);
  }

}
