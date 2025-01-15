import React from "react";
import "./css/cardMember.css"; 
import { cardData } from "./MemberCardData"; // Correct import

const App = () => {
  return (
    <div className="app">
      <h1 style={{ textAlign: "center" }}> Guru Ravidas Table Committee Member</h1>
      <div className="card-container">
        {cardData.map((card) => (
          <div className="card" key={card.id}>
            <img src={card.image} alt={card.name} className="card-image" />
            <h2 className="card-name">{card.name}</h2>
            <h3 className="card-role">{card.role}</h3>
          </div>
        ))}
      </div>
    </div>
  );
};

export default App;
