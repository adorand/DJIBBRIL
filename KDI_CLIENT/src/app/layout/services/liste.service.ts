import { Injectable } from '@angular/core';

import { Liste } from '../models/liste.model';
import {Http, URLSearchParams} from '@angular/http';
import {environment} from '../../../environments/environment';
import {OutilsService} from './Outils.service';
import {CookieService} from 'ngx-cookie-service';

@Injectable()
export class ListeService {
    constructor(private http: Http, private outilsService: OutilsService, public cookieService: CookieService){

    }

    getall(clientcode): Promise<Liste[]> {
        const url = '{listes(client_code: "' + clientcode + '" ) {code, nom, ' +
            'client{code},created_at,updated_at,details' +
            '{id,quantite,produit{code,designation,prix, image } } } } ';

        return this.http.get(environment.api + url).toPromise()
            .then( res => res.json().data.listes as Liste[])
            .catch(this.outilsService.handleError);
    }

    get(code, clientcode): Promise<Liste> {
        const url = '{listes(code: "' + code + '" , client_code: "' + clientcode + '" ) {code, nom, ' +
            'client{code},created_at,updated_at,details' +
            '{id,quantite,produit{code,designation,prix, image } } } } ';

        return this.http.get(environment.api + url).toPromise()
            .then( res => res.json().data.listes[0] as Liste)
            .catch(this.outilsService.handleError);
    }

    save(liste: Liste) {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(liste));
        data.append('client_code', JSON.parse(this.cookieService.get('client')).code);
        return this.http.post(environment.front + 'liste', data ).toPromise().then(res => res.json().data.listes[0]  as Liste);
    }
}