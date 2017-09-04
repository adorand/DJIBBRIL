import {CategorieClass} from '../categorie/categorie.class';

export class ProduitClass {
    id: number;
    designation: string;
    description: string;
    quantite: number;
    prix: number;
    image: string;
    categorie: CategorieClass;
}


