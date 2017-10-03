import { Injectable } from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';
import {HttpClient} from '@angular/common/http';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import 'rxjs/add/operator/toPromise';

import { MembreClass } from './membre.class';
import {environment} from '../../../../environments/environment';

@Injectable()
export class MembreService {
    private headers = new Headers({
        'Access-Control-Allow-Origin': '*' ,
        'Access-Control-Allow-Methods' : 'POST, GET, OPTIONS, PUT' ,
        'Content-Type': 'application/json',
        'Accept': 'application/json'});

    constructor(private http: Http, private httpclient: HttpClient, public toastr: ToastsManager) { }

    getall(): Promise<MembreClass[]> {
        return null;
    }

    login(email: string, password: string): Promise<MembreClass>
    {
        const url=environment.api+'{membres{code, nom, email, telephone, password, image, created_at, updated_at}}'
        return this.http.get(environment.api)
    }


    get(code: string): Promise<MembreClass> {
        const url = `${this.usersUrl}/${code}`;
        return this.http.get(url)
            .toPromise()
            .then(response => response.json().data as MembreClass)
            .catch(this.handleError);
    }

    delete(code: string): Promise<void> {
        const url = `${this.usersUrl}/${code}`;
        return this.http.delete(url, {headers: this.headers})
            .toPromise()
            .then(() => null)
            .catch(this.handleError);
    }


    createget(user: MembreClass): Promise<MembreClass> {
        let data = new URLSearchParams();
        data.append('data', JSON.stringify(user) );
        return this.http.post(this.usersUrl, data ).toPromise().then(res => res.json() as MembreClass );
    }

    save(user: MembreClass): void{
        // this.httpcli.post('/ext/add-user/',JSON.stringify(user)).subscribe(data => {
        //     console.log(data);
        // });

        this.toastr.success('You are awesome!', 'Success!');

        /*fetchdata(): void {
            this.httpcli.get('/ext/add-user/{"code":"","name":"fgf","email":"m@test.com","password":"fffdf","telephone":"gfgfg","commandes":[],"listes":[]}').subscribe(data => {
            console.log(data);
        });*/
    }

    create(user: MembreClass): void {
         this.httpclient.post(this.usersUrl, JSON.stringify(user), this.headers).subscribe(data => {
             console.log(data);
        });
    }

    update(user: MembreClass): Promise<MembreClass> {
        const url = `${this.usersUrl}/${user.code}`;
        return this.http
            .put(url, JSON.stringify(user), {headers: this.headers})
            .toPromise()
            .then(() => user)
            .catch(this.handleError);
    }

    private handleError(error: any): Promise<any> {
        console.error('Une erreur est survenue -> ', error);
        return Promise.reject(error.message || error);
    }
}