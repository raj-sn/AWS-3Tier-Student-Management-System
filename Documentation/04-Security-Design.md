# 🔒 Security Design

This document describes the security controls implemented within the AWS 3-Tier Student Management System to protect application resources, control access, and enforce secure communication between infrastructure components.

---

# Security Architecture Overview

The security model follows a layered approach using AWS Security Groups to control traffic flow between tiers.

```text
Internet
    |
    v
ALB Security Group (alb-sg)
    |
    v
EC2 Security Group (ec2-sg)
    |
    v
RDS Security Group (rds-sg)
```

This ensures that each component can communicate only with the resources required for its operation.

---

# 🌐 Application Load Balancer Security Group (alb-sg)

## Inbound Rules

| Protocol | Port | Source |
|-----------|--------|----------|
| HTTP | 80 | Anywhere (0.0.0.0/0) |
| HTTPS | 443 | Anywhere (0.0.0.0/0) |

## Purpose

- Accept incoming web traffic from internet users.
- Forward requests to the EC2 web server.
- Act as the public entry point for the application.

## Security Benefit

Internet traffic reaches the Application Load Balancer before accessing backend application resources.

---

# 💻 EC2 Security Group (ec2-sg)

## Inbound Rules

| Protocol | Port | Source |
|-----------|--------|----------|
| HTTP | 80 | alb-sg |
| SSH | 22 | Administrator IP Address |

## Outbound Rules

| Protocol | Port | Destination |
|-----------|--------|-------------|
| All Traffic | All | 0.0.0.0/0 |

## Purpose

- Allow HTTP traffic only from the Application Load Balancer.
- Allow administrative SSH access.
- Permit outbound communication for package installation and database access.

## Security Benefit

Prevents direct web traffic from reaching the EC2 instance while allowing traffic through the Load Balancer.

---

# 🗄️ RDS Security Group (rds-sg)

## Inbound Rules

| Protocol | Port | Source |
|-----------|--------|----------|
| MySQL | 3306 | ec2-sg |

## Purpose

- Restrict database access to the application server only.
- Block direct access from internet users.

## Security Benefit

Ensures that only the EC2 web application can communicate with the database.

---

# 🛡️ Security Principles Applied

## Least Privilege

Access is granted only where required.

Examples:

- Only ALB can access the web application.
- Only EC2 can access the database.
- SSH access is restricted to administrators.

---

## Network Segmentation

Resources are separated according to their role.

### Public Resources

- Application Load Balancer
- EC2 Web Server

### Private Resources

- Amazon RDS MySQL

This reduces the attack surface and prevents direct exposure of database resources.

---

## Layered Security

Multiple layers of protection are implemented.

```text
Internet
    ↓
ALB Security Group
    ↓
EC2 Security Group
    ↓
RDS Security Group
```

Each layer enforces its own access controls.

---

## Controlled Administrative Access

Administrative access is restricted through SSH security group rules.

Measures implemented:

- Limited SSH access
- Security Group-based filtering
- Controlled management access to EC2

---

# 🔄 Secure Traffic Flow

```text
Internet User
      |
      v
Application Load Balancer
      |
      v
EC2 Web Server
(Apache + PHP)
      |
      v
Amazon RDS MySQL
```

Allowed Communication:

✅ Internet → ALB

✅ ALB → EC2

✅ EC2 → RDS

Blocked Communication:

❌ Internet → EC2

❌ Internet → RDS

❌ ALB → RDS

---

# ✅ Security Design Summary

The security architecture follows AWS best practices by:

- Restricting database access to the application tier.
- Using dedicated Security Groups for each component.
- Implementing controlled administrative access.
- Enforcing layered security between tiers.
- Protecting backend resources from direct internet exposure.

This design provides a secure foundation for the Student Management System while maintaining simplicity and scalability.
