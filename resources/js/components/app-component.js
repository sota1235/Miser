/**
 * @fileoverview Route component for app.
 */
import React          from 'react';
import Calendar       from 'containers/calendar-container';
import CalendarFooter from 'containers/calendar-footer-container';

const App = () => (
  <div className="miser-app">
    <p>Miser</p>
    <Calendar />
    <CalendarFooter />
  </div>
);

export default App;
