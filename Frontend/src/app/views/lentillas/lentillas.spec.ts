import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Lentillas } from './lentillas';

describe('Lentillas', () => {
  let component: Lentillas;
  let fixture: ComponentFixture<Lentillas>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Lentillas]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Lentillas);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
