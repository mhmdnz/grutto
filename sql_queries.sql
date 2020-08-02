use interview;
-- //task 1
select sum(order_details.price) as "Total revenue" from orders join order_details on order_details.order_id=orders.id where orders.user_id = 100 and orders.status = "completed" and orders.created_at >= "2020-01-01";
-- //task 2
select count(*),packages.title, products.stock_status from packages JOIN products ON packages.slug COLLATE utf8mb4_unicode_ci = products.package_slug group by packages.title,products.stock_status;
-- //task 3
select packages.title, products.title as products_title,products.weight,products.stock_status from packages JOIN products ON packages.slug COLLATE utf8mb4_unicode_ci = products.package_slug where packages.status = 'published' and products.stock_status = 'instock' group by title;
-- //task 4
select date ,count(users) as 'Acquisition user', sum(price) as 'Total revenue' from (select date(orders.created_at) as date,orders.user_id as users, sum(order_details.price) as price from orders join order_details on order_details.order_id=orders.id where orders.created_at between '2020-07-20' and '2020-07-25' group by date,users) total_by_user group by date;
-- //task 5
delimiter //
CREATE PROCEDURE SalesBaseOnCategoryTitle (IN category_title CHAR(30))
BEGIN
select sum(order_details.quantity) as "Quantities", date(orders.created_at) as date from orders join order_details on order_details.order_id=orders.id join packages on order_details.package_id=packages.id where packages.title = category_title and orders.status = "completed" group by date;
END//
-- //for test
delimiter ;
CALL SalesBaseOnCategoryTitle('Fake package #1');
