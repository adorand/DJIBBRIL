import { Component, OnInit } from '@angular/core';
import { Surface } from '../layout/models/surface.model';
import {SurfaceService} from '../layout/services/surface.service';
import {CookieService} from 'ngx-cookie-service';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html'
})
export class HomeComponent implements OnInit{


    public surfaces: Surface[];


    constructor(
        private surfaceservice: SurfaceService,
        private cookieService: CookieService
    ) {}

    ngOnInit() {
        this.getsurfaces();
    }

    getsurfaces() {
        this.surfaceservice.getall('').then(surfaces => {
            this.surfaces = surfaces;
        });
    }

    gotosurface(codesurface) {
        this.surfaceservice.activatedsurface(codesurface);
    }






}
