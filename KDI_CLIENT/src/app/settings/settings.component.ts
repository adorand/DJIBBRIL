import { Component, OnInit } from '@angular/core';
import { Client } from '../layout/models/client.model';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';

@Component({
    selector: 'app-settings',
    templateUrl: './settings.component.html'
})
export class SettingsComponent implements OnInit {

    public client: Client;

    constructor(private storage: LocalStorageService){ }

    ngOnInit() {
    }

}
