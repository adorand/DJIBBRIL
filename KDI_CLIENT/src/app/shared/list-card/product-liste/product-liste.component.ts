import {Component, Input, OnInit, Output} from '@angular/core';
import {Produit} from '../../../layout/models/produit.model';
import {DetailListe} from '../../../layout/models/detailliste.model';
import {DetaillisteService} from '../../../layout/services/detailliste.service';
import {Liste} from '../../../layout/models/liste.model';
import {ListeobservableService} from '../../../layout/services/Listeobservable.service';

@Component({
  selector: 'app-product-liste',
  templateUrl: './product-liste.component.html',
  styleUrls: ['./product-liste.component.css']
})
export class ProductListeComponent implements OnInit {

    @Input('list-card') liste: Liste;
    @Input('detaillisteId') detaillisteId: number;
    public detailliste: DetailListe;

    
    constructor(private detaillisteService: DetaillisteService, private listeobservableService: ListeobservableService) { }


    ngOnInit() {
        this.detailliste = this.liste.details.filter(detail => detail.id === this.detaillisteId)[0] as DetailListe;
    }


    actionToListe(action: string, liste_code, event) {
        event.stopPropagation();
        action === '+' ? this.detailliste.quantite++ :  this.detailliste.quantite-- ;
        if (this.detailliste.quantite >= 0) {
            this.listeobservableService.actionItem(liste_code, this.detailliste.id, this.detailliste.quantite);
            this.detaillisteService.add({'produit_code': this.detailliste.produit.code, 'liste_code': liste_code, 'quantite': this.detailliste.quantite}).then(detail => {
                (detail != null) ? this.detailliste.quantite = detail.quantite : '' ;
            });
        }
        else {
            this.detailliste.quantite = 0;
        }
    }

}
