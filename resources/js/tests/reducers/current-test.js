// @flow weak
/**
 * @fileoverview Unit test for reducers/current
 */
import assert from 'assert';
import currentCalendar from 'reducers/current';
import { GO_TO_PREV_MONTH, GO_TO_NEXT_MONTH } from 'actions/action-types';

describe('Unit test for reducers/current', () => {
  it('Shold return prev month with GO_TO_PREV_MONTH action', () => {
    const expected = {
      year  : 2016,
      month : 12,
    };

    assert.deepEqual(
      expected,
      currentCalendar({
        year  : 2017,
        month : 1,
      }, {
        type: GO_TO_PREV_MONTH,
      })
    );
  });

  it('Shold return next month with GO_TO_NEXT_MONTH action', () => {
    const expected = {
      year  : 2017,
      month : 1,
    };

    assert.deepEqual(
      expected,
      currentCalendar({
        year  : 2016,
        month : 12,
      }, {
        type: GO_TO_NEXT_MONTH,
      })
    );
  });
});
