import { Injectable } from '@angular/core';

import { SousCategorie } from '../models/souscategorie.model';

@Injectable()
export class SouscategorieService
{

    getall(): Promise<SousCategorie[]> {
        return null;
    }
}