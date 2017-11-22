import {Component, OnInit} from '@angular/core';

import { CookieService } from 'ngx-cookie-service';
import {ShoppingCart} from './layout/models/shopping-cart.model';
import {ShoppingCartService} from './layout/services/shopping-cart.service';
import {NotificationService} from './layout/services/notification.service';


@Component({
    selector: 'app-root',
    templateUrl: './app.component.html'
})
export class AppComponent implements OnInit {
    title = 'app';

    constructor(private cookies: CookieService) {
    }

    ngOnInit(): void {

        // TODO : Mettre des animations pour faire un semblant de réactualisation

    }

}
