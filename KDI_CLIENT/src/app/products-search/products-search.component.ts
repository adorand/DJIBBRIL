import {Component, OnInit, DoCheck} from '@angular/core';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {ActivatedRoute, Router} from '@angular/router';
import {Surface} from '../layout/models/surface.model';
import {Produit} from '../layout/models/produit.model';
import {SurfaceService} from '../layout/services/surface.service';
import {CookieService} from 'ngx-cookie-service';
import {isUndefined} from 'util';
import {ProduitService} from '../layout/services/produit.service';
import {Liste} from '../layout/models/liste.model';
import {ListeService} from '../layout/services/liste.service';

@Component({
  selector: 'app-products-search',
  templateUrl: './products-search.component.html'
})
export class ProductsSearchComponent implements OnInit, DoCheck {

    public surfaces: Surface[];
    public surface: Surface;
    public produits: Produit[];
    public listes: Liste[];
    nomproduit: string;
    codesurface: string;

    constructor(
        private storage: LocalStorageService,
        private router: Router,
        private route: ActivatedRoute,
        private surfaceservice: SurfaceService,
        private produitservice: ProduitService,
        private cookieService: CookieService,
        private listeService: ListeService
    ) {
        this.route.params.subscribe(params => this.nomproduit = params['produit']);
        this.listeService.getall((JSON.parse(this.cookieService.get('client'))).code).then(listes => {
            this.listes = listes;
        });

    }

    ngDoCheck() {
        console.log('DoCheck');
        this.route.params.subscribe(params => this.nomproduit = params['produit']);
        !this.codesurface ?  this.doSearch(this.nomproduit) : '' ;
    }

    ngOnInit() {

        // TODO: Voir tous les enjeux autour de la variable nomproduit
        this.surfaces = [];
        this.surfaceservice.getall('').then(surfaces => {
            this.surfaces = surfaces;
        });
        this.route.params.subscribe(params => {

            this.nomproduit = params['produit'];
            // alert(this.nomproduit);
            if (this.nomproduit === undefined) {
                this.nomproduit = '' ;
                this.cookieService.set('nomproduit', '', null, '/');
                this.router.navigate(['/home']);
            }
        });
        this.doSearch(this.nomproduit);
    }

    doSearch(nomproduit: string) {
        this.produitservice.nomproduit_cookie(this.nomproduit);
        this.produits = [];
        this.surfaces.forEach((surface, surf) => {
            surface.categories.forEach((categorie, ctg) => {
                categorie.souscategories.forEach((souscategorie, ssctg) => {
                    souscategorie.produits.forEach((produit, prod) => {
                        if (produit.designation.toLowerCase().includes(nomproduit.toLowerCase())) {
                            this.produits.push(produit);
                        }
                    });
                });
            });
        });
    }

    getsurfaceofproduit(ssctgprod: String): Surface {
        this.surfaces.forEach((surface, surf) => {
            surface.categories.forEach((categorie, ctg) => {
                categorie.souscategories.forEach((souscategorie, ssctg) => {
                    if (souscategorie.code === ssctgprod) this.surface = surface;
                });
            });
        });
        return this.surface;
    }

    filterByVendor(codesurface: string) {
        this.codesurface = codesurface;
        this.produits = [];
        this.surfaces.forEach((surface, surf) => {
            if (surface.code === codesurface) {
                surface.categories.forEach((categorie, ctg) => {
                    categorie.souscategories.forEach((souscategorie, ssctg) => {
                        souscategorie.produits.forEach((produit, prod) => {
                            if (produit.designation.toLowerCase().includes(this.nomproduit.toLowerCase())) {
                                this.produits.push(produit);
                            }
                        });
                    });
                });
            }
        });
    }

}
