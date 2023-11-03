SELECT order_items.order_item_id, products.name, order_items.quantity, order_items.unit_price * order_items.quantity AS total_amount 
FROM Order_Items 
JOIN Products 
ON order_items.product_id = products.product_id 
ORDER BY order_items.order_id ASC;