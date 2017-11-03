

import {SousCategorie} from './souscategorie.model';
import {Surface} from './surface.model';

export class Categorie {
    code: string;
    nom: string;
    surface_code: string;
    description: string;
    created_at: string;
    updated_at: string;
    surface: Surface;
    souscategories: SousCategorie[];
}


