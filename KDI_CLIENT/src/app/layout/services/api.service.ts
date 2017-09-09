import {Injectable} from '@angular/core';

@Injectable()
export class ApiService {
    databaseId: string;

    constructor() {
        this.databaseId = '1234';
    }

    setdatabaseId(id: string)
    {
        this.databaseId = id;
    }
}