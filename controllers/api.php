<?php
namespace Controllers;

use Models\tickets;

class api {
    public function indexAction() {}

    public function getallAction () {
        $return = [
            'status' => '',
            'data' => [],
        ];

        $data = (new tickets())->find();

        if(!$data) {
            $return['status'] = 'error';
        } else {
            $return['status'] = 'ok';
            foreach($data as $value) {
                $return['data'][] = $value;
            }
        }

        echo json_encode($data);

    }


    public function getbykeyAction($key = '') {
        $return = [
            'status' => 'ok',
            'data' => [],
        ];
        $params = explode('_', $key);
        if(count($params) != 5) {
            $return['status'] = 'error';
        } else {
            $tickets = (new \Models\tickets())->findWhere("search_id='" . $key . "'");

            if(count($tickets) <= 3) {
                $return['data'] = $tickets;
            } else {
                usort($tickets, function($a, $b) {
                    $timeA = (new \DateTime())->setTime(explode(':', $a->time_departure)[0], explode(':', $a->time_departure)[1]);
                    $timeB = (new \DateTime())->setTime(explode(':', $b->time_departure)[0], explode(':', $b->time_departure)[1]);

                    if($timeA == $timeB) return 0;
                    return ($timeA < $timeB) ? -1 : 1;

                });

                $return['data'] = [
                    $tickets[0],
                    $tickets[floor((count($tickets)-1)/2)],
                    $tickets[count($tickets)-1]
                ];
            }
        }


        echo json_encode($return);

    }

}