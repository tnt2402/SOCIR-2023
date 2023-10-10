#!/bin/bash

# Variables
DB_NAME="db_chal"
SQL_FILE="./test.sql"
DB_USER="tnt2402"
DB_PASSWORD="toor"


# Create or check for existence of database
mysql -u $DB_USER -p -e "DROP DATABASE $DB_NAME"
mysql -u $DB_USER -p -e "CREATE DATABASE $DB_NAME"

# Import the SQL file
mysql -u $DB_USER -p $DB_NAME < $SQL_FILE

# Print success message
echo "Database created and SQL file imported successfully!"