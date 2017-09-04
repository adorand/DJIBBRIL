import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import {HttpClientModule} from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { FormsModule } from '@angular/forms';

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
import { DeliveryComponent } from './delivery/delivery.component';
import { SettingsComponent } from './settings/settings.component';
import {UserService} from './layout/services/User/user.service';





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
        SettingsComponent
    ],
    imports: [
        BrowserModule,
        HttpModule,
        HttpClientModule,
        AppRoutingModule,
        FormsModule
    ],
    providers: [UserService],
    bootstrap: [AppComponent]
})
export class AppModule { }