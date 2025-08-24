# GitHub Actions Workflow Structure

This directory contains the main workflow file and supporting scripts for deploying PHP applications to AWS EC2.

## File Structure

```
.github/workflows/
├── deploy-php-aws.yml          # Main workflow file
├── scripts/                     # Scripts directory
│   ├── aws-setup.sh            # AWS infrastructure setup
│   ├── deploy-php.sh           # PHP application deployment
│   ├── create-index.sh         # Index file creation
│   └── cleanup.sh              # Resource cleanup
└── README.md                   # This file
```

## Scripts Overview

### 1. `aws-setup.sh`
- Creates security groups with proper port access (SSH, HTTP, HTTPS, MySQL)
- Generates SSH key pairs
- Launches EC2 instances
- Sets environment variables for other steps

### 2. `deploy-php.sh`
- Installs PHP 8.1, nginx, and MySQL
- Secures MySQL installation
- Clones your repository
- Installs Composer dependencies
- Creates .env file with database credentials
- Configures nginx for your application
- Handles both standard PHP and Laravel applications

### 3. `create-index.sh`
- Creates a default index.php file if none exists
- Detects existing index files in public/ or root directories
- Provides a basic PHP info page for verification

### 4. `cleanup.sh`
- Terminates EC2 instances
- Removes key pairs
- Deletes security groups
- Used in cleanup job for failed deployments

## Benefits of This Structure

✅ **Maintainable**: Each script has a single responsibility
✅ **Reusable**: Scripts can be used independently or in other workflows
✅ **Readable**: Main workflow file is clean and easy to understand
✅ **Debuggable**: Individual scripts can be tested separately
✅ **Versionable**: Scripts are tracked in git with the rest of your code
✅ **No Expression Length Issues**: Avoids GitHub Actions' 21,000 character limit

## Usage

The main workflow automatically:
1. Sets up AWS infrastructure
2. Waits for SSH access
3. Deploys your PHP application
4. Provides deployment information
5. Cleans up resources on failure

## Customization

To modify the deployment process:
- Edit the specific script file (e.g., `deploy-php.sh` for PHP setup)
- Update environment variables in the main workflow
- Add new scripts for additional functionality

## Environment Variables

The workflow uses these environment variables:
- `AWS_REGION`: AWS region for deployment
- `INSTANCE_TYPE`: EC2 instance type
- `KEY_NAME`: SSH key pair name
- `AMI_ID`: AMI ID for the EC2 instance

## Security Notes

- Database passwords are hardcoded in scripts (consider using GitHub Secrets)
- Security groups allow broad access (consider restricting IP ranges)
- SSH keys are generated per deployment (consider using existing keys)
