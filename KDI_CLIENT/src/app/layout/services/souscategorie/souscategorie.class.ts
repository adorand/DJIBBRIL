import {ProduitClass} from '../produit/produit.class';
import {CategorieClass} from '../categorie/categorie.class';

export class SouscategorieClass {
    code: string;
    nom: string;
    surface_code: string;
    description: string;
    created_at: string;
    updated_at: string;
    parent: CategorieClass;
    produits: ProduitClass[];
}


