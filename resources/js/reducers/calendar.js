/**
 * @fileoverview Reducer for changing calendar state.
 */
import { uniqueId }   from 'lodash';

const dummyData = [
  { day: 26, isCurrent: false, timestamp: uniqueId() },
  { day: 27, isCurrent: false, timestamp: uniqueId()  },
  { day: 28, isCurrent: false, timestamp: uniqueId()  },
  { day: 29, isCurrent: false, timestamp: uniqueId()  },
  { day: 30, isCurrent: false, timestamp: uniqueId()  },
  { day: 1, isCurrent: true, timestamp: uniqueId()  },
  { day: 2, isCurrent: true, timestamp: uniqueId()  },
  { day: 3, isCurrent: true, timestamp: uniqueId()  },
  { day: 4, isCurrent: true, timestamp: uniqueId()  },
  { day: 5, isCurrent: true, timestamp: uniqueId()  },
  { day: 6, isCurrent: true, timestamp: uniqueId()  },
  { day: 7, isCurrent: true, timestamp: uniqueId()  },
  { day: 8, isCurrent: true, timestamp: uniqueId()  },
  { day: 9, isCurrent: true, timestamp: uniqueId()  },
];

/**
 * @description Change state of the data of the day.
 * @param {Object} state
 * @param {Object} action
 * @return {Object} state
 */
const day = (state, action) => ({
  day       : action.day,
  isCurrent : action.isCurrent,
  timestamp : action.timestamp,
});

/**
 * @description Make state of calendar.
 * @param {array} state
 * @param {Object} action
 * @return {array}
 */
const calendar = (state = [], action) => {
  switch (action.type) {
    default:
      return dummyData;
  }
};

export default calendar;
