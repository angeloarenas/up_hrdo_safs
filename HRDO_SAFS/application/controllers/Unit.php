<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CI_controller
{
	public function __construct()
	{
		parent::__construct()
		$this->load->library('unit_test');
	}

	public function testCalculator()
	{
		// $this->unit->run($test, $expected, $test_name);
		$this->unit->run('Hello World', 'is_string');

		// findOutbx($LocAb, $WorWOP, YYYY-MM-DD, YYYY-MM-DD, YYYY-MM-DD, YYYY-MM-DD);
		$testA = findOutbx('Local', 'SLWOP', 2016-01-01, 2016-07-01, 2016-07-02, 2016-07-02);
		$testB = findOutbx('Local', 'SLWP', 2016-01-01, 2016-07-01, 2016-07-02, 2016-07-02);
		$testC = findOutbx('Abroad', 'SLWOP', 2016-01-01, 2016-07-01, 2016-07-02, 2016-07-02);
		$testD = findOutbx('Abroad', 'SLWP', 2016-01-01, 2016-07-01, 2016-07-02, 2016-07-02);

		// Correct Parameters
		$this->unit->run($testA, 'Local', 'Local/Abroad Test A');
		$this->unit->run($testB, 'Local', 'Local/Abroad Test B');
		$this->unit->run($testC, 'Abroad', 'Local/Abroad Test C');
		$this->unit->run($testD, 'Abroad', 'Local/Abroad Test D');

		// Correct Duration of Leave
		$this->unit->run($testA, 183, 'Leave Duration A');
		$this->unit->run($testB, 183, 'Leave Duration B');
		$this->unit->run($testC, 183, 'Leave Duration C');
		$this->unit->run($testD, 183, 'Leave Duration D');

		// Correct Duration of Service
		$this->unit->run($testA, 93, 'Return Service Duration A');
		$this->unit->run($testB, 185, 'Return Service Duration B');
		$this->unit->run($testC, 185, 'Return Service Duration C');
		$this->unit->run($testD, 366, 'Return Service Duration D');

		// Correct End Date of Service
		$this->unit->run($testA, 2016-10-02, 'Return Service End Date A');
		$this->unit->run($testB, 2017-01-02, 'Return Service End Date B');
		$this->unit->run($testC, 2017-01-02, 'Return Service End Date C');
		$this->unit->run($testD, 2017-07-02, 'Return Service End Date D');

		// Correct Duration of Balance
		$this->unit->run($testA, 93, 'Return Service Balance A');
		$this->unit->run($testB, 185, 'Return Service Balance B');
		$this->unit->run($testC, 185, 'Return Service Balance C');
		$this->unit->run($testD, 366, 'Return Service Balance D');

		echo $this->unit->report();
	}
}?>
