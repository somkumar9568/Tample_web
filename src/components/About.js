import React from 'react';
import './css/About.css'; 

function About() {
  return (
    <div className="about-container">
      <h2>About Us</h2>
      
      <div className="card-row">
        <div className="card">
          <h3>About Bhatkheri Village</h3>
          <p>Bhatkheri is a peaceful village with a rich history and a close-knit community. Located in the Saharanpur district of Uttar Pradesh, we take pride in our agricultural heritage and the hardworking people who live here. Our village is known for its beautiful landscapes, strong traditions, and welcoming atmosphere.</p>
        </div>

        <div className="card">
          <h3>History</h3>
          <p>Our village has a long-standing tradition of agriculture and communal living. The local people have a strong bond with nature and a shared commitment to the prosperity of the community.</p>
        </div>

        <div className="card">
          <h3>Culture & Traditions</h3>
          <p>The people of Bhatkheri follow age-old traditions and celebrate festivals with great enthusiasm. We take pride in our cultural practices, which are passed down through generations.</p>
        </div>
      </div>
    </div>
  );
}

export default About;
