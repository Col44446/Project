import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';

const API_URL = 'http://localhost/Project/api/sewadars';

function App() {
  const [sewadars, setSewadars] = useState([]);
  const [sewadarName, setSewadarName] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  useEffect(() => {
    fetchSewadars();
  }, []);

  const fetchSewadars = async () => {
    try {
      setLoading(true);
      const response = await axios.get(API_URL);
      setSewadars(response.data);
      setError('');
    } catch (err) {
      setError('Failed to fetch sewadars. Make sure the backend is running.');
      console.error('Error fetching sewadars:', err);
    } finally {
      setLoading(false);
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    if (!sewadarName.trim()) {
      setError('Please enter a sewadar name');
      return;
    }

    try {
      setLoading(true);
      await axios.post(API_URL, { name: sewadarName });
      setSewadarName('');
      fetchSewadars();
      setError('');
    } catch (err) {
      setError('Failed to add sewadar. Please try again.');
      console.error('Error adding sewadar:', err);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="App">
      <div className="container">
        <h1>Sewadaar Management</h1>
        
        <div className="form-card">
          <h2>Add New Sewadar</h2>
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <input
                type="text"
                placeholder="Enter sewadar name"
                value={sewadarName}
                onChange={(e) => setSewadarName(e.target.value)}
                disabled={loading}
              />
            </div>
            <button type="submit" disabled={loading}>
              {loading ? 'Adding...' : 'Add Sewadar'}
            </button>
          </form>
          {error && <div className="error-message">{error}</div>}
        </div>

        <div className="list-card">
          <h2>Sewadar List</h2>
          {loading && sewadars.length === 0 ? (
            <p className="loading">Loading...</p>
          ) : sewadars.length === 0 ? (
            <p className="empty-state">No sewadars added yet. Add your first sewadar above!</p>
          ) : (
            <ul className="sewadar-list">
              {sewadars.map((sewadar) => (
                <li key={sewadar.id} className="sewadar-item">
                  <div className="sewadar-info">
                    <span className="sewadar-name">{sewadar.name}</span>
                    <span className="sewadar-date">
                      {new Date(sewadar.created_at).toLocaleDateString()}
                    </span>
                  </div>
                </li>
              ))}
            </ul>
          )}
        </div>
      </div>
    </div>
  );
}

export default App;
