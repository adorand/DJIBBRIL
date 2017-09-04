import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { UserClass } from './user.class';
import { USERS } from './mock-users';

@Injectable()
export class UserService {
    private headers = new Headers({
        'Access-Control-Allow-Origin': '*' ,
        'Access-Control-Allow-Methods' : 'POST, GET, OPTIONS, PUT' ,
        'Content-Type': 'application/json',
        'Accept': 'application/json'});
    private usersUrl = '/ext/add-user';

    constructor(private http: Http) { }

    getall(): Promise<UserClass[]> {
        return Promise.resolve(USERS);
    }


    get(code: string): Promise<UserClass> {
        const url = `${this.usersUrl}/${code}`;
        return this.http.get(url)
            .toPromise()
            .then(response => response.json().data as UserClass)
            .catch(this.handleError);
    }

    delete(code: string): Promise<void> {
        const url = `${this.usersUrl}/${code}`;
        return this.http.delete(url, {headers: this.headers})
            .toPromise()
            .then(() => null)
            .catch(this.handleError);
    }

    createget(user: UserClass): Promise<UserClass> {
        const url = `${this.usersUrl}/${JSON.stringify(user)}`;
        return this.http
            .get(url, {headers: this.headers})
            .toPromise()
            .then(res => res.json().data as UserClass)
            .catch(this.handleError);
    }

    create(user: UserClass): Promise<UserClass> {
        return this.http
            .post(this.usersUrl, JSON.stringify(user), {headers: this.headers})
            .toPromise()
            .then(res => res.json().data as UserClass)
            .catch(this.handleError);
    }

    update(user: UserClass): Promise<UserClass> {
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