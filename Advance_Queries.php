<?php

/** ========================================
* MYSQL JOIN
===========================================*/ 

-- INSERT NEW BRANCH
INSERT INTO branch (`branch_name`, `mgr_id`, `mgr_start_date`) VALUES('Buffalo', NULL, NULL);


-- Find all the branches and the names of their managers
-- GENERAL JOIN / INNER JOIN
SELECT employee.emp_id AS SL_No, employee.first_name AS Name, branch.branch_name AS Branch_Name
FROM employee
JOIN branch
ON employee.emp_id = branch.mgr_id;

-- LEFT JOIN
-- Get all the items of the first table and then assign then matched itesm to the left table 
SELECT employee.emp_id AS SL_No, employee.first_name AS Name, branch.branch_name AS Branch_Name
FROM employee
LEFT JOIN branch
ON employee.emp_id = branch.mgr_id;

-- RIGHT JOIN
-- Get all the items of the second table and then assign then matched itesm to the right table 
SELECT employee.emp_id AS SL_No, employee.first_name AS Name, branch.branch_name AS Branch_Name
FROM employee
RIGHT JOIN branch
ON employee.emp_id = branch.mgr_id;



/** ========================================
* NESTED QUERIES
===========================================*/ 
-- Find the names of all the employees who have solve over 30k to a single client
-- Using IN() Function and Nested Queries

SELECT employee.first_name, employee.last_name
FROM employee
WHERE employee.emp_id IN (
    SELECT works_with.emp_id
    FROM works_with
    WHERE works_with.total_sales >= 30000
);


/** ========================================
* CHALLENGE TO GET 
===========================================*/
-- Find the employ who have sold at least 40k and list them with their total sale

SELECT employee.emp_id, employee.first_name, SUM(works_with.total_sales) as TOTAL_SALE
FROM employee, works_with
WHERE employee.emp_id = works_with.emp_id AND works_with.total_sales >= 40000
GROUP BY(works_with.emp_id);


-- Get the list of all the clients who's managed by manager Micheal Scott
-- Assume we have the Micheal Scott's id

SELECT client.client_id, client.client_name FROM client
WHERE branch_id = (
    SELECT branch_id 
    FROM branch
    WHERE mgr_id = 3
    LIMIT 1
);
