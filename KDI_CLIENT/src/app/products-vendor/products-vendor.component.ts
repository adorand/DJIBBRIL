import { Component, OnInit } from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {Surface} from '../layout/models/surface.model';
import {Produit} from '../layout/models/produit.model';
import {ActivatedRoute, Router} from '@angular/router';
import {CookieService} from 'ngx-cookie-service';
import {SurfaceService} from '../layout/services/surface.service';
import {ListeService} from '../layout/services/liste.service';
import {Liste} from '../layout/models/liste.model';

@Component({
    selector: 'app-products-vendor',
    templateUrl: './products-vendor.component.html'
})
export class ProductsVendorComponent implements OnInit {

    public surfaces: Surface[];
    public surface: Surface;
    public produits: Produit[];
    public listes: Liste[];
    public pagination: number;

    constructor(
        private router: Router,
        private route: ActivatedRoute,
        private cookieService: CookieService,
        private surfaceservice: SurfaceService,
        private listeService: ListeService
    ) {
        this.listeService.getall((JSON.parse(this.cookieService.get('client'))).code).then(listes => {
            this.listes = listes;
        });
    }

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

        if (event !== '') {
             console.log(document.getElementsByClassName('list-group-item-success').length);
            for (let i = 0 ; i < document.getElementsByClassName('list-group-item-success').length; i++) {
                document.getElementsByClassName('list-group-item-success').item(i).classList.add('list-group-item-info');
                document.getElementsByClassName('list-group-item-success').item(i).classList.remove('list-group-item-success');
            }
            const pathparent = by === 'ssctg' ? 3 : 1;
            // document.getElementsByClassName('list-group-item-success').item(0).classList.remove('list-group-item-success');
            // document.getElementsByClassName('list-group-item').item(0).classList.add('list-group-item-info');
            event.path[pathparent].classList.remove('list-group-item-info');
            event.path[pathparent].classList.add('list-group-item-success');
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
