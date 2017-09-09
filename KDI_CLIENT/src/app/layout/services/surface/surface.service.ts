import { Injectable } from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';

import { SurfaceClass } from './surface.class';
import { SURFACES } from './mock-surfaces';

@Injectable()
export class SurfaceService
{
    constructor(private http: Http) {}

    private urlgraphql = '/graphql?query=';

    all: string = 'query surfaces \n' +
        '{\n' +
        '  surfaces\n' +
        '  {\n' +
        '    code,\n' +
        '    name,\n' +
        '    logo,\n' +
        '    categories\n' +
        '    {\n' +
        '      code,\n' +
        '      nom,\n' +
        '      souscategories\n' +
        '      {\n' +
        '        code,\n' +
        '      \tnom,\n' +
        '        parent\n' +
        '        {\n' +
        '          code,\n' +
        '          nom\n' +
        '        }\n' +
        '      },\n' +
        '      produits\n' +
        '      {\n' +
        '        code\n' +
        '      }\n' +
        '    }\n' +
        '  }\n' +
        '}';

    getall(): Promise<SurfaceClass[]> {
        return this.http.get(this.urlgraphql + this.all)
            .toPromise()
            .then(response => response.json().data as SurfaceClass[]);
    }

    get(): Promise<SurfaceClass> {
        return null;
    }
}