import { Component, OnInit } from '@angular/core';

import { Client } from '../models/client.model';
import { ClientService} from '../services/client.service';

import {ShoppingCartService} from '../../layout/services/shopping-cart.service';
import {ShoppingCart} from '../models/shopping-cart.model';

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
        private shoppingCartService: ShoppingCartService
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
