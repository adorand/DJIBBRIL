import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';
import {HttpClient} from '@angular/common/http';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';

import { Client } from '../models/client.model';
import { ClientService} from '../services/client.service';
import {CookieService} from 'ngx-cookie-service';
import { Commande } from '../models/commande.model';

import {ShoppingCartService} from '../../layout/services/shopping-cart.service';
import {ShoppingCart} from '../models/shopping-cart.model';
import { DetailcommandeService } from '../services/detailcommande.service';

@Component({
  selector: 'app-sidebar-form',
  templateUrl: './sidebar-form.component.html',
  styleUrls: ['./sidebar-form.component.css']
})
export class SidebarFormComponent implements OnInit {

    client: Client;
    auth: any;
    errorLogin: string;
    panier: ShoppingCart;


    constructor(
        private clientService: ClientService,
        private cookieService: CookieService,
        private shoppingCartService: ShoppingCartService,
        private detailcommandeService: DetailcommandeService
    ) {
        this.errorLogin = '';

    }

    ngOnInit(): void {
        this.errorLogin = '';
        this.auth = {login: '', password: '' };
        this.client = {code: null, nom: null, email: null, password: null, telephone: null, image: null, created_at: null, updated_at: null, commandes: [], listes: [] };
    }

    dispatchingafterconnected(client: Client) {
        const cli = new Client();
        cli.code = client.code;
        cli.nom = client.nom;
        cli.email = client.email;
        cli.telephone = client.telephone;
        cli.password = client.password;
        cli.created_at = client.created_at;

        this.clientService.client_cookie(cli);
        this.shoppingCartService.shoppingCartAuth(client.commandes.filter(commande => commande.etat === 0)[0]);
        location.reload();
    }

    doAuthentificate() {
        this.clientService.login(this.auth.login, this.auth.password).then(client => this.dispatchingafterconnected(client));
    }

    doSave() {
        this.clientService.save(this.client).then(client => this.dispatchingafterconnected(client));
    }

}
