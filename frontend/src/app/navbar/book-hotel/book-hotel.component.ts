import { Component, OnInit } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { Router } from '@angular/router';
import { jwtDecode } from 'jwt-decode';

@Component({
  selector: 'app-book-hotel',
  templateUrl: './book-hotel.component.html',
  styleUrl: './book-hotel.component.css',
})
export class BookHotelComponent implements OnInit {
  hotels: any[] = [];

  constructor(
    private servicesService: ServicesService,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.fetchHotels();
  }

  // Method to fetch hotels data from the service
  fetchHotels(): void {

    // const userdata = jwtDecode(JSON.stringify(sessionStorage.getItem('token')));
    // console.log(userdata);
    // const token = sessionStorage.getItem('token')
    // if (token) {
    //   const decodedToken: any = jwtDecode(token);
    //   const user = decodedToken.user;
    //   const userId = user.id;
    //   console.log(user); // User data
    //   console.log(userId);
    // }

    this.servicesService.getHotels().subscribe((data) => {
      this.hotels = data; // Assign fetched data to hotels array
      // Generate random ratings for each hotel
      this.hotels.forEach((hotel) => {
        hotel.rating = this.generateRandomRating();
        this.servicesService.getNumberOfRoomsAvailable(hotel.id).subscribe(rooms => {
          hotel.availableRooms = rooms; // Assign number of rooms available to the hotel object
        });
        hotel.showBookingForm = false; // Initialize the flag to hide the booking form
      });
    });
  }

  // Method to generate a random rating between 3.0 and 5.0
  generateRandomRating(): number {
    return Math.floor(Math.random() * (5 - 3.0 + 1)) + 3.0;
  }


  getStarArray(rating: number): number[] {
    const starsCount = Math.floor(rating);
    const halfStar = rating % 1 !== 0;
    return Array.from({ length: starsCount })
      .map((_, index) => index + 1)
      .concat(halfStar ? [0.5] : []);
  }

  toggleBookingForm(hotel: any): void {
    // Toggle booking form visibility for the selected hotel
    hotel.showBookingForm = !hotel.showBookingForm;
  }

  checkUser() {
    if (sessionStorage.getItem('isLoggedIn')) {
      return true;
    }
    else {
      return false;
    }
  }

}
