import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SaludVisual } from './salud-visual';

describe('SaludVisual', () => {
  let component: SaludVisual;
  let fixture: ComponentFixture<SaludVisual>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SaludVisual]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SaludVisual);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
