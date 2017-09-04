import { Injectable } from '@angular/core';

import { SurfaceClass } from './surface.class';
import { SURFACES } from './mock-surfaces';

@Injectable()
export class SurfaceService
{
    getall(): Promise<SurfaceClass[]> {
        return Promise.resolve(SURFACES);
    }
}