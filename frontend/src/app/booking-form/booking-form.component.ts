import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ServicesService } from '../services/services.service';
import Swal from 'sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';
import { jwtDecode } from 'jwt-decode';
import { error } from 'node:console';

@Component({
  selector: 'app-booking-form',
  templateUrl: './booking-form.component.html',
  styleUrl: './booking-form.component.css'
})
export class BookingFormComponent implements OnInit {
  bookingForm!: FormGroup;
  bookings: any[] = [];

  constructor(
    private formBuilder: FormBuilder,
    private bookingService: ServicesService,
    private router: Router,
    private route: ActivatedRoute
  ) { }

  ngOnInit(): void {
    // this.initBookingForm();
    // this.fetchBookings();
    this.bookingForm = this.formBuilder.group({
      name: ['', Validators.required],
      arrivalDate: ['', Validators.required],
      departureDate: ['', Validators.required],
      numberOfPeople: ['', Validators.required],
      numberOfRooms: ['', Validators.required]
    });
    this.submitForm();

  }

  // submitForm() {
  //   if (this.bookingForm.valid) {
  //     this.bookingService.writeData(this.bookingForm.value).subscribe(
  //       (response: any) => {
  //         console.log('Data written successfully:', response);
  //         this.bookingForm.reset();
  //         this.fetchBookings();
  //         Swal.fire({
  //           title: 'Booking Confirmed!',
  //           text: 'Your booking has been confirmed.',
  //           icon: 'success',
  //           confirmButtonText: 'OK'
  //         }).then((result) => {
  //           if (result.isConfirmed) {
  //             this.router.navigate(['/past-bookings']);
  //           }
  //         });
  //         this.fetchBookings();
  //       },
  //       (error: any) => {
  //         console.error('Error writing data:', error);
  //       }
  //     );
  //   }
  // }

  submitForm() {
    if (this.bookingForm.valid) {
      const userdata = jwtDecode(JSON.stringify(sessionStorage.getItem('token')));
      console.log(userdata);
      const token = sessionStorage.getItem('token');
      if (token) {
        const decodedToken: any = jwtDecode(token);
        const user = decodedToken.user;
        const userId = user.id;
        console.log(user); // User data
        console.log(userId);
        this.route.paramMap.subscribe(params => {
          const hotelId = parseInt(params.get('hotelId')|| '', 10);
          console.log('Hotel ID:', hotelId);
          const nameValue = this.bookingForm?.get('name')?.value;
          const arrivalDateValue = this.bookingForm?.get('arrivalDate')?.value;
          const departureDateValue = this.bookingForm?.get('departureDate')?.value;
          const numberOfPeopleValue = this.bookingForm?.get('numberOfPeople')?.value;
          const numberOfRoomsValue = this.bookingForm?.get('numberOfRooms')?.value;

          this.bookingService.bookingData(userId, hotelId, nameValue, numberOfPeopleValue, arrivalDateValue, departureDateValue, numberOfRoomsValue).subscribe((res)=>{
            console.log(res);
            
            
          })
        });
      }
    }
  }

  fetchBookings(): void {
    this.bookingService.getBookings().subscribe((data: any) => { // Type assertion to 'any'
      if (data && data.bookings) {
        this.bookings = data.bookings;
      }
    });
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
