import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateTripPlanComponent } from './create-trip-plan.component';

describe('CreateTripPlanComponent', () => {
  let component: CreateTripPlanComponent;
  let fixture: ComponentFixture<CreateTripPlanComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreateTripPlanComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateTripPlanComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
