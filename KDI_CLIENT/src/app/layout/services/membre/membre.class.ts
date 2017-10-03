import {CommandeClass} from '../commande/commande.class';
import {ListeClass} from '../liste/liste.class';

export class MembreClass {
    code: string;
    nom: string;
    email: string;
    password: string;
    telephone: string;
    image: string;
    commandes: CommandeClass[];
    listes: ListeClass[];
}


