import { Injectable } from '@angular/core';

import { SouscategorieClass } from './souscategorie.class';

@Injectable()
export class SouscategorieService
{

    getall(): Promise<SouscategorieClass[]> {
        return null;
    }
}