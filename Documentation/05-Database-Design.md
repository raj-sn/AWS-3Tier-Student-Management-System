# 🗄️ Database Design

This document describes the database architecture and schema used in the AWS 3-Tier Student Management System.

---

# Database Information

### Database Name

```text
studentdb
```

### Database Engine

```text
Amazon RDS MySQL
```

### Purpose

The database stores student information submitted through the web application and provides persistent storage for the Student Management System.

---

# Table Design

### Table Name

```text
students
```

### Purpose

Stores student records entered through the web application.

---

# Table Structure

| Column Name | Data Type | Description |
|------------|-----------|-------------|
| id | INT | Unique Student ID (Primary Key) |
| name | VARCHAR(100) | Student Name |
| department | VARCHAR(100) | Student Department |

---

# SQL Schema

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    department VARCHAR(100)
);
```

---

# Entity Relationship (ER) Diagram

```text
+-------------------+
|     students      |
+-------------------+
| id (PK)           |
| name              |
| department        |
+-------------------+
```

---

# Sample Data

| ID | Name | Department |
|----|------|------------|
| 1 | Raj | IT |
| 2 | Nimal | Computer Science |
| 3 | John | Software Engineering |

---

# Database Operations

The application performs the following operations:

### Create (Insert)

Adds new student records to the database.

Example:

```sql
INSERT INTO students (name, department)
VALUES ('Raj', 'IT');
```

---

### Read (Retrieve)

Retrieves student records for display in the web application.

Example:

```sql
SELECT * FROM students;
```

---

# Database Connectivity

### Application Server

Amazon EC2

### Database Server

Amazon RDS MySQL

### Connection Flow

```text
User
   |
   v
PHP Application
   |
   v
Amazon RDS MySQL
```

### Security

Database access is restricted through Security Groups:

```text
rds-sg

MySQL (3306)
Source: ec2-sg
```

This ensures that only the EC2 application server can communicate with the database.

---

# Data Flow

```text
Student Form
      |
      v
PHP Application
      |
      v
MySQL Database
      |
      v
Student Records Table
```

1. User submits student information.
2. PHP application receives the request.
3. Data is stored in the MySQL database.
4. Stored records are retrieved from RDS.
5. Records are displayed in the web interface.

---

# Design Considerations

### Simplicity

A single table design was used to keep the application simple and focused on demonstrating AWS infrastructure deployment.

### Scalability

The database can be extended with additional tables such as:

- Courses
- Instructors
- Enrollments
- User Accounts

### Security

- Database deployed on Amazon RDS.
- Access restricted using Security Groups.
- Public database access disabled.

---

# Database Design Summary

The Student Management System uses an Amazon RDS MySQL database containing a single `students` table. The design supports storing and retrieving student records while demonstrating secure connectivity between the application layer (EC2) and the database layer (RDS) within a 3-tier AWS architecture.
