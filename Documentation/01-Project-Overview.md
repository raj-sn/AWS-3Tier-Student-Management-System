# Project Overview

## Project Title

AWS 3-Tier Student Management System

## Project Objective

The objective of this project is to design and deploy a secure 3-tier web application architecture on AWS. The application allows users to add student records and view stored records through a web interface while storing data in a managed MySQL database.

## Project Description

This project implements a Student Management System using Amazon EC2, Amazon RDS MySQL, and an Application Load Balancer (ALB). Users can submit student information through a web form, and the data is stored in a MySQL database hosted on Amazon RDS.

The infrastructure is deployed inside a custom Amazon VPC with multiple subnets and security controls.

## Architecture Summary

User → Application Load Balancer → EC2 (PHP Web Application) → RDS MySQL

## Features

- Add student records
- View student records
- Store data in MySQL database
- Secure database access
- Load-balanced architecture
- Network isolation using VPC

## AWS Services Used

- Amazon VPC
- Amazon EC2
- Amazon RDS MySQL
- Application Load Balancer
- Security Groups
- Internet Gateway
- Route Tables

## Project Outcome

The project successfully demonstrated the deployment of a cloud-based web application using a 3-tier architecture while following networking and security best practices.