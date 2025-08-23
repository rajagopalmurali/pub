# iSend.ai Platform Overview

## Platform Description
iSend.ai is a comprehensive email infrastructure platform designed for developers and businesses to send transactional and marketing emails with built-in compliance, analytics, and automation capabilities.

## Core Architecture

### Backend Stack
- **PHP-based** application with Laravel-inspired structure
- **MySQL database** with comprehensive schema for email management
- **OpenSearch integration** for advanced email search and analytics
- **AWS services** (SES, SQS) for scalable email delivery
- **JWT authentication** for secure API access

### Frontend
- **Blade templating** for server-side rendering
- **Tailwind CSS** for modern, responsive design
- **Alpine.js** for interactive components
- **Modular structure** with separate admin, dashboard, and site modules

## Key Features

### Email Infrastructure
- **Multi-provider support**: SendGrid, AWS SES, SMTP
- **Template management** with versioning and layouts
- **Data mapping** for dynamic content personalization
- **Email quota management** with trial and pro plans
- **Real-time email logging** and delivery tracking

### Compliance & Unsubscribe Management
- **Automatic unsubscribe functionality** with JWT-secured links
- **GDPR and CAN-SPAM compliance** built-in
- **Email customer tracking** and unsubscribe history
- **Professional unsubscribe pages** with branding support
- **Audit-ready compliance** tracking

### User Management
- **Multi-tenant architecture** with account-based isolation
- **Team collaboration** with invite system
- **Role-based access** control
- **API key management** for secure integrations
- **User session management** with JWT tokens

### Billing & Subscriptions
- **Dodo Payments integration** for subscription management
- **Trial and Pro plan** structure
- **Usage-based billing** with email quotas
- **Invoice generation** and payment tracking
- **Subscription lifecycle** management

### Analytics & Monitoring
- **OpenSearch-powered** email search and analytics
- **Real-time dashboard** with email performance metrics
- **Unsubscribe rate tracking** and reporting
- **Email delivery status** monitoring
- **Comprehensive audit logs**

## Development Status

### Current Features (Live)
- Email sending infrastructure
- Template management system
- Unsubscribe functionality
- User authentication and team management
- Basic analytics and logging
- Payment processing

### Coming Soon (Q1 2025)
- **Email Campaigns platform** with:
  - Visual campaign builder
  - Advanced automation workflows
  - Smart segmentation
  - Enhanced analytics
  - Dynamic personalization

## Target Users
- **Developers** seeking simple email API integration
- **Businesses** requiring compliant email infrastructure
- **Marketing teams** needing campaign management tools
- **Startups** looking for scalable email solutions

## Competitive Advantages
- **Zero-code unsubscribe** implementation
- **Built-in compliance** from day one
- **Multi-provider support** for reliability
- **Developer-friendly** API design
- **Scalable architecture** for growth 