import { Injectable } from '@angular/core';

import { ProduitClass } from './produit.class';
import { PRODUITS } from './mock-produits';

@Injectable()
export class ProduitService
{
    getall(): Promise<ProduitClass[]> {
        return Promise.resolve(PRODUITS);
    }
}