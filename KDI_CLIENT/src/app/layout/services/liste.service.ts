import { Injectable } from '@angular/core';

import { Liste } from '../models/liste.model';

@Injectable()
export class ProduitService
{
    getall(): Promise<Liste[]> {
        return null;
    }
}