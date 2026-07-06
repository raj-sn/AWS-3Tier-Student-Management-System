# 📖 Project Overview

## 🏷️ Project Title

**AWS**-Tier Student Management System**

---

## 🎯 Project Objective

The objective of this project was to design and deploy a secure **3-Tier Web Application Architecture** on Amazon Web Services (AWS). The application enables users to add and view student records through a web interface while storing data in a managed Amazon RDS MySQL database.

---

## 📋 Project Description

This project implements a **Student Management System** using Amazon EC2, Amazon RDS MySQL, and an Application Load Balancer (ALB).

Users can submit student information through a PHP-based web application hosted on Amazon EC2. The submitted data is stored in a MySQL database managed by Amazon RDS and retrieved dynamically for display.

The entire infrastructure is deployed within a custom Amazon VPC with dedicated networking and security configurations to ensure controlled access and secure communication between components.

---

## 🏗️ Architecture Summary

```text
Internet User
      |
      v
Application Load Balancer (ALB)
      |
      v
Amazon EC2
(Apache + PHP Application)
      |
      v
Amazon RDS MySQL
```

---

## ✨ Features

✅ Add student records

✅ View student records

✅ Store data in Amazon RDS MySQL

✅ Secure database access using Security Groups

✅ Load-balanced application access through ALB

✅ Network isolation using Amazon VPC

✅ Multi-Availability Zone architecture support

---

## ☁️ AWS Services Used

### 🌐 Networking

- Amazon VPC
- Public and Private Subnets
- Route Tables
- Internet Gateway
- Security Groups

### 💻 Compute

- Amazon EC2
- Amazon Linux 2023

### 🗄️ Database

- Amazon RDS MySQL

### ⚖️ Load Balancing

- Application Load Balancer (ALB)
- Target Groups

### 🌍 Web Technologies

- Apache HTTP Server
- PHP
- MySQL

---

## 🎉 Project Outcome

This project successfully demonstrated the deployment of a cloud-based web application using AWS 3-Tier Architecture principles.

The implementation provided practical experience in:

- AWS networking and security
- EC2 administration
- Database deployment and connectivity
- Load balancing and traffic routing
- Web application hosting
- Infrastructure troubleshooting
- Cloud architecture design

The completed solution follows AWS best practices for scalability, security, and availability while providing a strong foundation for future enhancements such as Auto Scaling, HTTPS implementation, and Infrastructure as Code (IaC).

---

## 🚀 Key Achievement

Successfully deployed a fully functional **Student Management System** using:

**Amazon VPC → ALB → EC2 (Apache + PHP) → Amazon RDS MySQL**

while troubleshooting real-world cloud infrastructure challenges involving networking, security groups, database deployment, and load balancing.
