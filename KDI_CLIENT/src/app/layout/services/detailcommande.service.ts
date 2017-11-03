import { Injectable } from '@angular/core';

import { DetailCommande } from '../models/detailcommande.model';

import {Http, URLSearchParams} from '@angular/http';
import {environment} from '../../../environments/environment';
import 'rxjs/add/operator/toPromise';
import {Commande} from '../models/commande.model';

@Injectable()
export class DetailcommandeService
{
    constructor(private http: Http){ }

    getall(): Promise<DetailCommande[]> {
        return null;
    }

    add(detailcommande): Promise<DetailCommande> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(detailcommande));
        return this.http.post(environment.front + 'detailcommande', data ).toPromise().then(res => res.json().data.detailscommandes[0]  as DetailCommande)
            .catch(this.handleError);
    }

    addCommande(parsedcmd): Promise<Commande> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(parsedcmd));
        return this.http.post(environment.front + 'detailcommande_liste', data ).toPromise().then(res => res.json().data.commandes[0]  as Commande)
            .catch(this.handleError);
    }

    delete(detailcommande): Promise<boolean> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(detailcommande));
        return this.http.post(environment.front + 'detailcommande_delete', data ).toPromise().then(res => res.json() as boolean)
            .catch(this.handleError);
    }

    private handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }
}