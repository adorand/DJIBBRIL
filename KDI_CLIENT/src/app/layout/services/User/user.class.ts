import {CommandeClass} from '../commande/commande.class';
import {ListeClass} from '../liste/liste.class';

export class UserClass {
    code: string;
    name: string;
    email: string;
    password: string;
    telephone: string;
    commandes: CommandeClass[];
    listes: ListeClass[];

    // constructor(public code: string, public name: string, public email: string, public password: string
    //             , public telephone: string, public commandes: CommandeClass[], public listes: ListeClass[]) {
    //
    // }

}


