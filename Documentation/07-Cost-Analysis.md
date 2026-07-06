# 💰 Cost Analysis

This document provides an overview of the AWS services used in the project and highlights cost considerations and optimization strategies.

---

# ☁️ Services Used

## 💻 Amazon EC2

### Configuration

- Instance Type: `t3.micro`

### Purpose

Hosts the Apache web server and PHP-based Student Management System application.

### Cost Consideration

- Eligible for AWS Free Tier where applicable.
- Charges may apply if Free Tier limits are exceeded.

---

## 🗄️ Amazon RDS MySQL

### Configuration

- Instance Type: `db.t3.micro`

### Purpose

Stores student records and application data.

### Cost Consideration

- Eligible for AWS Free Tier where applicable.
- Storage, backups, and extended usage may incur additional charges.

---

## ⚖️ Application Load Balancer (ALB)

### Purpose

Distributes incoming application traffic and improves availability.

### Cost Consideration

- May generate charges based on:
  - Running time
  - Requests processed
  - Traffic volume

---

## 🌐 VPC Components

The following networking resources were used:

- VPC
- Public Subnets
- Private Subnets
- Route Tables
- Internet Gateway
- Security Groups

### Cost Consideration

These services generally do not generate significant direct costs in small lab environments.

---

# 📊 Estimated Cost Drivers

The primary services that can generate AWS charges are:

- 💻 Amazon EC2
- 🗄️ Amazon RDS MySQL
- ⚖️ Application Load Balancer

Actual costs depend on:

- Instance runtime
- Storage allocation
- Network traffic
- Backup retention
- Load Balancer usage

---

# 💡 Cost Optimization Strategies

The following steps were used to minimize operational expenses:

✅ Use Free Tier eligible resources where available

✅ Select small instance sizes (`t3.micro`, `db.t3.micro`)

✅ Stop or terminate resources when not in use

✅ Delete unused Load Balancers

✅ Remove unused EBS volumes and snapshots

✅ Delete unused RDS instances after testing

✅ Clean up temporary AWS resources after project completion

---

# 🎯 Project Cost Approach

This project was designed primarily for:

- Learning AWS services
- Practicing cloud architecture
- Building a portfolio project
- Gaining hands-on troubleshooting experience

To keep costs low, only minimal-sized resources were deployed and resources were intended to be removed after completing testing and documentation.

---

# ✅ Cost Analysis Summary

The AWS 3-Tier Student Management System was built using cost-conscious design principles by:

- Utilizing small AWS instance types
- Leveraging Free Tier benefits where available
- Minimizing resource usage
- Cleaning up unnecessary infrastructure after deployment

This approach provided practical experience with AWS cloud services while maintaining a low-cost learning environment.
