import { Injectable } from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';


import { Surface } from '../models/surface.model';
import {environment} from '../../../environments/environment';
import {CookieService} from 'ngx-cookie-service';

@Injectable()
export class SurfaceService {

    constructor(private http: Http, private cookies: CookieService)
    {}

    private urlgraphql = '/graphql?query=';

    all: string = '{surfaces{code, nom, image,  created_at, updated_at, categories{ code, nom, description, created_at, updated_at, surface_code, souscategories { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix, image, created_at, updated_at, souscategorie { code,nom } } }}}}';


    getreq(code: String): String {
        return '{surfaces' + ( code ? '(code : "' + code + '")' : '' ) + ' {code, nom, image,  created_at, updated_at, categories{ code, nom, description, created_at, updated_at, surface_code, souscategories { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix, image, created_at, updated_at, souscategorie { code,nom , parent{ surface{code, nom}}} } }}}}';
    }


    getall(code: String): Promise<Surface[]> {
        return this.http.get(environment.api + this.getreq(code))
            .toPromise()
            .then(response => response.json().data.surfaces as Surface[])
            .catch(this.handleError);
    }

    activatedsurface(codesurface: string): void {
        this.cookies.set('activatedsurface', codesurface, null, '/');
    }


    private handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }






}