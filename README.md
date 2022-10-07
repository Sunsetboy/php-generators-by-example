# Using generators in PHP by examples

Clone the repository, build and run containers

```bash
docker-compose build
docker-compose up
```

Log into the PHP container:
```bash
docker exec -ti php-generators bash
```

Fill the DB with demo data:
```bash
php src/fill_db.php
```

## Examples

### Processing a large array

```
src/create_array.php
```
In this example a sum of all elements of a large array is calculated. We can use `createArray` or `createArrayGenerator` 
to generate elements. The difference in amount of memory used in both cases is clear when a number of elements is about 1 million.

### Reading database records

```
src/read_db.php
```
In this example we read records from a DB to process them. The `fetchAll` function reads records to an array and 
stores it in memory. The `getReader` function returns a Generator object which could be used to iterate through records with much
less memory consumption.