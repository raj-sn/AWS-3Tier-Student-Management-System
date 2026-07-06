# Cost Analysis

## Services Used

### Amazon EC2

Instance Type:

t2.micro

Purpose:

Host PHP web application.

---

### Amazon RDS MySQL

Instance Type:

db.t3.micro

Purpose:

Store student data.

---

### Application Load Balancer

Purpose:

Distribute incoming traffic.

---

### VPC Components

- Subnets
- Route Tables
- Security Groups
- Internet Gateway

No significant direct charges.

---

## Cost Optimization

- Use Free Tier eligible resources.
- Delete unused resources after testing.
- Stop EC2 instances when not in use.
- Remove unused load balancers.
- Delete unnecessary snapshots.

---

## Estimated Cost Considerations

The primary cost-generating services are:

- EC2
- RDS
- Application Load Balancer

Costs depend on runtime duration, storage allocation, and network traffic.

This project was designed using small instance types to minimize operational costs.