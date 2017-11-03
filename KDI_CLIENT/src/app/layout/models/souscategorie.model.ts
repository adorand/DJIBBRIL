import {Produit} from './produit.model';
import {Categorie} from './categorie.model';

export class SousCategorie {
    code: string;
    nom: string;
    surface_code: string;
    description: string;
    created_at: string;
    updated_at: string;
    parent: Categorie;
    produits: Produit[];
}


