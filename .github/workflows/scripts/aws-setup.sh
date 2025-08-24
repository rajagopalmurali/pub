#!/bin/bash
set -e

# Create security group
echo "Creating security group..."
SG_ID=$(aws ec2 create-security-group \
  --group-name php-app-sg \
  --description "Security group for PHP app" \
  --region ${AWS_REGION} \
  --query 'GroupId' \
  --output text 2>/dev/null || \
  aws ec2 describe-security-groups \
  --group-names php-app-sg \
  --region ${AWS_REGION} \
  --query 'SecurityGroups[0].GroupId' \
  --output text)

echo "sg_id=$SG_ID" >> $GITHUB_OUTPUT

# Configure security group rules
aws ec2 authorize-security-group-ingress \
  --group-id $SG_ID \
  --protocol tcp \
  --port 22 \
  --cidr 0.0.0.0/0 \
  --region ${AWS_REGION} 2>/dev/null || true

aws ec2 authorize-security-group-ingress \
  --group-id $SG_ID \
  --protocol tcp \
  --port 80 \
  --cidr 0.0.0.0/0 \
  --region ${AWS_REGION} 2>/dev/null || true

aws ec2 authorize-security-group-ingress \
  --group-id $SG_ID \
  --protocol tcp \
  --port 443 \
  --cidr 0.0.0.0/0 \
  --region ${AWS_REGION} 2>/dev/null || true

aws ec2 authorize-security-group-ingress \
  --group-id $SG_ID \
  --protocol tcp \
  --port 3306 \
  --source-group $SG_ID \
  --region ${AWS_REGION} 2>/dev/null || true

echo "Security group $SG_ID configured successfully"

# Create key pair
echo "Creating key pair..."
aws ec2 delete-key-pair \
  --key-name ${KEY_NAME} \
  --region ${AWS_REGION} 2>/dev/null || true

aws ec2 create-key-pair \
  --key-name ${KEY_NAME} \
  --query 'KeyMaterial' \
  --output text \
  --region ${AWS_REGION} > ${KEY_NAME}.pem

chmod 400 ${KEY_NAME}.pem
echo "Key pair created successfully"

# Launch EC2 instance
echo "Launching EC2 instance..."
INSTANCE_ID=$(aws ec2 run-instances \
  --image-id ${AMI_ID} \
  --count 1 \
  --instance-type ${INSTANCE_TYPE} \
  --key-name ${KEY_NAME} \
  --security-group-ids $SG_ID \
  --tag-specifications 'ResourceType=instance,Tags=[{Key=Name,Value=PHP-App},{Key=Project,Value=GitHubActions}]' \
  --query 'Instances[0].InstanceId' \
  --output text \
  --region ${AWS_REGION})

echo "instance_id=$INSTANCE_ID" >> $GITHUB_OUTPUT

# Wait for instance to be running
echo "Waiting for instance to be running..."
aws ec2 wait instance-running --instance-ids $INSTANCE_ID --region ${AWS_REGION}

# Get public IP
PUBLIC_IP=$(aws ec2 describe-instances \
  --instance-ids $INSTANCE_ID \
  --query 'Reservations[0].Instances[0].PublicIpAddress' \
  --output text \
  --region ${AWS_REGION})

echo "public_ip=$PUBLIC_IP" >> $GITHUB_OUTPUT
echo "Instance $INSTANCE_ID is running with public IP: $PUBLIC_IP"
