CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    location VARCHAR(255)
);

CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description VARCHAR(255),
    price DECIMAL(10, 2),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

CREATE TABLE Order_Items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

INSERT INTO Customers (name, email, location)
VALUES
    ('John Smith', 'john@example.com', 'New York'),
    ('Jane Doe', 'jane@example.com', 'Los Angeles'),
    ('Mike Johnson', 'mike@example.com', 'Chicago'),
    ('Emily Wilson', 'emily@example.com', 'Houston'),
    ('David Lee', 'david@example.com', 'San Francisco');

INSERT INTO Categories (name)
VALUES
    ('Category 1'),
    ('Category 2'),
    ('Category 3'),
    ('Category 4'),
    ('Category 5'),
    ('Category 6'),
    ('Category 7'),
    ('Category 8'),
    ('Category 9'),
    ('Category 10');

INSERT INTO Products (name, description, price, category_id)
VALUES
    ('Product A', 'Description of Product A', 19.99, 1),
    ('Product B', 'Description of Product B', 29.99, 2),
    ('Product C', 'Description of Product C', 9.99, 3),
    ('Product D', 'Description of Product D', 49.99, 4),
    ('Product E', 'Description of Product E', 14.99, 5);
    
INSERT INTO Orders (customer_id, order_date, total_amount)
VALUES
    (1, '2023-01-01', 49.98),
    (2, '2023-01-02', 59.99),
    (3, '2023-01-03', 29.97),
    (4, '2023-01-04', 99.96),
    (5, '2023-01-05', 34.98);

INSERT INTO Order_Items (order_id, product_id, quantity, unit_price)
VALUES
    (1, 1, 2, 19.99),
    (2, 2, 1, 29.99),
    (3, 3, 3, 9.99),
    (4, 4, 2, 49.99),
    (5, 5, 2, 14.99);

UPDATE Orders
SET total_amount = (
    SELECT SUM(Order_Items.quantity * Order_Items.unit_price) AS total_cost
    FROM Order_Items Order_Items
    WHERE Order_Items.order_id = Orders.order_id
    GROUP BY Order_Items.order_id
);