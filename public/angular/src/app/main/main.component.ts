import { Component, OnInit } from '@angular/core';
import { Title } from '@angular/platform-browser';

declare var jquery:any;
declare var $ :any;

@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.scss']
})
export class MainComponent implements OnInit {

  constructor(private titleService: Title) { }
  
  ngOnInit() {
    this.titleService.setTitle( "Travoo" );
    $.getScript('assets/js/script.js');
  }

}
