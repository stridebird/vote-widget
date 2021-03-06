<?php
/**
 * 
 * 
 */

error_reporting(E_ERROR);

$APPROOT = dirname(__FILE__);

include($APPROOT."/config.php");
ob_start();

$USER = checkUser();
#echo("<pre>".print_r($USER,1));

if ( $_POST && ! $USER['date_voted'] ){
    $party = mysql_real_escape_string($_POST['party']);
    $consty = mysql_real_escape_string($_POST['consty']);
    $user = $USER['id'];
    $sql = sprintf("insert into vote set user_id = %d, party_id=%d, consty_id=%d", $user , $party, $consty );
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    $sql = sprintf("update user set date_voted=NOW() WHERE id=%d", $USER['id'] );
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    include($APPROOT."/results.php");
} elseif ( $USER['date_voted'] ){
    $sql = sprintf("select * from vote where user_id=%d",  $USER['id'] );
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    $row = mysql_fetch_assoc($result);
    $consty = ( $_GET['consty'] ) ? $_GET['consty'] : $row['consty_id'] ;
    include($APPROOT."/results.php");
} else {
    $CONSTY = getConsty();
    $PARTY = getParty();
    include($APPROOT."/form.php");
}

$content = ob_get_contents();
ob_end_clean();
include($APPROOT."/template.php");
exit;

function getConsty($id=false){
    $where = $id? " AND id = $id" : "";
    $sql = "select * from consty order by name $where";
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    while ( $row = mysql_fetch_assoc($result)){
        $CONSTY[$row['id']] = $row['name'];
    }
    return $CONSTY;
}
function getParty(){
    $sql = "select * from party order by if ( name='other',1,0), name";
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    while ( $row = mysql_fetch_assoc($result)){
        $PARTY[$row['id']] = $row['name'];
    }
    return $PARTY;
}
function checkUser(){
    // get cookie
    $hash = $_COOKIE['vote-widget'];
    
    // check cookie in database
    $sql = sprintf("select * from user where hash = '%s' ", $hash );
    $result = mysql_query($sql);
    if ( ! $result ) die(mysql_error());
    if ( mysql_num_rows($result) == 0 ){
        // write new user and return user
        $ip = $_SERVER['REMOTE_ADDR'];
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $hash = md5($ip.$ua); # yes but is this unique?
        $sql = sprintf("insert into user set hash = '%s',ip = '%s', ua = '%s', date_created=NOW() ", $hash , $ip , $ua );
        $result = mysql_query($sql);
        if ( ! $result ) die(mysql_error());
        setcookie('vote-widget', $hash, time()+60*60*24*365); # one year
        $sql = sprintf("select * from user where hash = '%s' ", $hash );
        $result = mysql_query($sql);
        if ( ! $result ) die(mysql_error());
    }
    // if user : return user
    $user = mysql_fetch_assoc($result);
    return $user;
}


function getResults($consty = false){
    $where = $consty? " AND vote.consty_id = $consty" : "";
    $sql = "select count(vote.user_id) as tally, party.name as partyname, consty.name as constyname 
        from vote 
        LEFT JOIN  consty on consty.id = consty_id
        LEFT JOIN  party on party.id = party_id
    $where group by party_id order by tally desc";
    $sql = "
        SELECT party.name AS partyname,
        COUNT(DISTINCT(vote.id)) AS tally
        FROM party
        LEFT JOIN vote ON vote.party_id = party.id $where 
        GROUP BY party.id
        ORDER BY tally DESC
    ";
    $result = mysql_query($sql);
#    echo $sql;
    if ( ! $result ) die(mysql_error());
    $totalvotes = 0;
    while ( $row = mysql_fetch_assoc($result)){
        $totalvotes += $row['tally'];
        $results['votes'][$row['partyname']] = $row['tally'];
    }
    $results['totalvotes'] = $totalvotes;
    return $results;
}