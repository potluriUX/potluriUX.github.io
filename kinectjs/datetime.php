<?php
error_reporting(E_ALL ^ E_NOTICE);
include("holidays.php");
ini_set("errors", -1);
$calc = new CalculateHours();

call_user_func_array(array($calc,$_REQUEST['f']), array());


class CalculateHours{
private $workingdays;
private $holidays_in_month=array();
function calculateWorkingHoursinMonth(){
    $this->holidays_in_month($_POST['date_year'],$_POST['date_month']);
$this->calculateWorkingDaysInMonth($_POST['date_year'],$_POST['date_month']);
$return[]= $this->workingdays *8;
$return[]= $this->holidays_date[$_POST['date_month']];
echo json_encode($return);
}
  function calculateWorkingDaysInMonth($year = '', $month = '')
{
  //in case no values are passed to the function, use the current month and year
    if ($year == '')
    {
        $year = date('Y');
    }
    if ($month == '')
    {
        $month = date('m');
    }   
    //create a start and an end datetime value based on the input year
    $startdate = strtotime($year . '-' . $month . '-01');
    $enddate = strtotime('+' . (date('t',$startdate) - 1). ' days',$startdate);
    $currentdate = $startdate;
    //get the total number of days in the month   
    $return = intval((date('t',$startdate)),10);
    //loop through the dates, from the start date to the end date
    while ($currentdate <= $enddate)
    {
        //if you encounter a Saturday or Sunday, remove from the total days count
        if ((date('D',$currentdate) == 'Sat') || (date('D',$currentdate) == 'Sun'))
        {
            $return = $return - 1;
        }
        $currentdate = strtotime('+1 day', $currentdate);
    } //end date walk loop
    //return the number of working days
 
    $this->workingdays = $return-$this->holidays_in_month[$month];
    
}
public function holidays_in_month($year = '', $month = ''){
    $holidays = new US_Federal_Holidays($year);
//echo "<table border=\"1\">";
  //  print_r($holidays->get_list());
foreach ($holidays->get_list() as $holiday)
{
    
   $this->holidays_in_month[(int)date("m", $holiday["timestamp"])]++ ;
    $this->holidays_date[(int)date("m", $holiday["timestamp"])][]=date("F j, Y", $holiday["timestamp"]);
}
//$holidays_array[] = '2014/08/06';
//print_r($this->holidays_in_month);
}
}


