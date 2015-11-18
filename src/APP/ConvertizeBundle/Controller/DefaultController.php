<?php

namespace APP\ConvertizeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/start", name="start")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

		$session->start();

		$bees = array(
        	'queens' => array(
        		'1' => array(
        			'name' => 'Q1',
        			'type' => 'queen',
        			'hp' => 100,
        		)
        	),
        	'workers' => array(
        		'1' => array(
        			'name' => 'W1',
        			'type' => 'worker',
        			'hp' => 75,
        		),
        		'2' => array(
        			'name' => 'W2',
        			'type' => 'worker',
        			'hp' => 75,
        		),
        		'3' => array(
        			'name' => 'W3',
        			'type' => 'worker',
        			'hp' => 75,
        		),
        		'4' => array(
        			'name' => 'W4',
        			'type' => 'worker',
        			'hp' => 75,
        		),
        		'5' => array(
        			'name' => 'W5',
        			'type' => 'worker',
        			'hp' => 75,
        		)
        	),
        	'drones' => array(
        		'1' => array(
        			'name' => 'D1',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'2' => array(
        			'name' => 'D2',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'3' => array(
        			'name' => 'D3',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'4' => array(
        			'name' => 'D4',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'5' => array(
        			'name' => 'D5',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'6' => array(
        			'name' => 'D6',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'7' => array(
        			'name' => 'D7',
        			'type' => 'drone',
        			'hp' => 50,
        		),
        		'8' => array(
        			'name' => 'D8',
        			'type' => 'drone',
        			'hp' => 50,
        		)
        	),
        );

		$session->set('bees', $bees);

        return array();
    }

    /**
     * @Route("/hit", name="hit")
     * @Template("APPConvertizeBundle:Default:index.html.twig")
     */
    public function hitAction(Request $request)
    {
    	$session = $request->getSession();

    	$bees = $session->get('bees');

    	$hitType = array_rand(array("queens","workers","drones"), 1);

    	switch ($hitType) {
    		case 0://queen
    			$curHP = $bees["queens"]['1']['hp'];
    			$bees["queens"]['1']['hp'] = $curHP - 8; 
    			break;
    		case 1://worker
    			$b = rand(1,5);
    			$curHP = $bees["workers"][$b]['hp'];
    			$bees["workers"][$b]['hp'] = $curHP - 10; 
    			break;
    		case 2://drone
    			$b = rand(1,8);
    			$curHP = $bees["drones"][$b]['hp'];
    			$bees["drones"][$b]['hp'] = $curHP - 12; 
    			break;
    	}

    	$session->set('bees', $bees);

    	return array();
    }
}
