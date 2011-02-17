<?php

// iEat Functions

function getFriends($userID) {
  $sql = "SELECT * FROM `" . DATABASE . "`.`users` ORDER BY `last_name` ASC, `name` ASC";
  $result = @mysql_query($sql);
  $friends = array();
  while($data = mysql_fetch_array($result)) {
    if($data['id'] != $userID) $friends[] = array('name' => $data['name'] . ' ' . $data['last_name'], 'id' => $data['id']);
  }
  return $friends;
}

function getInvitees($eventID, $stripUserID = 0) {
  $sql = "SELECT u.*, a.status FROM " . DATABASE . ".calendar_attendees AS a, " . DATABASE . ".users AS u WHERE a.event_id = '{$eventID}' AND u.id = a.person_id";
  $result = @mysql_query($sql);
  
  $people = array();
  while($data = mysql_fetch_array($result)) {
    if($data['id'] != $stripUserID) $people[] = array('id' => $data['id'], 'name' => $data['name'], 'status' => $data['status']);
  }
  
  return $people;

}

function sortInvitees($invitees) {
  $sortedInvitees = array('attending' => array(), 'notComing' => array(), 'noResponse' => array());
  
  foreach($invitees as $userdata) {
    if($userdata['status'] == -1) {
      $sortedInvitees['notComing'][$userdata['id']] = $userdata['name'];
    } elseif($userdata['status'] == 1) {
      $sortedInvitees['attending'][$userdata['id']] = $userdata['name'];
    } elseif($userdata['status'] == 0) {
      $sortedInvitees['noResponse'][$userdata['id']] = $userdata['name'];
    }
  }
  
  return $sortedInvitees;
}


?>