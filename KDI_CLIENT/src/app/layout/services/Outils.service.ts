import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import 'rxjs/add/operator/toPromise';

@Injectable()
export class OutilsService {

    constructor(private http: Http)
    {

    }

    public handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }

}