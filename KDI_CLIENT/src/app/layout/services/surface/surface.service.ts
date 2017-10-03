import { Injectable } from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';

import { SurfaceClass } from './surface.class';

@Injectable()
export class SurfaceService
{
    constructor(private http: Http) {}

    private urlgraphql = '/graphql?query=';

    all: string = '{surfaces{code, nom, image,  created_at, updated_at, categories{ code, nom, description, created_at, updated_at, surface_code, souscategories { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix, image, created_at, updated_at, souscategorie { code,nom } } }}}}';

    getall(): Promise<SurfaceClass[]> {
        return this.http.get(this.urlgraphql + this.all)
            .toPromise()
            .then(response => response.json().data.surfaces as SurfaceClass[]);
    }

    get(): Promise<SurfaceClass> {
        return null;
    }
}