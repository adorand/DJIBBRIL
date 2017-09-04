import { Component, OnInit } from '@angular/core';
import { SurfaceClass} from "../layout/services/surface/surface.class"
import {SurfaceService} from "../layout/services/surface/surface.service"


@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css'],
    providers: [SurfaceService]
})
export class HomeComponent implements OnInit {

    surfaces: SurfaceClass[];
    getSurfaces(): void {
      this.surfaceService.getall().then(surfaces => this.surfaces = surfaces);
    }
    constructor(private surfaceService: SurfaceService) { }

    ngOnInit() {
        this.getSurfaces();
    }

}
