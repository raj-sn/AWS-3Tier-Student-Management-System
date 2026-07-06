# 🌐 Network Design

This document describes the network architecture implemented for the AWS 3-Tier Student Management System.

---

# 🏢 Virtual Private Cloud (VPC)

### Configuration

- **VPC Name:** `student-project-vpc`
- **CIDR Block:** `10.0.0.0/16`

### Purpose

The VPC provides a logically isolated networking environment for all resources used in the project.

---

# 📍 Availability Zones

The infrastructure is distributed across multiple Availability Zones:

- eu-north-1a
- eu-north-1b
- eu-north-1c

### Purpose

Using multiple Availability Zones improves availability and supports AWS services such as:

- Amazon RDS
- Application Load Balancer (ALB)

---

# 🟢 Public Subnets

| Subnet Name | CIDR Block | Availability Zone |
|------------|------------|------------|
| public-subnet-a | 10.0.1.0/24 | eu-north-1a |
| public-subnet-b | 10.0.2.0/24 | eu-north-1a |
| public-student-E | 10.0.7.0/24 | eu-north-1b |

### Purpose

Public subnets host internet-facing resources such as:

- Application Load Balancer
- EC2 Web Server

---

# 🔒 Private Subnets

| Subnet Name | CIDR Block | Availability Zone |
|------------|------------|------------|
| private-subnet-a | 10.0.3.0/24 | eu-north-1a |
| private-subnet-b | 10.0.4.0/24 | eu-north-1a |
| private-subnet-c | 10.0.5.0/24 | eu-north-1b |
| private-subnet-d | 10.0.6.0/24 | eu-north-1c |

### Purpose

Private subnets host internal resources that should not be directly accessible from the internet.

Used primarily for:

- Amazon RDS MySQL
- RDS DB Subnet Group

---

# 🌍 Internet Gateway

### Configuration

- **Name:** `student-project-igw`

### Purpose

The Internet Gateway enables communication between internet resources and public subnet resources.

---

# 🛣️ Route Table Configuration

### Public Route Table

- **Name:** `public-rt`

### Routes

```text
10.0.0.0/16 → local
0.0.0.0/0   → Internet Gateway
```

### Associated Subnets

- public-subnet-a
- public-subnet-b
- public-student-E

### Purpose

Allows resources in public subnets to access the internet.

---

# ⚖️ Load Balancer Placement

Application Load Balancer is deployed across:

- public-subnet-a
- public-student-E

### Purpose

Provides high availability by distributing traffic across multiple Availability Zones.

---

# 💻 EC2 Placement

### Instance Location

- public-subnet-a

### Purpose

Hosts:

- Apache HTTP Server
- PHP Application
- Student Management System

---

# 🗄️ RDS Placement

### Current Primary Database

- private-subnet-c
- Availability Zone: eu-north-1b

### DB Subnet Group Members

- private-subnet-a
- private-subnet-b
- private-subnet-c
- private-subnet-d

### Purpose

Allows Amazon RDS to support deployment across multiple Availability Zones.

---

# 🔄 Network Traffic Flow

```text
Internet User
      |
      v
Application Load Balancer
      |
      v
Amazon EC2
(Apache + PHP Application)
      |
      v
Amazon RDS MySQL
```

---

# ✅ Network Design Summary

The network architecture was designed following AWS best practices by:

- Using a custom VPC
- Separating public and private resources
- Implementing security boundaries through subnet design
- Using multiple Availability Zones for resilience
- Deploying an Application Load Balancer for traffic distribution
- Restricting database access through private networking and Security Groups

This design provides a secure, scalable, and maintainable foundation for the Student Management System.
