# AWS 3-Tier Student Management System

## Project Overview

This project demonstrates the design and deployment of a 3-Tier Architecture on Amazon Web Services (AWS). The application allows users to add and view student records through a web interface while storing data in a MySQL database hosted on Amazon RDS.

The project was built to gain hands-on experience with AWS networking, compute, database, security, and load balancing services.

---

## Architecture

### High-Level Architecture

```text
Internet User
      |
      v
Application Load Balancer
      |
      v
EC2 (Apache + PHP)
      |
      v
RDS MySQL
```

### Network Architecture

```text
VPC (10.0.0.0/16)

├── Public Subnet A
│      ├── Application Load Balancer
│      └── EC2 Web Server
│
├── Public Subnet B
│      └── Application Load Balancer
│
├── Private Subnet A
│      └── RDS MySQL
│
├── Private Subnet B
│      └── RDS MySQL
│
└── Internet Gateway
```

---

## AWS Services Used

### Networking

- Amazon VPC
- Subnets
- Route Tables
- Internet Gateway
- Security Groups

### Compute

- Amazon EC2
- Amazon Linux 2023

### Database

- Amazon RDS (MySQL)

### Load Balancing

- Application Load Balancer (ALB)
- Target Groups

### Web Technologies

- Apache HTTP Server
- PHP
- MySQL

---

## Features

- Add student records
- Store records in Amazon RDS MySQL
- Display all student records
- Secure database access using Security Groups
- Application access through Application Load Balancer
- Multi-AZ architecture support

---

## Security Design

### ALB Security Group

Allowed:

- HTTP (80)
- HTTPS (443)

Source:

- Internet (0.0.0.0/0)

### EC2 Security Group

Allowed:

- HTTP (80) from ALB Security Group
- SSH (22) from Administrator IP

### RDS Security Group

Allowed:

- MySQL (3306) from EC2 Security Group

---

## Database Design

### Database

```text
studentdb
```

### Table

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    department VARCHAR(100)
);
```

---

## Deployment Summary

1. Created custom VPC
2. Configured public and private subnets
3. Attached Internet Gateway
4. Configured route tables
5. Created security groups
6. Launched EC2 instance
7. Installed Apache and PHP
8. Created Amazon RDS MySQL database
9. Created students table
10. Developed Student Management application
11. Created Target Group
12. Configured Application Load Balancer
13. Tested end-to-end connectivity

---

## Application Workflow

1. User accesses the application through ALB.
2. ALB forwards traffic to EC2.
3. PHP application processes requests.
4. Student data is stored in RDS MySQL.
5. Stored data is retrieved and displayed in the web interface.

---

## Screenshots

### Infrastructure

- VPC
- Subnets
- Route Table
- Internet Gateway
- Security Groups
- EC2 Instance
- RDS Database
- Target Group
- Application Load Balancer

### Application

- Student Management Form
- Student Records Table

Screenshots are available in the `Screenshots` directory.

---

## Challenges Faced

### EC2 SSH Connectivity Issue

- SSH access failed when restricted to a specific IP.
- Temporarily allowed access from Anywhere IPv4 for testing.

### Linux Package Installation Issue

- `dnf update` was unable to download packages.
- Root cause: missing outbound security group rules.

### Website Access Issue

- EC2 accepted HTTP traffic only from ALB Security Group.
- Temporarily allowed HTTP from Anywhere IPv4 during testing.

### RDS Deployment Issue

- Database creation failed because subnets existed in only one Availability Zone.
- Additional subnets were created across multiple Availability Zones.

### HTTPS Configuration

- HTTPS was not available because only an HTTP listener was configured.
- HTTPS requires ACM certificates and HTTPS listeners.

---

## Key Learnings

- VPC design and subnet planning
- Public vs Private subnets
- Route tables and Internet Gateway configuration
- Security Group design
- Amazon EC2 administration
- Apache and PHP deployment
- Amazon RDS configuration
- Application Load Balancer and Target Groups
- Multi-Availability Zone architecture
- AWS troubleshooting techniques

---

## Cost Considerations

Services used:

- Amazon EC2 (t2.micro)
- Amazon RDS MySQL (db.t3.micro)
- Application Load Balancer

Cost optimization measures:

- Free Tier eligible resources where applicable
- Small instance sizes
- Resource cleanup after testing

---

## Future Improvements

- Move EC2 into private subnets
- Configure NAT Gateway
- Enable HTTPS using AWS Certificate Manager (ACM)
- Register custom domain using Route 53
- Implement Auto Scaling Group
- Improve UI using Bootstrap
- Add Update and Delete functionality
- Deploy using Infrastructure as Code (Terraform)

---

## Author

**RAJ S.N.**

AWS 3-Tier Architecture Project – Student Management System