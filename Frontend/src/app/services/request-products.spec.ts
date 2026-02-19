import { TestBed } from '@angular/core/testing';

import { RequestProducts } from './request-products';

describe('RequestProducts', () => {
  let service: RequestProducts;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RequestProducts);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
