let lastScrollTop = 0;
const header = document.querySelector("header");
const toTop = document.querySelector(".to-top");
const heroSection = document.querySelector(".hero");

// Service pricing data
const servicePricing = {
  networking: {
    base: 50,
    perDevice: 25,
    urgent: 1.5,
    emergency: 2.5
  },
  repairs: {
    base: 30,
    perDevice: 20,
    urgent: 1.8,
    emergency: 3.0
  },
  security: {
    base: 100,
    perDevice: 50,
    urgent: 1.3,
    emergency: 2.0
  }
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  AOS.init();
  feather.replace();
  
  // Initialize calculator
  initializeCalculator();
  
  // Check for error parameters in URL
  checkForErrors();
  
  // Add form submission handler
  document.getElementById('contactForm').addEventListener('submit', handleFormSubmission);
});

// Scroll event listener
window.addEventListener("scroll", () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const heroSectionOffsetTop = heroSection.offsetTop;

  if (scrollTop > heroSectionOffsetTop) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }

  if (scrollTop > lastScrollTop) {
    header.classList.add("hidden");
  } else {
    header.classList.remove("hidden");
  }

  lastScrollTop = scrollTop;
});

// To-top button click functionality
toTop.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Modal functionality
function openServicesModal() {
  document.getElementById('servicesModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function closeServicesModal() {
  document.getElementById('servicesModal').style.display = 'none';
  document.body.style.overflow = 'auto';
}

function openCalculator() {
  document.getElementById('calculatorModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function closeCalculator() {
  document.getElementById('calculatorModal').style.display = 'none';
  document.body.style.overflow = 'auto';
}

// Close modals when clicking outside
window.onclick = function(event) {
  const servicesModal = document.getElementById('servicesModal');
  const calculatorModal = document.getElementById('calculatorModal');
  
  if (event.target === servicesModal) {
    closeServicesModal();
  }
  if (event.target === calculatorModal) {
    closeCalculator();
  }
}

// Service details functionality
function showServiceDetails(serviceType) {
  const serviceInfo = {
    networking: {
      title: "Computer & Networking Services",
      description: "Comprehensive computer and networking solutions for businesses and individuals.",
      features: [
        "PC/Laptop Hardware Repair",
        "Network Infrastructure Setup",
        "Data Recovery Services",
        "System Maintenance & Optimization",
        "Software Installation & Configuration",
        "Network Security Implementation"
      ],
      pricing: "Starting from $50"
    },
    repairs: {
      title: "Phone Repair Services",
      description: "Expert mobile device repair services with quick turnaround times.",
      features: [
        "Screen & Display Replacement",
        "Battery Replacement",
        "Water Damage Repair",
        "Software & System Issues",
        "Charging Port Repair",
        "Camera & Speaker Repair"
      ],
      pricing: "Starting from $30"
    },
    security: {
      title: "Cybersecurity Solutions",
      description: "Advanced security measures to protect your digital assets.",
      features: [
        "Security Audits & Assessments",
        "Virus & Malware Removal",
        "Data Protection & Backup",
        "Security Training & Awareness",
        "Firewall Configuration",
        "Incident Response Planning"
      ],
      pricing: "Starting from $100"
    }
  };

  const service = serviceInfo[serviceType];
  if (service) {
    showNotification(service.title, service.description, 'info');
    // You can expand this to show a detailed modal
  }
}

// Calculator functionality
function initializeCalculator() {
  const calcService = document.getElementById('calcService');
  const deviceCount = document.getElementById('deviceCount');
  const priority = document.getElementById('priority');
  
  [calcService, deviceCount, priority].forEach(element => {
    if (element) {
      element.addEventListener('change', calculatePrice);
    }
  });
}

function calculatePrice() {
  const serviceType = document.getElementById('calcService').value;
  const deviceCount = parseInt(document.getElementById('deviceCount').value) || 1;
  const priority = document.getElementById('priority').value;
  
  if (!serviceType) {
    document.getElementById('estimatedCost').textContent = '$0';
    return;
  }
  
  const pricing = servicePricing[serviceType];
  let basePrice = pricing.base + (pricing.perDevice * (deviceCount - 1));
  
  // Apply priority multiplier
  switch(priority) {
    case 'urgent':
      basePrice *= pricing.urgent;
      break;
    case 'emergency':
      basePrice *= pricing.emergency;
      break;
  }
  
  document.getElementById('estimatedCost').textContent = `$${Math.round(basePrice)}`;
}

function getQuote(serviceType) {
  closeServicesModal();
  openCalculator();
  document.getElementById('calcService').value = serviceType;
  calculatePrice();
}

function bookService() {
  const serviceType = document.getElementById('calcService').value;
  const deviceCount = document.getElementById('deviceCount').value;
  const priority = document.getElementById('priority').value;
  const cost = document.getElementById('estimatedCost').textContent;
  
  if (!serviceType) {
    showNotification('Error', 'Please select a service type', 'error');
    return;
  }
  
  // Pre-fill contact form with service details
  document.getElementById('service').value = serviceType;
  document.getElementById('message').value = `Service Request: ${serviceType}\nDevice Count: ${deviceCount}\nPriority: ${priority}\nEstimated Cost: ${cost}`;
  
  closeCalculator();
  
  // Scroll to contact form
  document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
  
  showNotification('Success', 'Service details added to contact form', 'success');
}

// Team information functionality
function loadTeamInfo() {
  const teamData = [
    {
      name: "Mohd Hazami Hasnah",
      position: "CEO & Founder",
      expertise: "Digital Transformation, Cybersecurity",
      image: "assets/haztech-logo.png"
    },
    {
      name: "Technical Team",
      position: "IT Specialists",
      expertise: "Computer Repair, Network Setup, Phone Repairs",
      image: "assets/tools.jpg"
    }
  ];
  
  showNotification('Team Info', `CEO: ${teamData[0].name} - ${teamData[0].position}`, 'info');
}

// Form handling
function handleFormSubmission(e) {
  e.preventDefault();
  
  const formData = new FormData(e.target);
  const data = Object.fromEntries(formData);
  
  // Show loading state
  const submitBtn = e.target.querySelector('button[type="submit"]');
  const originalText = submitBtn.textContent;
  submitBtn.textContent = 'Sending...';
  submitBtn.disabled = true;
  
  // Simulate form submission (replace with actual AJAX call)
  setTimeout(() => {
    // Reset form
    e.target.reset();
    
    // Reset button
    submitBtn.textContent = originalText;
    submitBtn.disabled = false;
    
    // Show success message
    showNotification('Success', 'Your message has been sent successfully!', 'success');
    
    // Redirect to thank you page
    setTimeout(() => {
      window.location.href = 'bye.html';
    }, 2000);
  }, 1500);
}

// Notification system
function showNotification(title, message, type = 'info') {
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.innerHTML = `
    <div class="notification-header">
      <h4>${title}</h4>
      <span class="notification-close" onclick="this.parentElement.parentElement.remove()">&times;</span>
    </div>
    <p>${message}</p>
  `;
  
  document.body.appendChild(notification);
  
  // Auto remove after 5 seconds
  setTimeout(() => {
    if (notification.parentElement) {
      notification.remove();
    }
  }, 5000);
}

// Error checking
function checkForErrors() {
  const urlParams = new URLSearchParams(window.location.search);
  const error = urlParams.get('error');
  
  if (error) {
    let errorMessage = '';
    switch(error) {
      case 'missing_fields':
        errorMessage = 'Please fill in all required fields.';
        break;
      case 'invalid_email':
        errorMessage = 'Please enter a valid email address.';
        break;
      default:
        errorMessage = 'An error occurred. Please try again.';
    }
    
    showNotification('Error', errorMessage, 'error');
  }
}

// Add notification styles dynamically
const notificationStyles = `
  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    color: #333;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    z-index: 10000;
    max-width: 300px;
    animation: slideIn 0.3s ease-out;
  }
  
  .notification-success {
    border-left: 4px solid #4CAF50;
  }
  
  .notification-error {
    border-left: 4px solid #f44336;
  }
  
  .notification-info {
    border-left: 4px solid #2196F3;
  }
  
  .notification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
  }
  
  .notification-close {
    cursor: pointer;
    font-size: 1.2rem;
    font-weight: bold;
  }
  
  @keyframes slideIn {
    from {
      transform: translateX(100%);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = notificationStyles;
document.head.appendChild(styleSheet);