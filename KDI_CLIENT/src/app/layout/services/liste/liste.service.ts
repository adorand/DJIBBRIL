import { Injectable } from '@angular/core';

import { ListeClass } from './liste.class';
import { LISTES } from './mock-listes';

@Injectable()
export class ProduitService
{
    getall(): Promise<ListeClass[]> {
        return Promise.resolve(LISTES);
    }
}