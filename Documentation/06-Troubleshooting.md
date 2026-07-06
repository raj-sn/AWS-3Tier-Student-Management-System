# 🛠️ Troubleshooting

This document records the challenges encountered during the deployment of the AWS 3-Tier Student Management System and the solutions used to resolve them.

---

# 🔑 Issue 1 - EC2 Instance Connect Failed

### ❗ Problem

Unable to establish an SSH connection to the EC2 instance using EC2 Instance Connect.

### 🔍 Cause

SSH access was initially restricted to **"My IP"** in the EC2 Security Group. Although the displayed IP address appeared correct, the connection could not be established from the hostel network.

Testing from a mobile hotspot worked successfully, indicating that the issue was related to source IP restrictions or Network Address Translation (NAT) on the hostel network.

### ✅ Solution

Temporarily modified the inbound SSH rule:

```text
SSH (22) → Anywhere IPv4 (0.0.0.0/0)
```

After changing the rule, SSH connectivity was successful.

### 🎓 Lesson Learned

"My IP" restrictions may not always work as expected on shared or managed networks. Always verify the actual public IP address and consider NAT or network restrictions when troubleshooting SSH connectivity.

---

# 📦 Issue 2 - DNF Update Stuck

### ❗ Problem

The following command failed to download updates:

```bash
sudo dnf update -y
```

### 🔍 Cause

Security Group outbound rules were empty.

### ✅ Solution

Added outbound rule:

```text
All Traffic → 0.0.0.0/0
```

### 🎓 Lesson Learned

Outbound rules control destinations that EC2 instances can access. Without outbound internet access, package repositories cannot be reached.

---

# 🌐 Issue 3 - Website Not Loading

### ❗ Problem

The Apache web server was running, but the website could not be accessed using the EC2 public IP address.

### 🔍 Cause

The EC2 Security Group was configured to allow HTTP traffic only from the ALB Security Group.

At this stage, the Application Load Balancer had not yet been created, so browser requests to the EC2 public IP were blocked.

### ✅ Solution

Temporarily added:

```text
HTTP (80) → Anywhere IPv4 (0.0.0.0/0)
```

This allowed direct access to the web server for testing.

### 🎓 Lesson Learned

Security Group rules should align with the deployment phase. Temporary direct access may be required for testing before introducing a Load Balancer.

---

# 🗄️ Issue 4 - RDS Creation Failed

### ❗ Problem

Amazon RDS database creation failed during setup.

### 🔍 Cause

All existing subnets were located in a single Availability Zone.

### ✅ Solution

Created additional subnets in:

```text
eu-north-1b
eu-north-1c
```

### 🎓 Lesson Learned

Amazon RDS requires a DB Subnet Group spanning multiple Availability Zones to support deployment and future failover capabilities.

---

# ⚖️ Issue 5 - ALB Creation Requirement

### ❗ Problem

Application Load Balancer creation could not proceed because AWS required multiple Availability Zones.

### 🔍 Cause

Only one suitable public subnet was available for ALB deployment.

### ✅ Solution

Created an additional public subnet:

```text
public-student-E
```

Associated it with:

```text
public-rt
```

which contained:

```text
0.0.0.0/0 → Internet Gateway
```

### 🎓 Lesson Learned

Internet-facing Application Load Balancers require at least two public subnets across multiple Availability Zones to provide high availability.

---

# 🔒 Issue 6 - HTTPS Not Working

### ❗ Problem

The application worked with HTTP but failed when accessed using HTTPS.

### 🔍 Cause

Only an HTTP listener was configured on the Application Load Balancer.

### ✅ Solution

HTTPS requires:

- AWS Certificate Manager (ACM) Certificate
- HTTPS Listener (Port 443)
- Certificate association with the ALB

### 🎓 Lesson Learned

Opening Port 443 in a Security Group does not automatically enable HTTPS. HTTPS requires both an SSL/TLS certificate and an HTTPS listener.

---

# 📚 Summary

Throughout this project, several real-world AWS deployment challenges were encountered involving:

- 🌐 Networking
- 🔒 Security Groups
- 🛣️ Route Tables
- 🗄️ Amazon RDS
- ⚖️ Application Load Balancer
- 🔐 HTTPS Configuration

Each issue was analyzed, tested, and resolved through systematic troubleshooting, providing valuable hands-on experience with AWS cloud infrastructure.

## 🎯 Key Learning Areas

✅ Security Group Configuration

✅ Internet Gateway & Route Tables

✅ Public vs Private Subnets

✅ Availability Zones

✅ DB Subnet Groups

✅ Application Load Balancer Requirements

✅ Amazon RDS Deployment Constraints

✅ HTTPS & SSL/TLS Concepts

✅ Cloud Infrastructure Troubleshooting

This troubleshooting experience significantly improved practical skills in AWS architecture, networking, security, and problem-solving.
