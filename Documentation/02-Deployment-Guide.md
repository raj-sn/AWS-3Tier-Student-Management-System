# Deployment Guide

## Step 1 - Create VPC

Created:

VPC Name: student-project-vpc

CIDR Block:

10.0.0.0/16

---

## Step 2 - Create Subnets

Public Subnets

- public-subnet-a
- public-subnet-b
- public-student-E

Private Subnets

- private-subnet-a
- private-subnet-b
- private-subnet-c
- private-subnet-d

---

## Step 3 - Create Internet Gateway

Created:

student-project-igw

Attached to:

student-project-vpc

---

## Step 4 - Configure Route Tables

Created:

public-rt

Added Route:

0.0.0.0/0 → Internet Gateway

Associated Public Subnets with public-rt.

---

## Step 5 - Configure Security Groups

Created:

- alb-sg
- ec2-sg
- rds-sg

---

## Step 6 - Launch EC2

Configuration:

- Amazon Linux 2023
- t3.micro
- Public Subnet
- Public IP Enabled

---

## Step 7 - Install Apache and PHP

Commands:

sudo dnf update -y

sudo dnf install httpd -y

sudo dnf install php php-mysqlnd -y

sudo systemctl enable httpd

sudo systemctl start httpd

---

## Step 8 - Create RDS Database

Configuration:

- Engine: MySQL
- Database Name: studentdb
- Instance Identifier: student-db
- Security Group: rds-sg
- Public Access: No

---

## Step 9 - Create Database Table

Created table:

students

Columns:

- id
- name
- department

---

## Step 10 - Deploy Web Application

Uploaded:

index.php

Functionality:

- Insert student records
- Display student records

---

## Step 11 - Create Target Group

Created:

student-tg

Protocol:

HTTP

Port:

80

Registered EC2 instance as target.

---

## Step 12 - Create Application Load Balancer

Created:

student-alb

Configuration:

- Internet Facing
- Multiple Availability Zones
- Listener HTTP Port 80

Attached target group:

student-tg

---

## Step 13 - Test Application

Verified:

- Website accessibility
- Database connectivity
- Student insertion
- Data retrieval