

import {SouscategorieClass} from '../souscategorie/souscategorie.class';

export class CategorieClass {
    code: string;
    nom: string;
    surface_code: string;
    description: string;
    created_at: string;
    updated_at: string;
    souscategories: SouscategorieClass[];
}


