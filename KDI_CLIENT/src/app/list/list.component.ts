import { Component, OnInit } from '@angular/core';
import {ModalService} from '../layout/services/modal.service';
import {Liste} from '../layout/models/liste.model';
import {ListeService} from '../layout/services/liste.service';
import {CookieService} from 'ngx-cookie-service';
import {ListeobservableService} from '../layout/services/Listeobservable.service';
import {NotificationService} from '../layout/services/notification.service';

declare var jquery: any;
declare var $: any;

@Component({
    selector: 'app-list',
    templateUrl: './list.component.html'
})
export class ListComponent implements OnInit {
    liste: Liste;
    listes: Liste[];

    constructor(public listeobservableService: ListeobservableService,
                public modalService: ModalService,
                public cookieService: CookieService,
                public listeService: ListeService,
                public notificationService: NotificationService ) { }

    ngOnInit() {

        this.liste = new Liste();
        this.listeService.getall((JSON.parse(this.cookieService.get('client'))).code).then(listes => {
            this.listes = listes;
            this.listeobservableService.setListes(this.listes);
        });
    }

    doSave(): void {
        this.listeService.save(this.liste).then(liste => {
            this.listes.push(liste);
            this.listeobservableService.setListes(this.listes);
            this.liste = new Liste();
            this.modalService.close('addliste');
            this.notificationService.showToast('success', 'LISTE' , 'Nouvelle liste ajoutée avec succès');
        });
    }

}
