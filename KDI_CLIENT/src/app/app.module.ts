import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import {HttpClientModule} from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { FormsModule } from '@angular/forms';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {ToastModule} from 'ng2-toastr/ng2-toastr';


import { AppComponent } from './app.component';
import { HeaderComponent } from './layout/header/header.component';
import { FooterComponent } from './layout/footer/footer.component';
import { HomeComponent } from './home/home.component';
import { SidebarFormComponent } from './layout/sidebar-form/sidebar-form.component';
import { ModalComponent } from './layout/modal/modal.component';
import { HistoryComponent } from './history/history.component';
import { ListComponent } from './list/list.component';
import { ProductsSearchComponent } from './products-search/products-search.component';
import { ProductsVendorComponent } from './products-vendor/products-vendor.component';
import { ProductComponent } from './shared/product/product.component';
import { DeliveryComponent } from './delivery/delivery.component';
import { SettingsComponent } from './settings/settings.component';

import {ApiService} from './layout/services/api.service';
import {SurfaceService} from './layout/services/surface.service';
import { ClientService } from './layout/services/client.service';
import {DetailcommandeService} from './layout/services/detailcommande.service';

import {Ng2Webstorage} from 'ng2-webstorage';
import { ProductHistoComponent } from './shared/product-histo/product-histo.component';

import { CookieService } from 'ngx-cookie-service';

import {ShoppingCartService} from './layout/services/shopping-cart.service';
import {ProduitService} from './layout/services/produit.service';

@NgModule({
    declarations: [
        AppComponent,
        HeaderComponent,
        FooterComponent,
        HomeComponent,
        SidebarFormComponent,
        ModalComponent,
        HistoryComponent,
        ListComponent,
        ProductsSearchComponent,
        ProductsVendorComponent,
        DeliveryComponent,
        SettingsComponent,
        ProductComponent,
        ProductHistoComponent
    ],
    imports: [
        BrowserModule,
        HttpModule,
        HttpClientModule,
        AppRoutingModule,
        FormsModule,
        BrowserAnimationsModule,
        ToastModule.forRoot(),
        Ng2Webstorage
    ],
    providers: [ ShoppingCartService, CookieService, ApiService, SurfaceService, ClientService, ProduitService, DetailcommandeService],
    bootstrap: [AppComponent]
})
export class AppModule { }
