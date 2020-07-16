<?php

//Adding Header With Dynamic Title//
function getHeader(string $pageName, string $headerPath)
{
    ob_start(); 
    include($headerPath);
    //include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $title = $pageName;
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . ' - JamesThrew$3', $buffer);

    echo $buffer;
}

//Calling Footer//
function getFooter(string $link){
    include($link);
}

//Redirecting//
function redirectWindow(string $url)
{
    echo "<script>window.location.href='$url';</script>";
}

//Showing Alert//
function showAlert(string $msg)
{
    echo "<script>alert('$msg');</script>";
}

//Insert Data//
function insertData(string $table,array $fields,array $values,$conn){
    //Managing Fields//
    $quote = '';
    $c = 0;
    foreach ($fields as $item) {
        $quote.="`$item`";
        $c++;
        if($c < count($fields))
        {
            $quote.=',';
        }
    }
    //Managing Values//
    $valQuote = '';
    $valc = 0;
    foreach ($values as $item) {
        $valQuote.="'$item'";
        $valc++;
        if($valc < count($fields))
        {
            $valQuote.=',';
        }
    }
    //Making Query//
    $query = "insert into `$table` (".$quote.") values (".$valQuote.")";
    mysqli_query($conn, $query);
}

//Fetching Data//
function fetchData(string $table, $conn){
    $query = "select * from `".$table."`";
    return mysqli_query($conn, $query);
}

//Getting Info//
function getInfo(string $table, string $PrimaryKey, $id, $conn){
    $query = "select * from `$table` where $PrimaryKey = $id";
    return mysqli_query($conn, $query);
}

//Deleting Data//
function deleteData(string $table, string $PrimaryKey, $id, $conn){
    $query = "DELETE FROM `$table` WHERE $PrimaryKey = $id";
    mysqli_query($conn, $query);
}

//Editing Data//
function editData(string $table, array $data, string $PrimaryKey, $id, $conn){
    //Managing Data
    $ini = '';
    $c = 0;
    $mm = count($data);
    foreach($data as $item){
        $c++;
        if($mm % 2 == 0){
            $ini .= "`$item`=";
        }
        if($mm % 2 != 0){
            $ini .= "'$item'";
        }
        if($mm % 2 != 0 && $c < count($data))
        {
            $ini.=',';
        }
        if($c == count($data)){
            $ini .= '';
        }
        $mm--;
    }
    $query = "UPDATE `$table` SET $ini WHERE $PrimaryKey = $id";
    mysqli_query($conn, $query);
}

//Clean Text//
function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

//Generate Radnom String
function random_strings ($length_of_string) 
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	return substr(str_shuffle($str_result),0, $length_of_string); 
} 

//Check if same value already exists//
function check_existance($table, $column_name, $value, $conn){
    $res = mysqli_query($conn, "select count($column_name) from $table where $column_name = $value");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    if($res == 0){
        return true;
    }
    else{
        return false;
    }
}

//Get next days//
function getNextDays($number_of_days){
    $days   = [];
    $period = new DatePeriod(
    new DateTime(), // Start date of the period
    new DateInterval('P1D'), // Define the intervals as Periods of 1 Day
    $number_of_days // Apply the interval 6 times on top of the starting date
    );

    foreach ($period as $day)
    {
        $days[] = $day->format('Y-m-d H:i:s');
    }
    return $days;
}

//Calculate months between two dates//
function calcMonths($start_date, $end_date){
    $ts1 = strtotime($start_date);
    $ts2 = strtotime($end_date);

    $year1 = date('Y', $ts1);
    $year2 = date('Y', $ts2);

    $month1 = date('m', $ts1);
    $month2 = date('m', $ts2);

    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
    return $diff;
}
?>