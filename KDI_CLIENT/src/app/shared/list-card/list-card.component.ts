import {Component, Input, OnInit} from '@angular/core';
import {DetailListe} from '../../layout/models/detailliste.model';
import {Liste} from '../../layout/models/liste.model';
import {Observable} from 'rxjs/Observable';
import {Observer} from 'rxjs/Observer';
import {ListeobservableService} from '../../layout/services/Listeobservable.service';

@Component({
  selector: 'app-list-card',
  templateUrl: './list-card.component.html',
  styleUrls: ['./list-card.component.css']
})
export class ListCardComponent implements OnInit {

    @Input('listcardId') listcardId: string;
    public liste: Liste;
    public total: number;
    constructor(private listeobservableService: ListeobservableService) {
    }

    ngOnInit() {
        this.listeobservableService.get().forEach(listes => {
            this.liste = listes.filter(liste => liste.code === this.listcardId)[0] as Liste;

            // TODO: Tous les detaillistes dont la quantité est superieur à zéro
            // this.liste.details = this.liste.details.filter(det => det.quantite > 0);

            this.total = 0 ;
            this.liste.details.forEach(det => {
                this.total = this.total + ( det.produit.prix * det.quantite );
            });
        });
    }

}
