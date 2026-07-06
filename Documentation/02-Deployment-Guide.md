# 🚀 Deployment Guide

This document outlines the deployment process of the AWS 3-Tier Student Management System.

---

# Step 1: Create VPC

Created a custom Virtual Private Cloud (VPC).

### Configuration

- **VPC Name:** `student-project-vpc`
- **CIDR Block:** `10.0.0.0/16`

### Purpose

Provides an isolated networking environment for all AWS resources used in the project.

---

# Step 2: Create Subnets

Created public and private subnets across multiple Availability Zones.

## Public Subnets

- `public-subnet-a`
- `public-subnet-b`
- `public-student-E`

## Private Subnets

- `private-subnet-a`
- `private-subnet-b`
- `private-subnet-c`
- `private-subnet-d`

### Purpose

- Public subnets host internet-facing resources.
- Private subnets host database resources.

---

# Step 3: Create Internet Gateway

### Configuration

- **Internet Gateway:** `student-project-igw`
- Attached to: `student-project-vpc`

### Purpose

Provides internet connectivity to resources located in public subnets.

---

# Step 4: Configure Route Tables

Created a public route table.

### Route Table

- **Name:** `public-rt`

### Routes

```text
10.0.0.0/16 → local
0.0.0.0/0   → Internet Gateway
```

### Associations

Associated public subnets with `public-rt`.

### Purpose

Allows traffic from public subnets to reach the internet through the Internet Gateway.

---

# Step 5: Configure Security Groups

Created the following security groups:

- `alb-sg`
- `ec2-sg`
- `rds-sg`

### Purpose

Provides controlled communication between application components.

---

# Step 6: Launch EC2 Instance

### Configuration

- Amazon Linux 2023
- Instance Type: `t3.micro`
- Public Subnet
- Auto-assigned Public IP

### Purpose

Hosts the Student Management System web application.

---

# Step 7: Install Apache and PHP

Updated the instance and installed required packages.

### Commands Executed

```bash
sudo dnf update -y

sudo dnf install httpd -y

sudo dnf install php php-mysqlnd -y

sudo systemctl enable httpd

sudo systemctl start httpd
```

### Purpose

- Apache serves the web application.
- PHP processes application logic.
- php-mysqlnd enables PHP to connect to MySQL.

---

# Step 8: Create Amazon RDS Database

### Configuration

- Engine: MySQL
- Database Name: `studentdb`
- Instance Identifier: `student-db`
- Security Group: `rds-sg`
- Publicly Accessible: `No`

### Purpose

Provides managed database services for storing student records.

---

# Step 9: Create Database Table

Created the `students` table.

### Table Structure

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    department VARCHAR(100)
);
```

### Purpose

Stores student information submitted through the web application.

---

# Step 10: Deploy Web Application

Uploaded:

```text
index.php
```

### Application Functions

- Insert student records into the database
- Retrieve student records
- Display student information on a web page

### Purpose

Acts as the application layer between users and the database.

---

# Step 11: Create Target Group

### Configuration

- Name: `student-tg`
- Target Type: Instance
- Protocol: HTTP
- Port: 80

Registered the EC2 instance as a target.

### Purpose

Allows the Application Load Balancer to forward traffic to the EC2 instance.

---

# Step 12: Create Application Load Balancer

### Configuration

- Name: `student-alb`
- Type: Internet-Facing
- Availability Zones: Multiple
- Listener: HTTP (Port 80)

### Attached Target Group

```text
student-tg
```

### Purpose

Distributes incoming requests and forwards traffic to the web server.

---

# Step 13: Test Application

Performed end-to-end testing.

### Verification

✅ Web application accessible through ALB

✅ EC2 successfully connected to RDS

✅ Student records inserted successfully

✅ Student records retrieved successfully

✅ Security groups functioning as expected

✅ Traffic successfully routed through the ALB

---

# ✅ Deployment Completed

Final Architecture:

```text
Internet User
      |
      v
Application Load Balancer
      |
      v
Amazon EC2
(Apache + PHP Student Management System)
      |
      v
Amazon RDS MySQL
```

The AWS 3-Tier Student Management System was successfully deployed and tested.
