import { Injectable } from '@angular/core';

import { ProduitClass } from './produit.class';

@Injectable()
export class ProduitService
{
    getall(): Promise<ProduitClass[]> {
        return null;
    }
}