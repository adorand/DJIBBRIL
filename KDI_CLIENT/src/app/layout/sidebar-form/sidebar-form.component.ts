import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';

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
    constructor(private userService: UserService, private location: Location) {

    }

    ngOnInit(): void {
        // this.user = new UserClass(0, '', '', '',
        //     '', [], []);
        this.user = {code: '', name: 'fgf', email: '', password: '', telephone: '', commandes: [], listes: [] };
    }

    save(name: string, email: string, password: string, telephone: string): void {
        console.log('entrer');
        this.user.name = name;
        this.user.email = email;
        this.user.password = password;
        this.user.telephone = telephone;
        console.log(JSON.stringify(this.user));
    }

    onSubmit(): void {
        this.userService.createget(this.user).then(user => console.log(user));
        console.log(JSON.stringify(this.user));
    }


    goBack(): void {
        this.location.back();
    }

    get diagnostic() { return JSON.stringify(this.user); }

}
