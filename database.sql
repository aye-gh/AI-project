CREATE DATABASE IF NOT EXISTS sweet_bite_bakery;
USE sweet_bite_bakery;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL DEFAULT 'Cake'
);

INSERT INTO products (name, description, price, image, category) VALUES
('Chocolate Fudge Cake', 'Rich chocolate cake with smooth ganache.', 1800, 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=700', 'Cakes'),
('Strawberry Cupcakes', 'Soft cupcakes topped with strawberry frosting.', 450, 'https://images.unsplash.com/photo-1486427944299-d1955d23e34d?w=700', 'Cupcakes'),
('Classic Donuts', 'Freshly baked donuts with a sweet glaze.', 250, 'https://images.unsplash.com/photo-1551024506-0bc0e5e7a5f4?w=700', 'Donuts'),
('Vanilla Birthday Cake', 'Light vanilla sponge for your special day.', 2200, 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=700', 'Cakes');

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    address TEXT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_order_product FOREIGN KEY (product_id) REFERENCES products(id)
);
