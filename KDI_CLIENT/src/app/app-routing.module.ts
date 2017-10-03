import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './home/home.component';
import { HistoryComponent } from './history/history.component';
import { ListComponent } from './list/list.component';
import { ProductsSearchComponent } from './products-search/products-search.component';
import { ProductsVendorComponent } from './products-vendor/products-vendor.component';
import { DeliveryComponent } from './delivery/delivery.component';
import { SettingsComponent } from './settings/settings.component';


const routes: Routes = [
    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: 'home', component: HomeComponent },
    { path: 'produits-recherche/:produit', component: ProductsSearchComponent },
    { path: 'produits-surface/:surface', component: ProductsVendorComponent },
    { path: 'livraison', component: DeliveryComponent },
    { path: 'historique', component: HistoryComponent },
    { path: 'liste', component: ListComponent },
    { path: 'parametres', component: SettingsComponent },
];

@NgModule({
    imports: [ RouterModule.forRoot(routes) ],
    exports: [ RouterModule ]
})
export class AppRoutingModule {}
