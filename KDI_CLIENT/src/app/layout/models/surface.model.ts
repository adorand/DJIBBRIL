import {Categorie} from './categorie.model';

export class Surface {
    code: string;
    nom: string;
    image: string;
    created_at: string;
    updated_at: string;
    categories: Categorie[];

    public surfaces: Surface[] = new Array<Surface>();
    // public grossTotal: number = 0;
    // public itemsTotal: number = 0;

    public listesurfaces(src: Surface) {
        this.surfaces = src.surfaces;
        // this.grossTotal = src.grossTotal;
        // this.itemsTotal = src.itemsTotal;
    }
}


