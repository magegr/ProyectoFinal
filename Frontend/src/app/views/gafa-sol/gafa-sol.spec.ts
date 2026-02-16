import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GafaSol } from './gafa-sol';

describe('GafaSol', () => {
  let component: GafaSol;
  let fixture: ComponentFixture<GafaSol>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [GafaSol]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GafaSol);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
