import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';
import {HttpClient} from '@angular/common/http';
import {LocalStorage, LocalStorageService} from 'ng2-webstorage';

import {MembreClass} from '../services/membre/membre.class';
import {MembreService} from '../services/membre/membre.service';

@Component({
  selector: 'app-sidebar-form',
  templateUrl: './sidebar-form.component.html',
  styleUrls: ['./sidebar-form.component.css']
})
export class SidebarFormComponent implements OnInit {

    membre: MembreClass;
    login: string;
    password: string;
    errorlogin: string;

    constructor(
        private membreService: MembreService,
        private location: Location,
        private httpclient: HttpClient,
        private storage: LocalStorageService) {

    }

    ngOnInit(): void {
        this.membre = {code: '', nom: 'fgf', email: '', password: '', telephone: '', image: '', commandes: [], listes: [] };
    }

    doAuthentificate()
    {

    }

    save(): void
    {
        this.membreService.createget(this.membre).then(user => console.log(this.membre));

        console.log(this.membre.code);
    }



    // onSubmit(): void {
    //     this.userService.createget(this.user).then(user => console.log(user));
    //     console.log(JSON.stringify(this.user));
    // }


    goBack(): void {
        this.location.back();
    }

    get diagnostic() { return JSON.stringify(this.membre); }

}
