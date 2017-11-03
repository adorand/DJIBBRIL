import { Injectable } from '@angular/core';

import { Produit } from '../models/produit.model';
import {CookieService} from 'ngx-cookie-service';
import {Http} from '@angular/http';
import {environment} from '../../../environments/environment';

@Injectable()
export class ProduitService
{
    constructor(private http: Http,private cookies: CookieService) {}

    url: string;
    getall(): Promise<Produit[]> {
        return null;
    }

    nomproduit_cookie(nomproduit: string): void {
        this.cookies.set('nomproduit', nomproduit, null, '/');
    }


    getimage(code: string): Promise<string> {
        this.url = '{produits(code:"' + code + '"){image}}';

        return this.http.get(environment.api + this.url)
            .toPromise()
            .then(response => (response.json().data.produits[0] as Produit).image)
            .catch(this.handleError);
    }


    private handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }

}