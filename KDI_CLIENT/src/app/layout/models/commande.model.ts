import {DetailCommande} from './detailcommande.model';
import {Client} from './client.model';

export class Commande {
    code: string;
    etat: number;
    client: Client;
    details: DetailCommande[];
    created_at: string;
    updated_at: string;
}


