<?php

/** ========================================
* Creating Table Employee
===========================================*/ 
CREATE TABLE employee (
    emp_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    birth_day DATE,
    sex VARCHAR(1),
    salary INT,
    super_id INT,
    branch_id INT,
    PRIMARY KEY(emp_id)
);


/** ========================================
* Creating Table Branch
===========================================*/ 
/**
* Using Foreign Key
*/
CREATE TABLE branch (
    branch_id INT NOT NULL AUTO_INCREMENT,
    branch_name VARCHAR(40) NOT NULL,
    mgr_id INT,
    mgr_start_date DATE,
    PRIMARY KEY(branch_id),
    FOREIGN KEY(mgr_id) REFERENCES employee(emp_id) ON DELETE SET NULL
);


/**
* After creating the employee table now let's set the branch_id as a foreign kew of branch table
*/
ALTER TABLE employee
ADD FOREIGN KEY(branch_id)
REFERENCES branch(branch_id)
ON DELETE SET NULL;


/**
* After creating the employee table now let's set the super_id as foreign key of emp_id
*/
ALTER TABLE employee
ADD FOREIGN KEY(super_id)
REFERENCES employee(emp_id)
ON DELETE SET NULL;



/** ========================================
* Creating Table Client
===========================================*/ 
/**
* Using Foreign Key
*/
CREATE TABLE client (
    client_id INT NOT NULL AUTO_INCREMENT,
    client_name VARCHAR(40),
    branch_id INT,
    PRIMARY KEY(client_id),
    FOREIGN KEY(branch_id) REFERENCES branch(branch_id) ON DELETE SET NULL
);


/** ========================================
* Creating Table works_with
===========================================*/ 
/**
* Using Foreign Key
* Using On Delete Cascade
*/
CREATE TABLE works_with (
    emp_id INT,
    client_id INT,
    total_sales INT,
    PRIMARY KEY(emp_id, client_id),
    FOREIGN KEY(emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE,
    FOREIGN KEY(client_id) REFERENCES client(client_id) ON DELETE CASCADE
); 


/** ========================================
* Creating Table branch_supplier
===========================================*/ 
/**
* Using Foreign Key
* Using On Delete Cascade
*/
CREATE TABLE branch_supplier (
    branch_id INT,
    supplier_name VARCHAR(40),
    supply_type VARCHAR(40),
    PRIMARY KEY(branch_id, supplier_name),
    FOREIGN KEY(branch_id) REFERENCES branch_id(branch_id) ON DELETE CASCADE
);


/** ========================================
* INSERTING DATA TO TABLES
===========================================*/ 

-- Corporate
INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('David', 'Wallace', '1967-11-17', 'M', 250000, NULL, NULL);

INSERT INTO branch (`branch_name`, `mgr_id`, `mgr_start_date`) VALUES('Corporate', 1, '2006-02-09');

UPDATE employee
SET branch_id = 1
WHERE emp_id = 1;


INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Jan', 'Levinson', '1961-05-11', 'F', 110000, 1, 1);



-- Scranton
INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Michael', 'Scott', '1964-03-15', 'M', 75000, 1, NULL);

INSERT INTO branch (`branch_name`, `mgr_id`, `mgr_start_date`) VALUES('Scranton', 3, '1992-04-06');

UPDATE employee
SET branch_id = 2
WHERE emp_id = 3;

INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Angela', 'Martin', '1971-06-25', 'F', 63000, 3, 2);

INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Kelly', 'Kapoor', '1980-02-05', 'F', 55000, 3, 2);

INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Stanley', 'Hudson', '1958-02-19', 'M', 69000, 3, 2);





-- Stamford
INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Josh', 'Porter', '1969-09-05', 'M', 78000, 1, NULL);

INSERT INTO branch (`branch_name`, `mgr_id`, `mgr_start_date`) VALUES('Stamford', 7, '1998-02-13');

UPDATE employee
SET branch_id = 3
WHERE emp_id = 7;

INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Andy', 'Bernard', '1973-07-22', 'M', 65000, 7, 3);

INSERT INTO employee (`first_name`, `last_name`, `birth_day`, `sex`, `salary`, `super_id`, `branch_id`) 
VALUES('Jim', 'Halpert', '1978-10-01', 'M', 71000, 7, 3);




-- BRANCH SUPPLIER
INSERT INTO branch_supplier VALUES(2, 'Hammer Mill', 'Paper');
INSERT INTO branch_supplier VALUES(2, 'Uni-ball', 'Writing Utensils');
INSERT INTO branch_supplier VALUES(3, 'Patriot Paper', 'Paper');
INSERT INTO branch_supplier VALUES(2, 'J.T. Forms & Labels', 'Custom Forms');
INSERT INTO branch_supplier VALUES(3, 'Uni-ball', 'Writing Utensils');
INSERT INTO branch_supplier VALUES(3, 'Hammer Mill', 'Paper');
INSERT INTO branch_supplier VALUES(3, 'Stamford Lables', 'Custom Forms');




-- CLIENT
INSERT INTO client (`client_name`, `branch_id`) VALUES('Dunmore Highschool', 2);
INSERT INTO client (`client_name`, `branch_id`) VALUES('Lackawana Country', 2);
INSERT INTO client (`client_name`, `branch_id`) VALUES('FedEx', 3);
INSERT INTO client (`client_name`, `branch_id`) VALUES('John Daly Law, LLC', 3);
INSERT INTO client (`client_name`, `branch_id`) VALUES('Scranton Whitepages', 2);
INSERT INTO client (`client_name`, `branch_id`) VALUES('Times Newspaper', 3);
INSERT INTO client (`client_name`, `branch_id`) VALUES('FedEx', 2);



-- WORKS_WITH
INSERT INTO works_with VALUES(6, 8, 55000);
INSERT INTO works_with VALUES(3, 9, 267000);
INSERT INTO works_with VALUES(9, 9, 22500);
INSERT INTO works_with VALUES(8, 10, 5000);
INSERT INTO works_with VALUES(9, 10, 12000);
INSERT INTO works_with VALUES(6, 11, 33000);
INSERT INTO works_with VALUES(8, 12, 26000);
INSERT INTO works_with VALUES(3, 13, 15000);
INSERT INTO works_with VALUES(6, 13, 130000);






/** ========================================
* MAKE SOME SELECT QUERIES ON THE COMPANY DATABASE
===========================================*/ 
/**  
* Select employee order by salary high to low or low to high
*/
SELECT * FROM employee
ORDER BY salary DESC;



/**  
* Select employee order by sex and then name
*/
SELECT * FROM employee
ORDER BY sex DESC, first_name, last_name;


/**  
* Change column name with AS keyword
*/
SELECT first_name as FURENAME, last_name AS SURENAME
FROM employee;


/**
* SELECT THE DISTINCT FROM A TABLE
*/
SELECT DISTINCT sex FROM employee;

 

/** ========================================
* SQL FUNCTIONS
===========================================*/ 

/**
* COUNT THE NUMBER OF ROWS HAVE IN THE TABLE WITH COUNT
*/
SELECT COUNT(emp_id)
FROM employee;


/**
* COUNT ACTUALLY COUNT THAT HOW MANY ROWS HAVE THAT DATA
*/
SELECT COUNT(super_id)
FROM employee;


/**
* FIND THE NUMBER OF FEMALE EMPLOYEE BORN AFTER 1970
*/
SELECT COUNT(emp_id) FROM employee
WHERE employee.sex = "F"
AND employee.birth_day > '1970-01-01';


/**
* Find the average salary of all the employee
*/
SELECT AVG(salary)
FROM employee
WHERE employee.sex = "M";

/**
* Find the Sum of salary of all the female employee
*/
SELECT SUM(salary)
FROM employee
WHERE employee.sex = "F";


/**
* COUNT HOW MANY MALE EMPLOYEE IN THE COMPANY
*/
SELECT COUNT(emp_id) FROM employee
WHERE employee.sex = "M";


/**
* COUNT HOW MANY FEMALE EMPLOYEE IN THE COMPANY
*/
SELECT COUNT(emp_id) FROM employee
WHERE employee.sex = "F";


/**
* COUNT HOW MANY MATE AND FEMALE EMPLOYEE IN THE COMPANY
* USING AGGREGATE FUNCTION
*/
SELECT sex as SEX, COUNT(emp_id) as Total
FROM employee
GROUP BY employee.sex;


/**
* Count the employees by their associated branch
* USING AGGREGATE FUNCTION
*/
SELECT branch_id as Branch, COUNT(branch_id) as Total
FROM employee
GROUP BY employee.branch_id;


/**
* Find the total sales of Each Employee
* USING AGGREGATE FUNCTION
*/
SELECT emp_id as Employe, SUM(total_sales) as Total
FROM works_with
GROUP BY emp_id
ORDER BY total_sales DESC;


/**
* fIND THE TOTAL PURCHASE OF EACH CLIENT
* USING AGGREGATE FUNCTION
*/
SELECT client_id as Client, SUM(works_with.total_sales) AS Total
FROM works_with
GROUP BY works_with.client_id
ORDER BY Total DESC;




/** ========================================
* SQL SEARCH FUNCTIONALITIES
===========================================*/ 

/** ===============================================================
* WILDCARS: % - Any number of charecter and _ - one charecter
==================================================================*/ 

-- Find all the clients who are with LLC
-- Using LIKE
SELECT * FROM client
WHERE client_name LIKE '%LLC';


-- Find all the clients who are NOT with LLC
SELECT * FROM client
WHERE client_name NOT LIKE '%LLC';


-- Find any branch suppliers who are in label business
SELECT * FROM branch_supplier
WHERE supplier_name LIKE '% label%';



-- Find anh employee who's date of birth in specified month
SELECT * FROM employee
WHERE birth_day  LIKE '____-02-%';


-- Find anh employee who's date of birth is not in specified month
SELECT * FROM employee
WHERE birth_day NOT LIKE '____-02-%';


 

/** ========================================
* UNION OPERATION IN MYSQL DATABASE
===========================================*/ 
SELECT first_name AS Company_Names
FROM employee
UNION SELECT branch_name
FROM branch
UNION SELECT client_name
FROM client
ORDER BY Company_Names;