import { Injectable } from '@angular/core';

import { CategorieClass } from './categorie.class';

@Injectable()
export class CategorieService
{
    getall(): Promise<CategorieClass[]> {
        return null;
    }
}