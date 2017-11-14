import { Injectable } from '@angular/core';

import { DetailCommande } from '../models/detailcommande.model';

import {Http, URLSearchParams} from '@angular/http';
import {environment} from '../../../environments/environment';
import 'rxjs/add/operator/toPromise';
import {Commande} from '../models/commande.model';
import {DetailListe} from '../models/detailliste.model';
import {OutilsService} from './Outils.service';

@Injectable()
export class DetaillisteService
{
    constructor(private http: Http, private outilsService: OutilsService){ }

    getall(): Promise<DetailListe[]> {
        return null;
    }

    add(detailliste): Promise<DetailListe> {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(detailliste));
        return this.http.post(environment.front + 'detailliste', data ).toPromise().then(res => res.json().data.detailslistes[0]  as DetailListe)
            .catch(this.outilsService.handleError);
    }
}