@echo off
title Student Result Portal - Q2 Setup
echo ==========================================
echo       STUDENT RESULT PORTAL - Q2
echo ==========================================
where php >nul 2>nul
if errorlevel 1 (
  echo PHP was not found. Install PHP 8.2 or newer and add it to PATH.
  pause
  exit /b 1
)
where composer >nul 2>nul
if errorlevel 1 (
  echo Composer was not found. Install Composer and add it to PATH.
  pause
  exit /b 1
)

if not exist .env copy .env.example .env
if not exist database\database.sqlite type nul > database\database.sqlite

echo Installing Laravel dependencies...
composer install
if errorlevel 1 goto error

echo Generating application key...
php artisan key:generate
if errorlevel 1 goto error

echo Running database migrations and demo admin seeder...
php artisan migrate --seed
if errorlevel 1 goto error

echo.
echo Setup completed!
echo Run: php artisan serve
echo Open: http://127.0.0.1:8000
echo Demo login: admin@example.com
echo Password: password123
pause
exit /b 0

:error
echo.
echo Setup failed. Check the error above.
pause
exit /b 1
