import { Injectable } from '@angular/core';

import {Http} from '@angular/http';

import { Commande } from '../models/commande.model';
import {OutilsService} from './Outils.service';

@Injectable()
export class CommandeService
{
    constructor(private http: Http, private outilsService: OutilsService) { }

    getall(): Promise<Commande[]> {
        return null;
    }

    get(code): Promise<Commande> {
        const url = '{commandes(code: "' + code + '" ) {code, etat, ' +
            'client{code},created_at,updated_at,details' +
            '{id,quantite,produit{code,designation,prix, image } } } } ';

        return this.http.get(url).toPromise()
            .then( res => res.json().data.commandes[0] as Commande)
            .catch(this.outilsService.handleError);
    }
}