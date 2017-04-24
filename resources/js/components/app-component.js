// @flow weak
/**
 * @fileoverview Route component for app.
 */
import React          from 'react';
import TopHeader      from 'containers/top-header-container';
import Calendar       from 'containers/calendar-container';
import CalendarFooter from 'containers/calendar-footer-container';

const App = () => (
  <div className="miser-app">
    <TopHeader />
    <Calendar />
    <CalendarFooter />
  </div>
);

export default App;
