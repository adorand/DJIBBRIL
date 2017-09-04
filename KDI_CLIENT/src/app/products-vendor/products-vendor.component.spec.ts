import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductsVendorComponent } from './products-vendor.component';

describe('ProductsVendorsComponent', () => {
  let component: ProductsVendorComponent;
  let fixture: ComponentFixture<ProductsVendorComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProductsVendorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductsVendorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
