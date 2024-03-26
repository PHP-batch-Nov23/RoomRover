import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ServicesService } from '../../services/services.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent implements OnInit {
  errorMessage: string = '';
  token!: string;

  // email!: string;
  // password!: string;
  loginForm!: FormGroup;
  constructor(
    private fb: FormBuilder,
    private authService: ServicesService,
    private router: Router
  ) { }
  ngOnInit(): void {
    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required]
    })
  }

  get email() {
    return this.loginForm.controls['email'];
  }
  get password() { return this.loginForm.controls['password']; }

  loginUser() {
    const email = this.loginForm.get('email')?.value;
    const password = this.loginForm.get('password')?.value;
    this.authService.apilogin(email, password).subscribe(
      (response: any) => {
        if (response.message == 'User login successful') {
          console.log(response);
          const token = response.token;
          sessionStorage.setItem('token', token);
          sessionStorage.setItem('isLoggedIn', 'true');
          Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            text: 'Welcome!',
            confirmButtonText: 'Continue'
          }).then((result) => {
            if (result.isConfirmed) {
              this.router.navigate(['/home']);
            }
          });
        } else if (response.message == 'Unauthorized user. User not approved.') {
          Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: 'Wait for Admin approval',
            confirmButtonText: 'OK'
          });
        }
        
        else {
          Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: 'Email or password is wrong',
            confirmButtonText: 'OK'
          });
        }
      },
      error => {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
          confirmButtonText: 'OK'
        });
      }
    );
  }

  
  redirectToRegister() {
    this.router.navigate(['/register']);
  }

}
