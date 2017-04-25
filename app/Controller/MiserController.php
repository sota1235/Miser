<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class MiserController extends Controller
{
    /**
     * @api {get} /api/:pageName/misers Get misers.
     * @apiGroup Miser
     *
     * @apiParam {String} pageName A page name.
     * @apiParam {Number} year A specific year.
     * @apiParam {Number} month A specific day.
     *
     * @apiSuccess {Number} miserId The ID of the miser.
     * @apiSuccess {Number} day A specific day.
     * @apiSuccess {Boolean} isMiser The status of the day.
     *
     * @apiSuccessExample {json} Success Response:
     *  HTTP/1.1 200 OK
     *  [
     *      {
     *          "miserId": 1,
     *          "day": 1,
     *          "isMiser": true
     *      },
     *      {
     *          "miserId": 2,
     *          "day": 5,
     *          "isMiser": false
     *      }
     *  ]
     *
     * @param string  $pageName
     * @return string
     */
    public function getMisers(string $pageName)
    {
        $year = $this->query('year', null);
        $month = $this->query('month', null);

        // TODO validation

        $year = (int) $year;
        $month = (int) $month;

        $miserService = $this->get('service.miser');

        $data = $miserService->getMisers($pageName, $year, $month);

        return $this->json($data);
    }

    /**
     * @api {post} /api/:pageName/misers Create new Miser.
     * @apiGroup Miser
     *
     * @apiParam {String} pageName A page name.
     * @apiParam {Number} year A specific year.
     * @apiParam {Number} month A specific month.
     * @apiParam {Number} day A specific day.
     * @apiParam {Boolean} isMiser The status of the day.
     *
     * @apiSuccess {Number} miserId The ID of the miser.
     *
     * @apiSuccessExample {json} Success Response:
     *  HTTP/1.1 200 OK
     *  {
     *      "miserId": 1235
     *  }
     *
     * @param string  $pageName
     * @return string
     */
    public function postMiser(string $pageName)
    {
        $year    = (int) $this->query('year');
        $month   = (int) $this->query('month');
        $day     = (int) $this->query('day');
        $isMiser = (bool) $this->query('isMiser');

        // TODO validation

        $miserService = $this->get('service.miser');

        $miserId = $miserService->addMiser($pageName, $year, $month, $day, $isMiser);

        $data = [
            'miserId' => $miserID,
        ];

        return $this->json($data);
    }

    /**
     * @api {post} /api/:pageName/misers/:miser_id Update Miser.
     * @apiGroup Miser
     *
     * @apiParam {String} pageName A page name.
     * @apiParam {Number} miserId The ID of the miser.
     * @apiParam {Boolean} isMiser The status of the day.
     *
     * @apiSuccessExample {json} Success Response:
     *  HTTP/1.1 204 OK
     *
     * @param string  $pageName
     * @param string  $miserId
     * @return string
     */
    public function updateMiser(string $pageName, string $miserId)
    {
        // TODO: validation for $miserID. It must be integer.
        // TODO: implement

        $data = [
        ];

        return $this->json($data);
    }

    /**
     * @api {delete} /api/:pageName/misers/:miser_id Delete Miser.
     * @apiGroup Miser
     *
     * @apiParam {String} pageName A page name.
     * @apiParam {Number} miserId The ID of the miser.
     *
     * @apiSuccessExample {json} Success Response:
     *  HTTP/1.1 204 OK
     *
     * @param string  $pageName
     * @param string  $miserId
     * @return string
     */
    public function deleteMiser(string $pageName, string $miserId)
    {
        // TODO: validation for $miserID. It must be integer.
        // TODO: implement

        $data = [
        ];

        return $this->json($data);
    }
}
