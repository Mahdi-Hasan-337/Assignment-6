SELECT Customers.name AS CustomerName,SUM(orders.total_amount) AS TotalPurchaseAmount
FROM Customers
JOIN Orders ON Customers.customer_id = orders.customer_id
GROUP BY customers.customer_id, customers.name
ORDER BY TotalPurchaseAmount DESC
LIMIT 5;