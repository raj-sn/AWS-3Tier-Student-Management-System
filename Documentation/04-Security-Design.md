# Security Design

## ALB Security Group (alb-sg)

Inbound Rules

- HTTP (80) from Anywhere
- HTTPS (443) from Anywhere

Purpose:

Allow users to access the application.

---

## EC2 Security Group (ec2-sg)

Inbound Rules

- HTTP (80) from alb-sg
- SSH (22) from My IP

Outbound Rules

- All Traffic

Purpose:

Allow access only from the load balancer and administrators.

---

## RDS Security Group (rds-sg)

Inbound Rules

- MySQL (3306) from ec2-sg

Purpose:

Ensure only the application server can access the database.

---

## Security Principles Applied

- Least Privilege
- Network Segmentation
- Layered Security
- Controlled Administrative Access