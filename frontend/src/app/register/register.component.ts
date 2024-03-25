import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { User } from '../interfaces/auth';
import { ServicesService } from '../services/services.service';
import { passwordMatchValidator } from '../shared/password-match.directive';
import Swal from 'sweetalert2';
import e from 'express';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit{

  successMessage: string = '';
  errorMessage: string = '';
  registerForm!: FormGroup;

  constructor(
    private fb: FormBuilder,
    private authService: ServicesService,
    private router: Router
  ) { }
  ngOnInit(): void {
    this.registerForm = this.fb.group({
      full_name: ['', [Validators.required, Validators.pattern(/^[a-zA-Z]+(?: [a-zA-Z]+)*$/)]],
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],
      contact: ['', Validators.required],
      confirmPassword: ['', Validators.required],
      hasPanCard: [''] ,// Add radio button control
      
    }, {
      validators: passwordMatchValidator
    });
  }

  get full_name() {
    return this.registerForm.controls['full_name'];
  }

  get email() {
    return this.registerForm.controls['email'];
  }

  get password() {
    return this.registerForm.controls['password'];
  }

  get confirmPassword() {
    return this.registerForm.controls['confirmPassword'];
  }

  submitDetails(e: Event) {
    e.preventDefault();
    // Check if the form is valid
    if (this.registerForm.valid) {
      // Check if the user has selected "Yes" for PAN card
      if (this.registerForm.get('hasPanCard')?.value === 'yes') {
        const postData = { ...this.registerForm.value };
        console.log(postData);
        
        delete postData.confirmPassword;
        delete postData.hasPanCard; // Exclude hasPanCard from form data
        this.authService.registerUser(postData as User).subscribe(
          response => {
            console.log(response);
            this.successMessage = 'Registered successfully';
            Swal.fire({
              icon: 'success',
              title: 'Registration Successful',
              text: 'Your registration has been submitted for approval.',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                this.router.navigate(['login']);
              }
            });
          },
          error => {
            console.log(error)
            this.errorMessage = 'Something went wrong';
            // Show error alert
            Swal.fire({
              icon: 'error',
              title: 'Registration Failed',
              text: 'Please try again later.',
              confirmButtonText: 'OK'
            });
          }
        );
      } else {
        this.errorMessage = 'Please provide PAN card information to get registered';
      }
    } 
    else {
      Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: 'Please fill all required fields correctly.',
        confirmButtonText: 'OK'
      });
    }
  }

  redirectToLogin() {
    this.router.navigate(['/login']);
  }
}



