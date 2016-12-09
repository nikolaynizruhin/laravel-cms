# Laravel 5.3 CMS
### Features:
- CRUD Posts
- Full-text search
- Nested comments
- Categories
- Tags
- Pagination
- Admin panel
- Authorization
- Authentication
- User avatar
- Database seeding
- Tests
## Usage
### Step 1: Add to .env
`SCOUT_DRIVER=tntsearch`
### Step 2: Install dependencies
`composer install`
### Step 3: Run migrations with seeders
`php artisan migrate --seed`
### Step 4: Generate app key
`php artisan key:generate`
### Step 5: Create index file
`php artisan scout:import "App\Post"`