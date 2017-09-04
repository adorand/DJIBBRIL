import {ProduitClass} from '../produit/produit.class';

export class CategorieClass {
    id: number;
    nom: string;
    description: string;
    id_parent: number;
    produits: ProduitClass[];
}


