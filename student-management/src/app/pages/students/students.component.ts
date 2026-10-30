import { Component, OnInit } from '@angular/core';
import { StudentService } from '../../services/student.service';

@Component({
  selector: 'app-students',
  standalone: true,
  imports: [],
  templateUrl: './students.component.html',
  styleUrl: './students.component.css'
})
export class StudentsComponent implements OnInit{
  students: any[] = [];

  constructor(private studentService: StudentService) {}

  ngOnInit(): void {
    this.studentService.getStudents().subscribe({
      next: (response: any) => {
        console.log('API Response: ', response);
        this.students = response.data;
      },

      error: (error) => {
        console.error('Error fetching students: ', error);
      }
    });
  }
}
