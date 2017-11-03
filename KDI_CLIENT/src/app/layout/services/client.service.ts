import { Injectable } from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import 'rxjs/add/operator/toPromise';

import { Client } from '../models/client.model';
import {environment} from '../../../environments/environment';
import {ShoppingCart} from '../models/shopping-cart.model';
import {ShoppingCartService} from './shopping-cart.service';
import {CookieService} from 'ngx-cookie-service';

@Injectable()
export class ClientService {
    private headers = new Headers({
        'Access-Control-Allow-Origin': '*' ,
        'Access-Control-Allow-Methods' : 'POST, GET, OPTIONS, PUT' ,
        'Content-Type': 'application/json',
        'Accept': 'application/json'});

    panier: ShoppingCart;

    constructor(private http: Http, public toastr: ToastsManager, private shoppingCartService: ShoppingCartService, private cookies: CookieService)
    {
        this.shoppingCartService.get().forEach(value => {
            this.panier = value;
        });
    }

    login(email: string, password: string): Promise<Client> {
        const data = new URLSearchParams();
        data.append('email', email);
        data.append('password', password);
        data.append('panier', JSON.stringify(this.panier.items));
        return this.http.post(environment.front + 'client/login', data).toPromise()
            .then(response => {
                //this.toastr.success('You are awesome!', 'Success!');
                return response.json().data.clients[0] as Client;
            })
            .catch(this.handleError);
    }

    client_cookie(client: Client): void {
        this.cookies.set('client', JSON.stringify(client), null, '/');
    }

    save(membre: Client) {
        const data = new URLSearchParams();
        data.append('data', JSON.stringify(membre));
        return this.http.post(environment.front + 'client', data ).toPromise().then(res => res.json().data.membres[0]  as Client);
    }


    get(code: string): Promise<Client> {
        const url = `${environment.api}/${code}`;
        return this.http.get(url)
            .toPromise()
            .then(response => response.json().data as Client)
            .catch(this.handleError);
    }

    delete(code: string): Promise<void> {
        const url = `${environment.api}/${code}`;
        return this.http.delete(url, {headers: this.headers})
            .toPromise()
            .then(() => null)
            .catch(this.handleError);
    }



    // save(user: Client): void{
    //     // this.httpcli.post('/ext/add-user/',JSON.stringify(user)).subscribe(data => {
    //     //     console.log(data);
    //     // });
    //
    //     this.toastr.success('You are awesome!', 'Success!');
    //
    // }

    update(user: Client): Promise<Client> {
        const url = `${environment.api}/${user.code}`;
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