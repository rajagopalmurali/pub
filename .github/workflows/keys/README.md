# SSH Keys for Server Access

This directory contains SSH public keys that will be automatically added to the server's `~/.ssh/authorized_keys` file during deployment.

## Files

- `github-actions.pub` - Dummy SSH public key for testing

## How It Works

1. **During Deployment**: The workflow copies the SSH public key to the server
2. **Automatic Setup**: The deployment script adds the key to `/home/ubuntu/.ssh/authorized_keys`
3. **Access Granted**: You can then SSH to the server using the corresponding private key

## Usage

### For Testing (Current Setup)
The current `github-actions.pub` is a dummy key. To use it:

1. **Generate a real key pair**:
   ```bash
   ssh-keygen -t rsa -b 4096 -f .github/workflows/keys/github-actions
   ```

2. **Replace the dummy key**:
   - Replace `github-actions.pub` with your real public key
   - Keep the private key `github-actions` secure (don't commit it!)

### SSH Access After Deployment
```bash
# Using your private key
ssh -i .github/workflows/keys/github-actions ubuntu@YOUR_SERVER_IP

# Or if you have the private key elsewhere
ssh -i /path/to/your/private/key ubuntu@YOUR_SERVER_IP
```

## Security Notes

- ⚠️ **Never commit private keys** to this repository
- ✅ **Only commit public keys** (`.pub` files)
- 🔒 **Keep private keys secure** on your local machine
- 🗑️ **Rotate keys regularly** for production environments

## Customization

To add multiple SSH keys:

1. **Add more public key files** to this directory
2. **Update the deployment script** to copy all keys
3. **Modify the authorized_keys setup** to include all keys

## Example: Adding Your Own Key

```bash
# Generate your key pair
ssh-keygen -t rsa -b 4096 -f my-server-key

# Copy the public key to this directory
cp my-server-key.pub .github/workflows/keys/

# Commit the public key
git add .github/workflows/keys/my-server-key.pub
git commit -m "Add SSH public key for server access"

# Keep the private key secure (don't commit it!)
# Use it to SSH: ssh -i my-server-key ubuntu@YOUR_SERVER_IP
```
