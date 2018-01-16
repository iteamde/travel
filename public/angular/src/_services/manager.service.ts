import { Injectable } from '@angular/core';

@Injectable()
export class ManagerService {
  apiPrefix: string = "http://localhost/travo/public/api"
  constructor() { }

}
