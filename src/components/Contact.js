import React, { useState } from 'react';
import emailjs from 'emailjs-com';
import './css/Contact.css';

function Contact() {
  const [formData, setFormData] = useState({
    fullName: '',
    fatherName: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    const serviceID = 'service_4epuecb'; // Replace with your actual Service ID
    const templateID = 'template_62kbwes'; // Replace with your actual Template ID
    const publicKey = 'NDdlMR5ldqkbvOCwA'; // Replace with your actual Public Key

    const emailData = {
      fullName: formData.fullName,
      fatherName: formData.fatherName,
      to_email: 'kumarsom699@gmail.com', // Recipient email
    };

    emailjs
      .send(serviceID, templateID, emailData, publicKey)
      .then((response) => {
        console.log('SUCCESS!', response.status, response.text);
        alert('Your message has been sent successfully!');
        setFormData({ fullName: '', fatherName: '' }); // Reset form
      })
      .catch((error) => {
        console.error('FAILED...', error);
        alert('Failed to send the message. Please check your configuration and try again.');
      });
  };

  return (
    <div className="contact-container">
      <h2>Contact Us</h2>
      <form onSubmit={handleSubmit} className="contact-form">
        <div className="form-group">
          <label htmlFor="fullName">Full Name</label>
          <input
            type="text"
            id="fullName"
            name="fullName"
            value={formData.fullName}
            onChange={handleChange}
            placeholder="Enter your full name"
            required
          />
        </div>

        <div className="form-group">
          <label htmlFor="fatherName">Father's Name</label>
          <input
            type="text"
            id="fatherName"
            name="fatherName"
            value={formData.fatherName}
            onChange={handleChange}
            placeholder="Enter your father's name"
            required
          />
        </div>

        <button type="submit" className="submit-btn">Send Message</button>
      </form>
    </div>
  );
}

export default Contact;

// EmailJS is powefull librarey


