import { Injectable } from '@angular/core';

import { CategorieClass } from './categorie.class';
import { CATEGORIES } from './mock-categories';

@Injectable()
export class CategorieService
{
    getall(): Promise<CategorieClass[]> {
        return Promise.resolve(CATEGORIES);
    }
}