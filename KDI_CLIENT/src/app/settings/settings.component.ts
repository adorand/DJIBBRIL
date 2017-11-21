import { Component, OnInit } from '@angular/core';
import { Client } from '../layout/models/client.model';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';
import {CookieService} from 'ngx-cookie-service';
import {ClientService} from '../layout/services/client.service';
import {validate} from 'codelyzer/walkerFactory/walkerFn';
import {NotificationService} from '../layout/services/notification.service';

@Component({
    selector: 'app-settings',
    templateUrl: './settings.component.html'
})
export class SettingsComponent implements OnInit {

    public client: Client;
    public validation: number;
    public password: any;

    constructor(private cookies: CookieService, private clientService: ClientService, public notificationService: NotificationService) {

    }

    ngOnInit() {

        this.validation = 0;
        this.password = this.initpassword();
        this.client = this.cookies.check('client') ? JSON.parse(this.cookies.get('client')) as Client : null;
        console.log(this.client);
    }

    initpassword(): any {
        return { current: null, new: null, confirm: null, email: null };
    }


    verifpassword(e): void {

        e.stopPropagation();
        this.clientService.login(this.client.email, this.password.current).then(client => {
            if (this.client.code === client.code ) {
                this.validation = 1;
            }
        }).catch(reason => {
            this.validation = 0;
            this.notificationService.showToast('error', 'MOT DE PASSE' , 'le mot de passe saisi est incorrecte');
        });
    }

    samepasswordChange(): void {
        this.validation = (this.password.new !== null && this.password.new === this.password.confirm) ? 2 : 1;
    }

    verifemail(): void {
        this.validation =(this.client.email === this.password.email) ? 3 : 2;
    }

    doSave() {
        if (this.validation === 3 ) {
            this.client.password = this.password.confirm;
            this.clientService.save(this.client).then(clientmodif => {
                this.validation = 0;
                this.clientService.client_cookie(clientmodif);
                this.password = this.initpassword();
                this.notificationService.showToast('success', 'PARAMÈTRES' , 'Modification effectuée avec succès');
            }).catch(reason => {
                this.notificationService.showToast('error', 'CONTACTEZ LE SERVICE CLIENT' , 'Problème depuis le serveur');
            });
        }
        else {
            this.notificationService.showToast('info', 'PARAMÈTRES' , 'Aucune modification effectuée');

        }
    }


    get diagnostic() { return JSON.stringify(this.password); }

}
