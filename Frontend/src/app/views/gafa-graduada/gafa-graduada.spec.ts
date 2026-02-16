import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GafaGraduada } from './gafa-graduada';

describe('GafaGraduada', () => {
  let component: GafaGraduada;
  let fixture: ComponentFixture<GafaGraduada>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [GafaGraduada]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GafaGraduada);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
