import { Injectable } from '@angular/core';

import { Categorie } from '../models/categorie.model';

@Injectable()
export class CategorieService
{
    getall(): Promise<Categorie[]> {
        return null;
    }
}