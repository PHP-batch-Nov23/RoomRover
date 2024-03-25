export interface User {
    full_name: string;
    email: string;
    password: string;
    contact: string;
}

export interface Booking {
    id: number;
    name: string;
    email: string;
    contactNumber: string;
    arrivalDate: string;
    departureDate: string;
    numberOfPeople: number;
    numberOfRooms: number;
    deleted: boolean;
    hotelName: string;
  }