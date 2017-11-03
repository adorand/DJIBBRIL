import { Injectable } from '@angular/core';

import {Http} from '@angular/http';

import { Commande } from '../models/commande.model';

@Injectable()
export class CommandeService
{
    constructor(private http: Http) { }

    getall(): Promise<Commande[]> {
        return null;
    }

    get(code): Promise<Commande> {
        const url = '{commandes(code: "' + code + '" ) {code, etat, ' +
            'membre{code},created_at,updated_at,details' +
            '{id,quantite,produit{code,designation,prix, image } } } } ';

        return this.http.get(url).toPromise()
            .then( res => res.json().data.commandes[0] as Commande)
            .catch(this.handleError);
    }

    private handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }
}