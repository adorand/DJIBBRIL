import {Injectable} from '@angular/core';
import {Observable} from 'rxjs/Observable';
import { Observer } from 'rxjs/Observer';
import {CartItem} from '../models/cart-item.model';
import { Produit} from '../models/produit.model';
import {ShoppingCart} from '../models/shopping-cart.model';
import { CookieService } from 'ngx-cookie-service';
import {Commande} from '../models/commande.model';
import { DetailcommandeService } from './detailcommande.service';
import {Client} from '../models/client.model';
import {SousCategorie} from '../models/souscategorie.model';
import {SouscategorieService} from './souscategorie.service';
import {Liste} from '../models/liste.model';
import {DetailListe} from '../models/detailliste.model';



@Injectable()
export class ListeobservableService {
    private subscriptionObservable: Observable<Liste[]>;
    private subscribers: Array<Observer<Liste[]>> = new Array<Observer<Liste[]>>();
    public listes: Liste[];

    public constructor() {
        this.subscriptionObservable = new Observable<Liste[]>((observer: Observer<Liste[]>) => {
            this.subscribers.push(observer);
            observer.next(this.listes);
            return () => {
                this.subscribers = this.subscribers.filter((obs) => obs !== observer);
            };
        });
    }

    public get(): Observable<Liste[]> {
        return this.subscriptionObservable;
    }

    public setListes(listes: Liste[]): Liste[] {
        this.listes = listes;
        this.dispatch(listes);
        return listes;
    }


    public actionItem(listcardId: string, detaillisteId: number, quantite: number): void {
        (this.listes.filter(liste => liste.code === listcardId)[0] as Liste)
            .details.filter(detaillite => detaillite.id === detaillisteId)[0].quantite = quantite;
        this.setListes(this.listes);
    }


    public empty(): void {
        const newListes = [];
        this.setListes(newListes);
    }


    private dispatch(listes: Liste[]): void {
        this.subscribers
            .forEach((sub) => {
                try {
                    sub.next(listes);
                } catch (e) {
                    // we want all subscribers to get the update even if one errors.
                }
            });
    }
}
