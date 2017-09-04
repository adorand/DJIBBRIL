import { Injectable } from '@angular/core';

import { CommandeClass } from './commande.class';
import { COMMANDES } from './mock-commandes';

@Injectable()
export class ProduitService
{
    getall(): Promise<CommandeClass[]> {
        return Promise.resolve(COMMANDES);
    }
}