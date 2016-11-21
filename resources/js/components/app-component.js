/**
 * @fileoverview Route component for app.
 */
import React          from 'react';
import Calendar       from 'components/calendar-component';
import CalendarFooter from 'components/calendar-footer-component';
import { uniqueId }   from 'lodash';

const dummyData = [
  { day: 26, isCurrent: false, fulldate: uniqueId() },
  { day: 27, isCurrent: false, fulldate: uniqueId()  },
  { day: 28, isCurrent: false, fulldate: uniqueId()  },
  { day: 29, isCurrent: false, fulldate: uniqueId()  },
  { day: 30, isCurrent: false, fulldate: uniqueId()  },
  { day: 1, isCurrent: true, fulldate: uniqueId()  },
  { day: 2, isCurrent: true, fulldate: uniqueId()  },
  { day: 3, isCurrent: true, fulldate: uniqueId()  },
  { day: 4, isCurrent: true, fulldate: uniqueId()  },
  { day: 5, isCurrent: true, fulldate: uniqueId()  },
  { day: 6, isCurrent: true, fulldate: uniqueId()  },
  { day: 7, isCurrent: true, fulldate: uniqueId()  },
  { day: 8, isCurrent: true, fulldate: uniqueId()  },
  { day: 9, isCurrent: true, fulldate: uniqueId()  },
];

const dummyLinks = {
  prevMonth: '/?year=2016&month=5',
  nextMonth: '/?year=2016&month=7',
};

const App = () => (
  <div className="miser-app">
    <p>Miser</p>
    <Calendar calendars={ dummyData } />
    <CalendarFooter links={ dummyLinks } />
  </div>
);

export default App;
