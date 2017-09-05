import {Component, OnInit} from '@angular/core';

import { SurfaceClass } from './layout/services/surface/surface.class';
import { SurfaceService } from './layout/services/surface/surface.service';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
    providers: [SurfaceService]
})
export class AppComponent implements OnInit{
    title = 'app';

    surfaces: SurfaceClass[];
    getSurfaces(): void {
        this.surfaceService.getall().then(surfaces => this.surfaces = surfaces);
    }



    constructor(private surfaceService: SurfaceService)
    {

    }

    ngOnInit(): void {
      this.getSurfaces();
    }

}
