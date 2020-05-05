<?php



/** ========================================
* Creating Table
===========================================*/ 

CREATE TABLE student (
    student_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    major VARCHAR(20) DEFAULT 'Undefined',
    gpa DECIMAL(3,2),
    email VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY(student_id)
);

/**
* Drop Table
*/ 
DROP TABLE student;


/**
* Insert Into Table
*/ 
INSERT INTO student VALUES(1, "Shamim Hossain", "CSE", 6.00);
INSERT INTO student (`name`, `gpa`) VALUES("Polash Mahmud", 4.00);


INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Saroar Hossain", "CSE", 5.00, "limonhossain57@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Polash Hossain", "EEE", 4.00, "polashmahmud@gmail.com");
INSERT INTO student (`name`, `gpa`, `email`) VALUES("Ashraful Islam", 3.00, "ashraful@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Salek Hossain", "CSE", 2.00, "salek@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Junayed Hossain", "MTE", 5.00, "junayed@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Masum Hossain", "PET", 5.00, "masum@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Roky Khan", "ENV", 5.00, "rokykhan@gmail.com");
INSERT INTO student (`name`, `major`, `gpa`, `email`) VALUES("Adil Shohan", "CONSTRUCTION", 5.00, "adilhasan@gmail.com");


/**
* Select Data From Table
*/ 
SELECT * FROM student;


DESCRIBE student;






/** ========================================
* Update Data Of a Table
===========================================*/ 

/**
* List of Comparision Operators
* = : Equal
* <> : Not Equal
* > : Greater Then
* < : Less Then
* >= : Greater Then Or Equal
* <= : Less Then Or Equal
*/ 

UPDATE student
SET major = "MTE"
WHERE major = "PET";

SELECT * FROM student;

/**
* Select specific columns with Or Condition
*/ 
SELECT `name`, `major` FROM student 
WHERE major = "ENV" OR major = "CONSTRUCTION";


/**
* Update with where Or Condition
*/ 
UPDATE student
SET major = "CIVIL"
WHERE major = "ENV" OR major = "CONSTRUCTION";


/**
* UPDATE COLUMN BASED ON STUDENT ID
*/ 
UPDATE student 
SET name = "Sohan Hossain"
WHERE student_id = 7;


/**
* DELETE ITEMS FROM THE TABLE
*/ 
DELETE FROM student
WHERE student_id = 7;


/**
* DELETE ITEMS FROM THE TABLE WITH AND CONDITION
*/ 
DELETE FROM student
WHERE name = "Ashraful Islam" 
AND major = "Undefined";


/**
* DELETE ALL THE ITEMS
*/ 
DELETE FROM student;

SELECT * FROM student;




/** ========================================
* SELECT ITEMS FROM TABLE
===========================================*/ 

/**
* SELECT ITEMS WITH SPECIFIC COLUMNS
*/ 
SELECT student.name, student.major, student.email
FROM student;


/**
* SELECT ITEMS WITH LIMIT
*/ 
SELECT * FROM student LIMIT 3;



/** ========================================
* ORDER AND ORDER BY
===========================================*/ 

/**
* SELECT ITEMS WITH ORDER BY
*/ 
SELECT student.name, student.major, student.email
FROM student
ORDER BY student.name;


/**
* SELECT ITEMS WITH ORDER BY AND SPECIFYING THE ORDER
*/ 
SELECT student.student_id, student.name, student.major, student.email
FROM student
ORDER BY student.student_id DESC;


/**
* SELECT ITEMS WITH MULTIPLE ORDER BY AND SPECIFYING THE ORDER
*/ 
SELECT student.student_id, student.name, student.major, student.email
FROM student
ORDER BY student.major, student.student_id;


select * from student;


/**
* SELECT ITEMS WITH NOT EQUAL CONDITION
*/ 
SELECT * FROM student
WHERE major <> "Undefined";


/**
* SELECT WITH IN FUNCTION
*/ 
SELECT * FROM student
WHERE major IN("CSE", "MTE");