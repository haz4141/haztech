# HazTech Digital - Testing Checklist

## 🧪 Complete Testing Guide

Use this checklist to verify that all features are working correctly.

---

## 📱 Device Testing

### Desktop Testing
- [ ] Chrome (latest version)
- [ ] Firefox (latest version)
- [ ] Safari (if on Mac)
- [ ] Edge (latest version)

### Tablet Testing
- [ ] iPad (Safari)
- [ ] Android Tablet (Chrome)
- [ ] Portrait orientation
- [ ] Landscape orientation

### Mobile Testing
- [ ] iPhone (Safari)
- [ ] Android (Chrome)
- [ ] Portrait orientation
- [ ] Landscape orientation

---

## 🏠 Navigation Testing

### Desktop Navigation
- [ ] Logo click returns to home
- [ ] "Home" link scrolls to hero section
- [ ] "Services" link scrolls to services section
- [ ] "About" link scrolls to about section
- [ ] "Contact" link scrolls to contact section
- [ ] "Get Started" button opens services modal
- [ ] Smooth scroll animation works

### Mobile Navigation
- [ ] Hamburger menu icon appears on small screens
- [ ] Clicking hamburger opens menu
- [ ] Menu slides in from right
- [ ] Close button (X) works
- [ ] Clicking menu links closes menu
- [ ] Clicking links scrolls to correct section

### Scroll Effects
- [ ] Header becomes opaque on scroll
- [ ] Back to top button appears after scrolling
- [ ] Back to top button returns to top
- [ ] Back to top has smooth animation

---

## 🎯 Hero Section Testing

### Visual Elements
- [ ] Hero background gradient displays
- [ ] Animated background blobs are visible
- [ ] Main heading displays correctly
- [ ] Subtitle text is readable
- [ ] Gradient text effect on "HazTech Digital" works
- [ ] Floating animation on circular element works

### Buttons
- [ ] "Learn More" button scrolls to About
- [ ] "Get Quote" button opens Calculator modal
- [ ] Button hover effects work
- [ ] Button shine animation on hover

---

## 💼 Services Section Testing

### Service Cards
- [ ] All 3 service cards display (Computer, Phone, Security)
- [ ] Icons (emojis) display correctly
- [ ] Card hover effects work (lift animation)
- [ ] Cards are clickable
- [ ] Clicking card shows service details notification

### Service Card Buttons
- [ ] "Get Quote" button on Computer & Networking works
- [ ] "Get Quote" button on Phone Repairs works
- [ ] "Get Quote" button on Cybersecurity works
- [ ] Buttons open calculator with correct service selected
- [ ] Checkmark icons display in lists

### Animations
- [ ] Cards fade in on scroll
- [ ] Cards have staggered animation (delay)
- [ ] Hover shadow effect works
- [ ] Hover lift effect smooth

---

## 📖 About Section Testing

### Content Display
- [ ] Section background gradient displays
- [ ] "About HazTech" heading visible
- [ ] CEO name displays correctly
- [ ] Company description readable
- [ ] Logo image displays
- [ ] Logo has glow effect

### Buttons
- [ ] "Contact Us" button scrolls to contact section
- [ ] "Meet Our Team" button shows notification
- [ ] Team notification displays CEO info
- [ ] Button hover effects work

### Statistics
- [ ] "500+ Projects" displays
- [ ] "98% Satisfaction" displays
- [ ] "24/7 Support" displays
- [ ] "10+ Years" displays
- [ ] Stats animate on scroll

---

## 📧 Contact Section Testing

### Contact Information
- [ ] "Get in Touch" heading displays
- [ ] Phone number displays: +60-XXX-XXXX
- [ ] Email displays: info@haztechdigital.com
- [ ] Location displays: Malaysia
- [ ] Icons display next to contact info
- [ ] Social media icons display
- [ ] Social media icons are clickable

### Contact Form
- [ ] Form displays with glass effect
- [ ] Name field accepts input
- [ ] Email field accepts input
- [ ] Service dropdown opens
- [ ] All service options present
- [ ] Message textarea accepts input
- [ ] Field borders highlight on focus (blue)

### Form Validation
- [ ] Submitting empty form shows validation
- [ ] Invalid email shows error
- [ ] All required fields validated
- [ ] Submit button shows "Sending..." state
- [ ] Success notification appears after submit
- [ ] Form resets after submission

---

## 🪟 Services Modal Testing

### Opening Modal
- [ ] Opens from "Get Started" button in nav
- [ ] Opens from "Explore Services" button
- [ ] Modal fades in smoothly
- [ ] Background blur effect works
- [ ] Modal centers on screen

### Modal Content
- [ ] "Our Services" title displays
- [ ] All 3 service cards show
- [ ] Service titles display
- [ ] Service feature lists display
- [ ] Checkmark icons appear
- [ ] Feather icons render

### Modal Interaction
- [ ] "Get Quote" buttons work for each service
- [ ] Clicking button opens calculator
- [ ] Close (X) button works
- [ ] Clicking outside modal closes it
- [ ] Body scroll disabled when open
- [ ] Body scroll restored when closed

---

## 🧮 Calculator Modal Testing

### Opening Calculator
- [ ] Opens from "Get Quote" hero button
- [ ] Opens from service card buttons
- [ ] Opens from services modal buttons
- [ ] Pre-fills service if clicked from service card
- [ ] Modal fades in smoothly

### Calculator Fields
- [ ] Service dropdown displays
- [ ] All services listed in dropdown
- [ ] Device count input works
- [ ] Device count minimum is 1
- [ ] Priority dropdown displays
- [ ] All priority levels listed
- [ ] Priority multipliers shown in text

### Price Calculation
- [ ] Selecting service shows base price
- [ ] Changing device count updates price
- [ ] Changing priority updates price
- [ ] Price displays in correct format ($XX)
- [ ] Price updates in real-time
- [ ] Price calculation is accurate

### Calculator Actions
- [ ] "Book Service" button works
- [ ] Clicking book closes calculator
- [ ] Contact form pre-fills with service details
- [ ] Page scrolls to contact section
- [ ] Success notification shows
- [ ] Close (X) button works
- [ ] Clicking outside closes modal

---

## 🔔 Notification System Testing

### Notification Display
- [ ] Notifications appear in top-right
- [ ] Success notifications are green
- [ ] Error notifications are red
- [ ] Info notifications are blue
- [ ] Notifications slide in from right

### Notification Content
- [ ] Title displays correctly
- [ ] Message displays correctly
- [ ] Close (X) button works
- [ ] Auto-dismiss after 5 seconds
- [ ] Multiple notifications stack properly

### Notification Triggers
- [ ] Service details show info notification
- [ ] Team info shows info notification
- [ ] Form submit shows success notification
- [ ] Book service shows success notification
- [ ] Empty calculator shows error notification

---

## 🎨 Visual Effects Testing

### Animations
- [ ] AOS animations work on scroll
- [ ] Fade-up animations smooth
- [ ] Fade-left animations smooth
- [ ] Fade-right animations smooth
- [ ] Float animation on hero element
- [ ] Pulse animations on background blobs

### Hover Effects
- [ ] Buttons have hover state
- [ ] Cards lift on hover
- [ ] Links change color on hover
- [ ] Social icons highlight on hover
- [ ] Smooth transitions on all hovers

### Glassmorphism
- [ ] Glass effect on service cards
- [ ] Glass effect on form
- [ ] Glass effect on modal cards
- [ ] Backdrop blur works
- [ ] Border glow effect visible

### Gradients
- [ ] Hero background gradient smooth
- [ ] About background gradient smooth
- [ ] Gradient text on heading works
- [ ] Button gradients smooth

---

## 📏 Responsive Design Testing

### Breakpoints
- [ ] Mobile (< 768px)
  - [ ] Single column layout
  - [ ] Mobile menu appears
  - [ ] Text sizes readable
  - [ ] Buttons touch-friendly
  - [ ] Form stacks vertically
  - [ ] Stats stack in 2 columns

- [ ] Tablet (768px - 1024px)
  - [ ] Two column layouts
  - [ ] Desktop menu visible
  - [ ] Service cards in grid
  - [ ] About section adapts
  - [ ] Form layout optimized

- [ ] Desktop (> 1024px)
  - [ ] Full three column layouts
  - [ ] Max width container
  - [ ] Proper spacing
  - [ ] All elements aligned

### Text Readability
- [ ] Headings scale appropriately
- [ ] Body text readable on all devices
- [ ] No text overflow
- [ ] Line heights comfortable
- [ ] Contrast sufficient

---

## 🔍 Accessibility Testing

### Keyboard Navigation
- [ ] Tab through all interactive elements
- [ ] Focus indicators visible
- [ ] Enter/Space activate buttons
- [ ] Escape closes modals
- [ ] Tab order logical

### Screen Reader
- [ ] Images have alt text
- [ ] Buttons have descriptive text
- [ ] Form labels associated
- [ ] Landmarks properly used
- [ ] Headings hierarchical

### Color Contrast
- [ ] Text on dark background readable
- [ ] Button text readable
- [ ] Link colors distinguishable
- [ ] Form text visible
- [ ] Disabled states clear

---

## ⚡ Performance Testing

### Load Time
- [ ] Page loads in < 3 seconds
- [ ] Images load progressively
- [ ] Fonts load smoothly
- [ ] No layout shift on load
- [ ] Icons render quickly

### Smooth Scrolling
- [ ] Scroll animations smooth (60fps)
- [ ] No lag on mobile
- [ ] Hover effects responsive
- [ ] Modal animations smooth
- [ ] No jank on interactions

### CDN Resources
- [ ] Tailwind CSS loads
- [ ] AOS library loads
- [ ] Feather Icons load
- [ ] Google Fonts load
- [ ] No broken dependencies

---

## 🔧 Functionality Testing

### Form Handling
- [ ] Input validation works
- [ ] Required fields enforced
- [ ] Email format validated
- [ ] Submit button disabled during send
- [ ] Form clears after submit

### Data Flow
- [ ] Calculator data passes to form
- [ ] Service selection persists
- [ ] Notification data correct
- [ ] Modal states independent

### Error Handling
- [ ] Empty calculator shows error
- [ ] Invalid form shows validation
- [ ] Graceful degradation if CDN fails
- [ ] No console errors
- [ ] No broken features

---

## 🌐 Browser Compatibility

### Modern Browsers
- [ ] Chrome 90+ full support
- [ ] Firefox 88+ full support
- [ ] Safari 14+ full support
- [ ] Edge 90+ full support

### Features Tested
- [ ] CSS Grid works
- [ ] Flexbox works
- [ ] Backdrop filter works
- [ ] Smooth scroll works
- [ ] Custom properties work

---

## 📊 Final Checks

### Before Launch
- [ ] All sections complete
- [ ] No Lorem Ipsum text
- [ ] Contact info updated
- [ ] Phone number correct
- [ ] Email address correct
- [ ] Social links updated
- [ ] Logo images present
- [ ] No placeholder content

### Content Review
- [ ] Spelling checked
- [ ] Grammar checked
- [ ] Links all work
- [ ] Images optimized
- [ ] Copyright year correct

### Technical Review
- [ ] No console errors
- [ ] No 404 errors
- [ ] All assets load
- [ ] Forms work
- [ ] SEO tags present

---

## ✅ Testing Status

**Date Tested:** _______________

**Tester:** _______________

**Browser/Device:** _______________

**Pass/Fail:** _______________

**Notes:** 
_______________________________________________
_______________________________________________
_______________________________________________

---

## 🐛 Bug Report Template

If you find any issues, use this format:

**Issue:** 
**Steps to Reproduce:**
1. 
2. 
3. 

**Expected Behavior:**

**Actual Behavior:**

**Device/Browser:**

**Screenshot:** (if applicable)

---

## 🎉 All Tests Passed?

If all tests pass:
1. ✅ Website is production ready
2. ✅ Deploy to live server
3. ✅ Monitor for user feedback
4. ✅ Set up analytics

**Congratulations! Your website is ready to go live!** 🚀

