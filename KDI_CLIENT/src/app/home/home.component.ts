import { Component, OnInit } from '@angular/core';
import { SurfaceClass} from '../layout/services/surface/surface.class';
import {LocalStorage, LocalStorageService, SessionStorageService} from 'ng2-webstorage';
import {SurfaceService} from '../layout/services/surface/surface.service';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css'],
    providers: [SurfaceService]
})
export class HomeComponent implements OnInit{


    @LocalStorage('surfaces')
    public surfaces: SurfaceClass[];

    // private surfaces: SurfaceClass[];

    constructor(
        private storage: LocalStorageService,
        private surfaceservice: SurfaceService
    ) {}

    ngOnInit() {
        this.surfaceservice.getall().then(data => this.storage.store('surfaces', data ));
        console.log( JSON.stringify(this.storage.retrieve('surfaces')));
    }





}
