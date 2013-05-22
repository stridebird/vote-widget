<?php
/**
 * 
 * 
 */

$APPROOT = dirname(__FILE__);

include($APPROOT."/config.php");
ob_start();

$USER = checkUser();

if ( $_POST && $USER ){
    $party = 1;
    $consty = 1;
    $user = 1;
    $sql = sprintf("insert into votes set user_id = %d, party_id=%d, consty_id=%d", $user , $party, $consty );
    include($APPROOT."/results.php");
} elseif ($USER){
    include($APPROOT."/results.php");
} else {
    include($APPROOT."/form.php");
}

$content = ob_get_contents();
ob_end_clean();
include($APPROOT."/template.php");
exit;

function checkUser(){
    return array();
    // get cookie
    
    // check cookie in database
    $sql = "select * from users where hash = '' ";
    
    // if user : return user
    $user = mysql_fetch_assoc($result);
    
    // else write new user and return user
    $sql = "select * from users where hash = '' ";
    
}


function getResults($consty = false){
    $where = $consty? "where consty_id = $consty" : "";
    $sql = "select count(votes.user_id) as tally, party.name as partyname, consty.name as constyname 
        from votes 
        LEFT JOIN  consty on consty.id = consty_id
        LEFT JOIN  party on party.id = party_id
    $where group by party_id order by tally desc";
    while ( $row = mysql_fetch_assoc($result)){
        $totalvotes += $row['tally'];
        $results['votes'][$row['partyname']] = $row['tally'];
    }
    $results['totalvotes'] = $totalvotes;
    return $results;
}