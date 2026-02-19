import { TestBed } from '@angular/core/testing';

import { RequestClients } from './request-clients';

describe('RequestClients', () => {
  let service: RequestClients;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RequestClients);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
