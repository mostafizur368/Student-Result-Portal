# Student Result Portal — Question 2

Laravel 11 project for the exam task.

## Requirements
- PHP 8.2+
- Composer
- VS Code (recommended)

## Run on Windows
1. Extract the ZIP.
2. Open this folder in VS Code.
3. Open the terminal and run `setup.bat` (or double-click it).
4. After setup finishes, run:
   ```bash
   php artisan serve
   ```
5. Visit `http://127.0.0.1:8000`.

## Demo administrator
- Email: `admin@example.com`
- Password: `password123`

## Implemented requirements
- Students table: name, roll, department, email.
- Results table: student_id, course_marks, grade.
- One-to-many relationship: Student hasMany Results; Result belongsTo Student.
- Student and Result resource controllers with CRUD.
- Request validation and Blade validation error messages.
- Grade is calculated automatically from course marks.
- Create, edit and delete operations are protected by Laravel authentication middleware.
- Blade views for dashboard, student/result forms, and login.

## Grade scale used
- 80–100: A+
- 70–79: A
- 60–69: A-
- 50–59: B
- 40–49: C
- 0–39: F

The question does not specify a grading scale, so this project uses this editable example scale. Change `gradeFromMarks()` in `app/Models/Result.php` if your institution uses another scale.

## Useful commands
```bash
php artisan migrate:fresh --seed
php artisan serve
```
