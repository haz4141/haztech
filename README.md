# HazTech Digital

A modern, responsive website for HazTech Digital Enterprise, providing comprehensive digital solutions including computer networking, repairs, and cybersecurity services.

## Features

- **Responsive Design**: Optimized for desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, professional design with smooth animations
- **Contact Form**: Functional contact form with validation and data storage
- **Smooth Scrolling**: Enhanced navigation with smooth scroll effects
- **Accessibility**: Proper form labels and semantic HTML structure

## Recent Fixes

### 1. CSS File Reference
- Fixed `receipt.html` to reference the correct CSS file (`style.css` instead of `styles.css`)

### 2. Contact Form Functionality
- Added proper form action and method to `index.html`
- Implemented form validation with required fields
- Added proper form labels for accessibility
- Enhanced form styling with input groups

### 3. PHP Backend Improvements
- Enhanced `save_data.php` with proper input validation and sanitization
- Added email validation
- Improved data structure with JSON formatting
- Added error handling and user feedback

### 4. JavaScript Enhancements
- Added click functionality to the "to-top" button
- Implemented smooth scrolling for anchor links
- Added error message display for form validation

### 5. User Experience Improvements
- Redesigned the success page (`bye.html`) with professional styling
- Added responsive design for mobile devices
- Improved form field styling and layout
- Enhanced error handling and user feedback

### 6. Security Improvements
- Input sanitization to prevent XSS attacks
- Email validation to ensure proper email format
- Proper error handling without exposing sensitive information

## File Structure

```
haztech/
├── index.html          # Main homepage
├── receipt.html        # Receipt generator page
├── hzhzhz.html         # Simple form page
├── bye.html           # Success/thank you page
├── style.css          # Main stylesheet
├── script.js          # JavaScript functionality
├── save_data.php      # PHP backend for form processing
├── data.txt           # Data storage file
├── assets/            # Images and media files
└── README.md          # This file
```

## Setup Instructions

1. Clone the repository
2. Ensure you have a PHP-enabled web server
3. Make sure the `data.txt` file is writable by the web server
4. Open `index.html` in your browser

## Technologies Used

- HTML5
- CSS3 (with custom properties and flexbox/grid)
- JavaScript (ES6+)
- PHP (for backend processing)
- AOS (Animate On Scroll library)
- Feather Icons
- Google Fonts

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contact

For any issues or questions, please contact HazTech Digital Enterprise.