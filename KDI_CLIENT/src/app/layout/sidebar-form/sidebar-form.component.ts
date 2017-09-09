import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';
import {HttpClient} from '@angular/common/http';

import {UserClass} from '../services/User/user.class';
import {UserService} from '../services/User/user.service';

@Component({
  selector: 'app-sidebar-form',
  templateUrl: './sidebar-form.component.html',
  styleUrls: ['./sidebar-form.component.css']
})
export class SidebarFormComponent implements OnInit {

    // user = new UserClass(0, '', '', '', '', [], []);
    user: UserClass;
    constructor(private userService: UserService, private location: Location, private httpclient: HttpClient) {

    }

    ngOnInit(): void {
        // this.user = new UserClass(0, '', '', '',
        //     '', [], []);
        this.user = {code: '', name: 'fgf', email: '', password: '', telephone: '', commandes: [], listes: [] };
    }

    save(): void {
        this.userService.createget(this.user).then(user => console.log(this.user));

        console.log(this.user.code);
    }



    // onSubmit(): void {
    //     this.userService.createget(this.user).then(user => console.log(user));
    //     console.log(JSON.stringify(this.user));
    // }


    goBack(): void {
        this.location.back();
    }

    get diagnostic() { return JSON.stringify(this.user); }

}
