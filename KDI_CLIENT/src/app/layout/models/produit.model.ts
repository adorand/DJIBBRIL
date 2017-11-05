import {SousCategorie} from './souscategorie.model';

export class Produit {
    code: string;
    designation: string;
    description: string;
    quantite: number;
    prix: number;
    image: string;
    categorie_code: string;
    created_at: string;
    updated_at: string;
    souscategorie: SousCategorie;
}


