#!/bin/bash
set -e

echo "Starting cleanup operations..."

# Cleanup EC2 instance
if [ ! -z "${INSTANCE_ID}" ]; then
  echo "Cleaning up EC2 instance ${INSTANCE_ID}..."
  aws ec2 terminate-instances \
    --instance-ids ${INSTANCE_ID} \
    --region ${AWS_REGION}
  
  echo "Waiting for instance to terminate..."
  aws ec2 wait instance-terminated \
    --instance-ids ${INSTANCE_ID} \
    --region ${AWS_REGION}
  
  echo "EC2 instance terminated successfully"
else
  echo "No instance ID provided for cleanup"
fi

# Cleanup key pair
echo "Cleaning up key pair..."
aws ec2 delete-key-pair \
  --key-name ${KEY_NAME} \
  --region ${AWS_REGION} || true

echo "Key pair cleanup completed"

# Cleanup security group
echo "Cleaning up security group..."
aws ec2 delete-security-group \
  --group-name php-app-sg \
  --region ${AWS_REGION} || true

echo "Security group cleanup completed"

echo "All cleanup operations completed successfully"
