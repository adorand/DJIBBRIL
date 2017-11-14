import {Produit} from './produit.model';
import {Liste} from './liste.model';

export class DetailListe {
    id: number;
    produit: Produit;
    quantite: number;
    liste: Liste;
    created_at: string;
    updated_at: string;
}


