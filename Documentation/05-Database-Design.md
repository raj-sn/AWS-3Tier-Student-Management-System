# Database Design

## Database Name

studentdb

---

## Table Name

students

---

## Table Structure

| Column | Type | Description |
|----------|----------|----------|
| id | INT | Primary Key |
| name | VARCHAR(100) | Student Name |
| department | VARCHAR(100) | Department |

---

## SQL Definition

CREATE TABLE students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 department VARCHAR(100)
);

---

## Sample Record

| id | name | department |
|----|----|----|
| 1 | Raj | IT |

---

## Purpose

Store student information submitted through the web application.