import { Injectable } from '@angular/core';

import { DetailCommande } from '../models/detailcommande.model';

import {Http, URLSearchParams} from '@angular/http';
import {environment} from '../../../environments/environment';
import 'rxjs/add/operator/toPromise';
import {Commande} from '../models/commande.model';
import {OutilsService} from './Outils.service';

@Injectable()
export class DetailcommandeService
{
    constructor(private http: Http, private outilsService: OutilsService){ }

    getall(): Promise<DetailCommande[]> {
        return null;
    }

    add(detailcommande): Promise<DetailCommande> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(detailcommande));
        return this.http.post(environment.front + 'detailcommande', data ).toPromise().then(res => res.json().data.detailscommandes[0]  as DetailCommande)
            .catch(this.outilsService.handleError);
    }

    addCommande(parsedcmd): Promise<Commande> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(parsedcmd));
        return this.http.post(environment.front + 'detailcommande_liste', data ).toPromise().then(res => res.json().data.commandes[0]  as Commande)
            .catch(this.outilsService.handleError);
    }

    delete(detailcommande): Promise<boolean> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(detailcommande));
        return this.http.post(environment.front + 'detailcommande_delete', data ).toPromise().then(res => res.json() as boolean)
            .catch(this.outilsService.handleError);
    }
}