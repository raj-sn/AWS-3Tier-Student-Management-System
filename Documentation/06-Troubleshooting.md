# Troubleshooting

## Issue 1 - EC2 Instance Connect Failed

### Cause

SSH access was initially restricted to "My IP" in the EC2 Security Group. Although the displayed IP address appeared correct, the connection could not be established from the hostel network.

Testing from a mobile hotspot worked successfully, indicating that the issue was related to source IP restrictions or network address translation (NAT) on the hostel network.

### Solution

Temporarily modified the inbound SSH rule:

SSH (22) → Anywhere IPv4 (0.0.0.0/0)

After changing the rule, SSH connectivity was successful.

### Lesson

"My IP" restrictions may not always work as expected on shared or managed networks. Always verify the actual public IP address and consider NAT or network restrictions when troubleshooting SSH connectivity.

---

## Issue 2 - DNF Update Stuck

### Cause

Security group outbound rules were empty.

### Solution

Added outbound rule:

All Traffic → 0.0.0.0/0

### Lesson

Outbound rules control destinations that EC2 instances can access. Without outbound internet access, package repositories cannot be reached.

---

## Issue 3 - Website Not Loading

### Cause

The EC2 Security Group was configured to allow HTTP traffic only from the ALB Security Group.

At this stage, the Application Load Balancer had not yet been created, so browser requests to the EC2 public IP were blocked.

### Solution

Temporarily added the inbound rule:

HTTP (80) → Anywhere IPv4 (0.0.0.0/0)

This allowed direct access to the web server for testing and validation.

### Lesson

Security Group rules should align with the deployment stage. Temporary direct access may be required for testing before introducing a Load Balancer.

---

## Issue 4 - RDS Creation Failed

### Cause

Subnets existed in only one Availability Zone.

### Solution

Created additional subnets in:

- eu-north-1b
- eu-north-1c

### Lesson

Amazon RDS requires a DB subnet group spanning multiple Availability Zones for proper deployment and availability.

---

## Issue 5 - ALB Creation Requirement

### Cause

Application Load Balancer creation required public subnets in multiple Availability Zones.

### Solution

Created an additional public subnet:

public-student-E

Associated the subnet with:

public-rt

which contained:

0.0.0.0/0 → Internet Gateway

### Lesson

Internet-facing Application Load Balancers require at least two public subnets across different Availability Zones to provide high availability.

---

## Issue 6 - HTTPS Not Working

### Cause

Only an HTTP listener was configured on the Application Load Balancer.

### Solution

HTTPS requires:

- An ACM SSL/TLS certificate
- An HTTPS (443) listener
- Certificate association with the ALB

### Lesson

Allowing port 443 in a Security Group does not automatically enable HTTPS. HTTPS requires both a valid SSL/TLS certificate and an HTTPS listener.