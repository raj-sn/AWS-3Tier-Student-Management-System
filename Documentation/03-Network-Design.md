# Network Design

## VPC

Name:

student-project-vpc

CIDR Block:

10.0.0.0/16

---

## Subnet Design

### Public Subnets

- public-subnet-a
- public-subnet-b
- public-student-E

Purpose:

Host internet-facing resources.

---

### Private Subnets

- private-subnet-a
- private-subnet-b
- private-subnet-c
- private-subnet-d

Purpose:

Host internal resources such as databases.

---

## Internet Gateway

Name:

student-project-igw

Purpose:

Provide internet connectivity to public subnets.

---

## Route Table

Public Route Table:

public-rt

Route:

0.0.0.0/0 → Internet Gateway

---

## Traffic Flow

User

↓

Application Load Balancer

↓

EC2 Web Server

↓

RDS MySQL Database
`