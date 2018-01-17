import { TestBed, inject } from '@angular/core/testing';

import { TravelStylesService } from './travel-styles.service';

describe('TravelStylesService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [TravelStylesService]
    });
  });

  it('should be created', inject([TravelStylesService], (service: TravelStylesService) => {
    expect(service).toBeTruthy();
  }));
});
