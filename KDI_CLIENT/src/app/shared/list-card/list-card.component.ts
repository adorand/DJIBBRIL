import {Component, Input, OnInit} from '@angular/core';
import {DetailListe} from '../../layout/models/detailliste.model';
import {Liste} from '../../layout/models/liste.model';

@Component({
  selector: 'app-list-card',
  templateUrl: './list-card.component.html',
  styleUrls: ['./list-card.component.css']
})
export class ListCardComponent implements OnInit {

    @Input('list-card') liste: Liste;

    constructor() { }

    ngOnInit() {

    }

}
