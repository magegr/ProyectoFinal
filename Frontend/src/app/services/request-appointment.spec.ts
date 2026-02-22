import { TestBed } from '@angular/core/testing';

import { RequestAppointment } from './request-appointment';

describe('RequestAppointment', () => {
  let service: RequestAppointment;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RequestAppointment);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
