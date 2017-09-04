import {Component, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';

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



    constructor(private surfaceService: SurfaceService, private http: HttpClient)
    {

    }

    fetchdata(): void {
        /*this.http.get('/ext/add-user/{"code":"","name":"fgf","email":"m@test.com","password":"fffdf","telephone":"gfgfg","commandes":[],"listes":[]}')
            .toPromise()
            .then(response => console.log(response.json().data));*/
        this.http.get('/ext/add-user/{"code":"","name":"fgf","email":"m@test.com","password":"fffdf","telephone":"gfgfg","commandes":[],"listes":[]}').subscribe(data => {
            console.log(data);
        });
    }

    ngOnInit(): void {
      this.getSurfaces();
    }

}
