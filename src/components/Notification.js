import React, { useState } from 'react';
import './css/Notification.css';

function Notification() {
  // Simulating upcoming events
  const [events] = useState([
    { id: 1, title: 'Temple Prayer Meeting', date: '2025-01-10', description: 'Join us for a prayer meeting at the temple.' },
    { id: 2, title: 'Community Feast', date: '2025-01-15', description: 'A community feast for everyone to come together and share a meal.' },
    { id: 3, title: 'Annual Temple Festival', date: '2025-01-20', description: 'Celebration with music, food, and rituals.' },
    { id: 4, title: 'Annual Temple Festival', date: '2025-02-12', description: 'Celebration with Guru Ravidsh Jayanti 256' },
    { id: 5, title: 'Annual Temple Festival', date: '2025-02-12', description: 'Celebration with Guru Ravidsh Jayanti 256' },
    { id: 6 , title: 'Annual Temple Festival', date: '2025-02-12', description: 'Celebration with Guru Ravidsh Jayanti 256' },
  ]);

  return (
    <div className="notification-container">
      <h2>Upcoming Events</h2>
      <p>Check out the exciting upcoming events at the temple!</p>
      <div className="event-list">
        {events.map((event) => (
          <div key={event.id} className="event-item">
            <h3>{event.title}</h3>
            <p><strong>Date:</strong> {event.date}</p>
            <p>{event.description}</p>
          </div>
        ))}
      </div>
    </div>
  );
}

export default Notification;
