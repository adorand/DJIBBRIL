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
        this.surface = new Surface();
        this.produits = [];
        this.pagination = 0;
        this.route.params.subscribe(params => {
            if (params['surface']) {
                this.surfaceservice.getall(this.cookieService.get('activatedsurface')).then(surfaces => {
                    this.surface = surfaces[0];
                    this.filterProducts();
                });
            } else {
                this.router.navigate(['/home/']);
            }
        });
    }


    filterProducts(event: any = '', by = '', codeelement = '') {

        /*Ajout de la classe*/
        // document.getElementsByClassName('list-group-item-info').item(0).classList.remove('list-group-item-info');
        // document.getElementsByClassName('list-group-item-info').item(0).classList.add('list-group-item-success');
        /*(event.target).parent.classList.remove('list-group-item-info');
        event.target.parent.classList.add('list-group-item-success');*/
        if (event !== '') {
            document.getElementsByClassName('list-group-item').item(0).classList.remove('list-group-item-success');
            document.getElementsByClassName('list-group-item').item(0).classList.add('list-group-item-info');
            event.path[1].classList.remove('list-group-item-info');
            event.path[1].classList.add('list-group-item-success');
        }

        this.produits = [];
        const all = by === '' ? true : false;
        this.surface.categories.forEach((categorie, ctg) => {
            categorie.souscategories.forEach( (souscategorie, ssctg) => {
                souscategorie.produits.forEach( (produit, prod) => {
                    if ( (by === 'ctg' && categorie.code === codeelement) || (by === 'ssctg' && souscategorie.code === codeelement) )
                        this.produits.push(produit);
                    else if (all === true) {
                        this.produits.push(produit);
                    }
                });
            });
        });

    }

}
