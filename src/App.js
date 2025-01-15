import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './components/Navbar';
import Home from './components/Home';
import About from './components/About';
import Gallery from './components/Gallery';
import Contact from './components/Contact';
import Notification from './components/Notification';
import CarouselComponent from './components/CarouselComponent'; 
import Footer from './components/footer'; 

import './App.css';

function App() {
  return (
    <div className="App">
      <Router>
        <Navbar />
        <CarouselComponent /> 
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<About />} />
          <Route path="/gallery" element={<Gallery />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="/notification" element={<Notification />} /> 
        </Routes>
        <Footer />
      </Router>
    </div>
  );
}

export default App;
