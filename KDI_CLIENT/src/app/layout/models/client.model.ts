import {Commande} from './commande.model';
import {Liste} from './liste.model';

export class Client {
    code: string;
    nom: string;
    email: string;
    password: string;
    telephone: string;
    image: string;
    created_at: string;
    updated_at: string;
    commandes: Commande[];
    listes: Liste[];
}


