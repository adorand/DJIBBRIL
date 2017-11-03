import {Produit} from './produit.model';
import {Commande} from './commande.model';

export class DetailCommande {
    id: number;
    produit: Produit;
    quantite: number;
    commande: Commande;
    created_at: string;
    updated_at: string;
}


