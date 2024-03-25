import { Component, OnInit } from '@angular/core';
import { elementAt } from 'rxjs';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent implements OnInit{

  isloggedin!: boolean;
  ngOnInit(): void {
    this.checkUser();
  }
  
  checkUser(){
    if(sessionStorage.getItem('isLoggedIn')){
      return true;
    }
    else{
      return false;
    }
  }

}
