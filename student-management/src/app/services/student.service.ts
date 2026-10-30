import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class StudentService {
  private apiUrl = 'http://localhost:8080/pract/student-management/src/backend/api/students.php';

  constructor(private http: HttpClient) { }

  getStudents() {
    return this.http.get(this.apiUrl);
  }
}
