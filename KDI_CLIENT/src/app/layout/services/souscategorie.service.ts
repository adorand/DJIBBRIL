import { Injectable } from '@angular/core';

import { SousCategorie } from '../models/souscategorie.model';
import {Http} from '@angular/http';
import {environment} from '../../../environments/environment';
import {OutilsService} from './Outils.service';

@Injectable()
export class SouscategorieService {

    public constructor(private http: Http, private outilsService: OutilsService) {

    }
    getreq(code: String): String {
        return '{categories( ' + ( code ? 'code: "' + code + '",' : '' ) + ' ssctg: "") { code,nom , parent { surface { code, nom } } } } ';
    }


    getall(code: String): Promise<SousCategorie[]> {
        return this.http.get(environment.api + this.getreq(code))
            .toPromise()
            .then(response => response.json().data.souscategories as SousCategorie[])
            .catch(this.outilsService.handleError);
    }

    get(code: String): Promise<SousCategorie> {
        return this.http.get(environment.api + this.getreq(code))
            .toPromise()
            .then(response => response.json().data.souscategories[0] as SousCategorie)
            .catch(this.outilsService.handleError);
    }
}