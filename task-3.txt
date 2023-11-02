SELECT categories.name, SUM(order_items.quantity * order_items.unit_price) AS total_revenue
FROM Categories
JOIN Products ON categories.category_id = products.category_id
JOIN Order_Items order_items ON products.product_id = order_items.product_id
GROUP BY categories.name
ORDER BY total_revenue DESC;