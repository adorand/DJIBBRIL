import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  nomproduit: string;

  constructor(
      private router: Router,
      private route: ActivatedRoute) { }

  ngOnInit() {
  }

  gotosearch()
  {
      this.router.navigate(['/produits-recherche/', this.nomproduit]);
  }

}
