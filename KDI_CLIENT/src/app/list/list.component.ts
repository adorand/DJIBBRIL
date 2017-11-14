import { Component, OnInit } from '@angular/core';
import {ModalService} from '../layout/services/modal.service';
import {Liste} from '../layout/models/liste.model';
import {Client} from '../layout/models/client.model';
import {ListeService} from '../layout/services/liste.service';
import {CookieService} from 'ngx-cookie-service';

declare var jquery: any;
declare var $: any;

@Component({
    selector: 'app-list',
    templateUrl: './list.component.html'
})
export class ListComponent implements OnInit {
    liste: Liste;
    listes: Liste[];

    constructor(public modalService: ModalService, public cookieService: CookieService,  public listeService: ListeService ) { }

    ngOnInit() {
        this.liste = new Liste();
        this.listeService.getall((JSON.parse(this.cookieService.get('client'))).code).then(listes => {
            this.listes = listes;
        });
    }

    doSave() {
        this.listeService.save(this.liste).then(liste => {
            this.listes.push(liste);
            this.liste = new Liste();
            this.modalService.close('addliste');
        });
    }

}
