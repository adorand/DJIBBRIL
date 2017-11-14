import { Injectable } from '@angular/core';

import { Produit } from '../models/produit.model';
import {CookieService} from 'ngx-cookie-service';
import {Http} from '@angular/http';
import {environment} from '../../../environments/environment';
import {OutilsService} from './Outils.service';

@Injectable()
export class ProduitService
{
    constructor(private http: Http, private outilsService: OutilsService, private cookies: CookieService) {}

    url: string;
    getall(): Promise<Produit[]> {
        return null;
    }

    nomproduit_cookie(nomproduit: string): void {
        this.cookies.set('nomproduit', nomproduit, null, '/');
    }


    getinfos(code: string, reqinfos): Promise<Produit> {
        this.url = '{produits(code:"' + code + '"){ ' + reqinfos + '}}';

        return this.http.get(environment.api + this.url)
            .toPromise()
            .then(response => (response.json().data.produits[0] as Produit))
            .catch(this.outilsService.handleError);
    }
}