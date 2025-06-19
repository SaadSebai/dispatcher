# Getting Started
### 1. Install dependencies

```bash
composer i
```
### 2. Create environment file
```bash
cp .env.example .env
```

### 3. Generate application key
```bash
php artisan key:generate
```

### 4. Run migrations
```bash
php artisan migrate
```

### 5. Running the Server
```bash
php artisan serve
```

# API Usage
### Assign Nearest Driver
```GET /api/drivers/assign?lat={latitude}&lng={longitude}```

Query Parameters:

```lat``` – latitude of the pickup location (required)

```lng``` – longitude of the pickup location (required)

### Running Tests
```bash
php artisan test
```
