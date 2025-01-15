import React, { useState } from 'react';
import './css/Gallery.css';
import { images } from "./ImagesData";
import { videos } from "./VideosData";

function Gallery() {
  const [view, setView] = useState('image'); // 'image' or 'video'
  const [selectedItem, setSelectedItem] = useState(null); // Image or video selected
  const [currentPage, setCurrentPage] = useState(1); // Current page for pagination
  const itemsPerPage = 20; // Number of items per page

  const handleItemClick = (item) => {
    setSelectedItem(item);
  };

  const handleClose = () => {
    setSelectedItem(null); // Close the selected image or video by setting the selectedItem to null
  };

  const handleNextPage = () => {
    setCurrentPage((prevPage) => prevPage + 1);
  };

  const handlePrevPage = () => {
    setCurrentPage((prevPage) => prevPage - 1);
  };

  const getCurrentItems = () => {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    return view === 'image' ? images.slice(startIndex, endIndex) : videos.slice(startIndex, endIndex);
  };

  const totalPages = Math.ceil((view === 'image' ? images.length : videos.length) / itemsPerPage);

  return (
    <div className="container">
      <div className="box">
        <h1>Our Gallery</h1>
        <ul>
          <li onClick={() => setView('image')}>Images</li>
          <li onClick={() => setView('video')}>Videos</li>
        </ul>
      </div>

      {selectedItem ? (
        <div className="overlay">
          <div className="selected-item">
            {view === 'image' ? (
              <div className="image-container">
                <img src={selectedItem} alt="Selected" className="zoom" />
                <div className="download-btn">
                  <a href={selectedItem} download>
                    <button>Download</button>
                  </a>
                </div>
                <button className="close-btn" onClick={handleClose}>Close</button>
              </div>
            ) : (
              <div className="video-container">
                <video controls>
                  <source src={selectedItem} type="video/mp4" />
                </video>
                <div className="download-btn">
                  <a href={selectedItem} download>
                    <button>Download</button>
                  </a>
                </div>
                <button className="close-btn" onClick={handleClose}>Close</button>
              </div>
            )}
          </div>
        </div>
      ) : (
        <div className="gallery">
          {getCurrentItems().map((item, index) => (
            <div key={index} className="item" onClick={() => handleItemClick(item)}>
              {view === 'image' ? (
                <div className="image-item">
                  <img src={item} alt={`Item ${index + 1}`} className="zoom" />
                  <div className="download-btn">
                    <a href={item} download>
                      <button>Download</button>
                    </a>
                  </div>
                </div>
              ) : (
                <div className="video-item">
                  <video width="100%" height="auto">
                    <source src={item} type="video/mp4" />
                  </video>
                  <div className="download-btn">
                    <a href={item} download>
                      <button>Download</button>
                    </a>
                  </div>
                </div>
              )}
            </div>
          ))}
        </div>
      )}

      <div className="pagination">
        <button onClick={handlePrevPage} disabled={currentPage === 1}>Previous</button>
        <span>Page {currentPage} of {totalPages}</span>
        <button onClick={handleNextPage} disabled={currentPage === totalPages}>Next</button>
      </div>
    </div>
  );
}

export default Gallery;
