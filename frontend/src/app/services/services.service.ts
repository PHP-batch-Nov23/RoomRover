// services.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from '../interfaces/auth';

@Injectable({
  providedIn: 'root'
})
export class ServicesService {
  private baseUrl = 'http://localhost:3000'; // Assuming your JSON server is running on this port

  constructor(private http: HttpClient) { }

  registerUser(userDetails: User): Observable<any> {
    return this.http.post(`${this.baseUrl}/users`, userDetails);
  }

  getUserByEmail(email: string): Observable<User[]> {
    return this.http.get<User[]>(`${this.baseUrl}/users?email=${email}`);
  }

  getHotels(): Observable<any[]> {
    return this.http.get<any[]>(`${this.baseUrl}/hotels`);
  }

  // Define the writeData method to send data to the backend server
  writeData(formData: any): Observable<any> {
    return this.http.post<any>(this.baseUrl, formData);
  }

  // Define the getBookings method to fetch bookings data from the backend server
  getBookings(): Observable<any> {
    return this.http.get<any>('http://localhost:3000'); // Adjust the URL as needed
  }

  //connection with laravel rest api
 
}
