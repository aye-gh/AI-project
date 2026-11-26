SWEET BITE BAKERY WEBSITE
=========================

FEATURES
- Responsive homepage
- Product menu loaded from MySQL
- Customer order form
- PHP backend saves orders in MySQL
- JavaScript calculates the estimated total and validates quantity
- Demo admin page displays received orders

REQUIREMENTS
- XAMPP (Apache + MySQL)
- PHP 7.4+ (PHP 8 recommended)
- MySQL

HOW TO RUN
1. Install and open XAMPP.
2. Start Apache and MySQL.
3. Copy the folder "sweet_bite_bakery" into:
   C:\xampp\htdocs\
4. Open http://localhost/phpmyadmin in your browser.
5. Click Import and select database.sql from this project.
   Run the import.
6. Check config.php. Default XAMPP settings are:
   host = localhost
   database = sweet_bite_bakery
   username = root
   password = (blank)
7. Open:
   http://localhost/sweet_bite_bakery/

PAGES
- index.php: Home page
- menu.php: Products from database
- order.php: Customer order form; stores order in database
- admin.php: Shows submitted orders (classroom demonstration only)

IMPORTANT
- Product photos are loaded from Unsplash, so internet access is needed for those images.
- The admin.php page has no login protection. It is for a local class demonstration only.
  Add proper admin authentication before putting a website online.
- This demo records orders; it does not process online payments or send confirmation emails.
- Update product names, descriptions, prices and image links in phpMyAdmin or database.sql.

GROUP OF FIVE - SUGGESTED WORK DIVISION
1. Member 1: Homepage (index.php) and design
2. Member 2: Menu page (menu.php) and product data
3. Member 3: Order form (order.php) and JavaScript
4. Member 4: PHP database connection and SQL tables
5. Member 5: Admin page, testing and project documentation
