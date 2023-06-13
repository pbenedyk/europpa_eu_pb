# Europpa.eu - API Cat Shelter - Recruitement Test

This repository contains a simple Laravel API for managing shelters, cats, and employees.
## TEST API here: 
You can test API: https://europpa_eu.piotrbenedyk.pl

## Installation

1. Clone the repository: `git clone https://github.com/pbenedyk/europpa_eu_pb.git`
2. Install dependencies: `composer install`
3. Configure the database in the `.env` file
4. Run database migrations: `php artisan migrate`
5. Generate an application key: `php artisan key:generate`

## API Endpoints

### Shelters

- **GET /api/shelters**: Retrieve a list of all shelters.
- **POST /api/shelters**: Create a new shelter.
- **GET /api/shelters/{id}**: Retrieve a specific shelter by ID.
- **PUT /api/shelters/{id}**: Update a specific shelter by ID.
- **DELETE /api/shelters/{id}**: Delete a specific shelter by ID.

### Cats

- **GET /api/cats**: Retrieve a list of all cats.
- **POST /api/cats**: Create a new cat.
- **GET /api/cats/{id}**: Retrieve a specific cat by ID.
- **PUT /api/cats/{id}**: Update a specific cat by ID.
- **DELETE /api/cats/{id}**: Delete a specific cat by ID.

### Employees

- **GET /api/employees**: Retrieve a list of all employees.
- **POST /api/employees**: Create a new employee.
- **GET /api/employees/{id}**: Retrieve a specific employee by ID.
- **PUT /api/employees/{id}**: Update a specific employee by ID.
- **DELETE /api/employees/{id}**: Delete a specific employee by ID.




