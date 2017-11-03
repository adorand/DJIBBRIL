import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductHistoComponent } from './product-histo.component';

describe('ProductHistoComponent', () => {
  let component: ProductHistoComponent;
  let fixture: ComponentFixture<ProductHistoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProductHistoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductHistoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
