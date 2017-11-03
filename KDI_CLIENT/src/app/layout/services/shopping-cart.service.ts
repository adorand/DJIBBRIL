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


const CART_KEY = 'panier';

@Injectable()
export class ShoppingCartService {
    private subscriptionObservable: Observable<ShoppingCart>;
    private subscribers: Array<Observer<ShoppingCart>> = new Array<Observer<ShoppingCart>>();
    private client: Client;

    public constructor(private cookies: CookieService,
                       private detailcommandeService: DetailcommandeService) {
        this.subscriptionObservable = new Observable<ShoppingCart>((observer: Observer<ShoppingCart>) => {
            this.subscribers.push(observer);
            observer.next(this.retrieve());
            return () => {
                this.subscribers = this.subscribers.filter((obs) => obs !== observer);
            };
        });
    }

    public get(): Observable<ShoppingCart> {
        return this.subscriptionObservable;
    }

    public actionItem(product: Produit, action: string = '+'): CartItem {
        const cart = this.retrieve();
        let item = cart.items.find((p) => p.productId === product.code);
        if (item === undefined) {
            item = new CartItem();
            item.productId = product.code;
            item.productDesignation = product.designation;
            item.productNamessctg = product.souscategorie.nom;
            item.productNamesurface = product.souscategorie.parent.surface.nom;
            item.prix = product.prix;
            cart.items.push(item);
        }
        item.quantity += action.indexOf('+') !== -1 ?  1 : -1;

        this.client = this.cookies.check('client') ? JSON.parse(this.cookies.get('client')) as Client : null;
        this.client !== null ? this.detailcommandeService.add({'produit_code': item.productId, 'client_code': this.client.code, 'quantite': item.quantity}).then(value => {
            item.quantity = value.quantite;
        }).catch(reason => {
            item.quantity += action.indexOf('+') !== -1 ?  -1 : +1;
        }) : '' ;

        cart.items = cart.items.filter((cartItem) => cartItem.quantity > 0);
        this.save(cart);
        this.dispatch(cart);
        return item;
    }



    public empty(): void {
        const newCart = new ShoppingCart();
        this.save(newCart);
        this.dispatch(newCart);
    }


    private retrieve(): ShoppingCart {
        const cart = new ShoppingCart();
        const storedCart = this.cookies.get(CART_KEY);
        if (storedCart) {
            cart.updateFrom(JSON.parse(storedCart));
        }
        return cart;
    }

    public shoppingCartAuth(commande: Commande): void {

        const cart = new ShoppingCart();
        const items = [];
        commande.details.forEach(detail => {
            const cartItem = new CartItem();
            cartItem.quantity = detail.quantite;
            cartItem.productId = detail.produit.code;
            items.push(cartItem);
        });
        cart.updateFrom({ 'items': items } as ShoppingCart);
        this.save(cart);
    }

    private save(cart: ShoppingCart): void {
        this.cookies.set(CART_KEY, JSON.stringify(cart), null, '/');
    }

    private dispatch(cart: ShoppingCart): void {
        this.subscribers
            .forEach((sub) => {
                try {
                    sub.next(cart);
                } catch (e) {
                    // we want all subscribers to get the update even if one errors.
                }
            });
    }
}
