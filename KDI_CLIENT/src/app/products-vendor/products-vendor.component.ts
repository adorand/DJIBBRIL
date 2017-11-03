import { Component, OnInit } from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {Surface} from '../layout/models/surface.model';
import {Produit} from '../layout/models/produit.model';
import {ActivatedRoute, Router} from '@angular/router';
import {CookieService} from 'ngx-cookie-service';
import {SurfaceService} from '../layout/services/surface.service';

@Component({
    selector: 'app-products-vendor',
    templateUrl: './products-vendor.component.html'
})
export class ProductsVendorComponent implements OnInit {

    public surfaces: Surface[];
    public surface: Surface;
    public produits: Produit[];
    public pagination: number;

    constructor(
        private router: Router,
        private route: ActivatedRoute,
        private cookieService: CookieService,
        private surfaceservice: SurfaceService
    ) {}

  ngOnInit() {
      // console.log(this.surfaces);
      this.surface = new Surface();
      this.produits = [];
      this.pagination = 0;
      this.route.params.subscribe(params => {

          if (params['surface']) {
              this.surfaceservice.getall(this.cookieService.get('activatedsurface'))
                  .then(surfaces => {
                      this.surface = surfaces[0];
                      this.surface.categories.forEach((categorie, ctg) => {
                          categorie.souscategories.forEach( (souscategorie, ssctg) => {
                              souscategorie.produits.forEach( (produit, prod) => {
                                  this.produits.push(produit);
                              });
                          });
                      });
                  });
          } else {
              this.router.navigate(['/home/']);
          }
      });
  }

}
