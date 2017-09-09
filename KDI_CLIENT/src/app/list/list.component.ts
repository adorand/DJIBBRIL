import { Component, OnInit } from '@angular/core';
import {LocalStorageService} from 'ng2-webstorage';

@Component({
    selector: 'app-list',
    templateUrl: './list.component.html',
    styleUrls: ['./list.component.css'],
    providers: []
})
export class ListComponent {

    attribute: string;
    constructor(private storage: LocalStorageService) { }

    retrieveValue() {
        this.attribute = JSON.stringify(this.storage.retrieve('listesurfaces'));
    }

}
