import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './css/Navbar.css';

function Navbar() {
  const [isOpen, setIsOpen] = useState(false);

  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };

  const closeMenu = () => {
    setIsOpen(false);
  };

  return (
    <nav>
      <div className="nav-container">
        <button className="menu-toggle" onClick={toggleMenu}>
          ☰
        </button>
      </div>
      <div className='logo-right'>
        <h1 className="logo">Tample</h1>
      </div>
      <ul className={`nav-links ${isOpen ? 'open' : ''}`}>
        <li>
          <Link to="/" onClick={closeMenu}>
            Home
          </Link>
        </li>
        <li>
          <Link to="/about" onClick={closeMenu}>
            About
          </Link>
        </li>
        <li>
          <Link to="/gallery" onClick={closeMenu}>
            Gallery
          </Link>
        </li>
        <li>
          <Link to="/contact" onClick={closeMenu}>
            Contact
          </Link>
        </li>
        <li>
          <Link to="/notification" onClick={closeMenu}>
            Notification
          </Link>
        </li>
      </ul>
    </nav>
  );
}

export default Navbar;
