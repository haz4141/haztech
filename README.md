# HazTech Digital

A modern, responsive website for HazTech Digital Enterprise, providing comprehensive digital solutions including computer networking, repairs, and cybersecurity services.

## Features

- **Responsive Design**: Optimized for desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Dynamic Functionality**: Interactive features and real-time data management
- **Service Calculator**: Real-time pricing calculator with priority options
- **Admin Dashboard**: Complete management system for bookings, customers, and services
- **Contact Form**: Functional contact form with validation and data storage
- **Smooth Scrolling**: Enhanced navigation with smooth scroll effects
- **Accessibility**: Proper form labels and semantic HTML structure
- **API Integration**: RESTful API for dynamic data operations

## Dynamic Features

### 🚀 **Interactive Service Calculator**
- Real-time pricing calculation based on service type, device count, and priority
- Dynamic cost updates as users modify parameters
- Priority multipliers for urgent and emergency services
- Automatic form pre-filling with calculated service details

### 📊 **Admin Dashboard**
- **Overview Tab**: Real-time statistics and recent activity
- **Bookings Management**: Add, edit, delete, and track service bookings
- **Customer Management**: Manage customer information and history
- **Service Management**: Configure service pricing and options
- **Data Tables**: Interactive tables with sorting and filtering capabilities

### 🎯 **Service Modals & Interactions**
- Interactive service exploration modal
- Detailed service information with feature lists
- One-click quote generation
- Seamless integration with contact form

### 📱 **Enhanced User Experience**
- Real-time notifications system
- Loading states and form validation
- Smooth animations and transitions
- Mobile-responsive design

### 🔧 **Backend API**
- RESTful API endpoints for data operations
- JSON-based data storage
- CRUD operations for bookings, customers, and services
- Real-time data synchronization

## Recent Fixes & Enhancements

### 1. CSS File Reference
- Fixed `receipt.html` to reference the correct CSS file (`style.css` instead of `styles.css`)

### 2. Contact Form Functionality
- Added proper form action and method to `index.html`
- Implemented form validation with required fields
- Added proper form labels for accessibility
- Enhanced form styling with input groups
- Added service selection dropdown

### 3. PHP Backend Improvements
- Enhanced `save_data.php` with proper input validation and sanitization
- Added email validation
- Improved data structure with JSON formatting
- Added error handling and user feedback
- Created comprehensive API system (`api.php`)

### 4. JavaScript Enhancements
- Added click functionality to the "to-top" button
- Implemented smooth scrolling for anchor links
- Added error message display for form validation
- Created interactive service calculator
- Implemented modal system for services and calculator
- Added notification system for user feedback

### 5. User Experience Improvements
- Redesigned the success page (`bye.html`) with professional styling
- Added comprehensive responsive design for mobile devices
- Improved form field styling and layout
- Enhanced error handling and user feedback
- Added dashboard link in header navigation

### 6. Security Improvements
- Input sanitization to prevent XSS attacks
- Email validation to ensure proper email format
- Proper error handling without exposing sensitive information
- API authentication and validation

### 7. New Dynamic Features
- **Service Calculator**: Real-time pricing with priority options
- **Admin Dashboard**: Complete management system
- **Interactive Modals**: Service exploration and calculator
- **API Integration**: RESTful endpoints for data operations
- **Real-time Notifications**: User feedback system

## File Structure

```
haztech/
├── index.html              # Main homepage with dynamic features
├── dashboard.html          # Admin dashboard for management
├── receipt.html            # Receipt generator page
├── bye.html               # Success/thank you page
├── style.css              # Main stylesheet with dynamic styling
├── script.js              # Enhanced JavaScript functionality
├── save_data.php          # Contact form processing
├── api.php                # RESTful API for dynamic operations
├── dashboard_data.json    # JSON data storage (auto-generated)
├── data.txt               # Contact form data storage
├── assets/                # Images and media files
└── README.md              # This file
```

## API Endpoints

### GET Requests
- `api.php?action=dashboard` - Get dashboard statistics
- `api.php?action=bookings` - Get all bookings
- `api.php?action=customers` - Get all customers
- `api.php?action=services` - Get all services
- `api.php?action=calculate&service=type&devices=count&priority=level` - Calculate service cost

### POST Requests
- `api.php?action=booking` - Create new booking
- `api.php?action=customer` - Create new customer
- `api.php?action=service` - Create new service

### PUT Requests
- `api.php?action=booking&id=ID` - Update booking

### DELETE Requests
- `api.php?action=booking&id=ID` - Delete booking

## Setup Instructions

1. Clone the repository
2. Ensure you have a PHP-enabled web server
3. Make sure the `data.txt` and `dashboard_data.json` files are writable by the web server
4. Open `index.html` in your browser
5. Access the dashboard at `dashboard.html` for admin functions

## Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Libraries**: AOS (Animate On Scroll), Feather Icons
- **Data Storage**: JSON files (can be upgraded to MySQL/PostgreSQL)
- **Styling**: CSS Grid, Flexbox, Custom Properties
- **API**: RESTful JSON API

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Dynamic Features Demo

### Service Calculator
1. Click "Get Quote" button on homepage
2. Select service type, device count, and priority
3. View real-time cost calculation
4. Click "Book Service" to pre-fill contact form

### Admin Dashboard
1. Click "Dashboard" link in header
2. Navigate between Overview, Bookings, Services, and Customers tabs
3. Add, edit, or delete records
4. View real-time statistics and activity

### Interactive Services
1. Click "Explore Services" to view detailed service information
2. Click on service cards for detailed information
3. Use "Get Quote" buttons for instant pricing

## Contact

For any issues or questions, please contact HazTech Digital Enterprise.

---

**Note**: This is now a fully dynamic website with interactive features, real-time data management, and a complete admin dashboard. The system can be easily extended with additional features and integrated with a proper database system for production use.