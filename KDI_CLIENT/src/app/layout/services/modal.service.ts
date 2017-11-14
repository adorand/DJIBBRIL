import { Injectable } from '@angular/core';

declare var jquery: any;
declare var $: any;

@Injectable()
export class ModalService
{

    constructor() {

    }

    show(modalId: string) {
        $('#' + modalId).modal('show');
    }

    close(modalId: string) {
        $('#' + modalId).modal('toggle');
    }

}