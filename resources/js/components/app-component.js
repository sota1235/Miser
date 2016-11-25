/**
 * @fileoverview Route component for app.
 */
import React          from 'react';
import Calendar       from 'containers/calendar-container';
import CalendarFooter from 'containers/calendar-footer-container';
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

const App = () => (
  <div className="miser-app">
    <p>Miser</p>
    <Calendar />
    <CalendarFooter />
  </div>
);

export default App;
