$(document).ready(function() {

  $(".selectableBox").click(function() {
    $(this).toggleClass('selectableBoxHighlighted');
  });
  
  $(".ratingBox").click(function() {
    var id = parseFloat($(this).attr('id'));
    for(var x = 1; x <= id; x++) {
      $("#" + x).addClass('ratingBoxSelected');
    }
    var next = id + 1;
    for(var y = next; y <= 5; y++) {
      $("#" + y).removeClass('ratingBoxSelected');
    }
    $("#checkin-rating").val(id);
    if(checkedIn == true) { // User is checked in, submit the form to update study session
      window.location = 'update-session.php?newrating=' + id;
    }
  });
  
  $(".selectPlace").click(function() {
    var placeID = parseFloat($(this).attr('rel'));
    $("#checkin-place").val(placeID);
    
    $("#placeList td").each(function(index) {
      if($(this).attr('rel') != placeID) $(this).removeClass('selectableBoxHighlighted');
    });
    
  });
  
  $(".selectCourse").click(function() { 
    var courseName = parseFloat($(this).attr('rel'));
    $("#checkin-course").val(courseName);
    $("#classList td").each(function(index) {
      if($(this).attr('rel') != courseName) $(this).removeClass('selectableBoxHighlighted');
    });
    if(checkedIn == true) { // User is checked in, submit the form to update study session
      window.location = 'update-session.php?newcourse=' + courseName;
    }
  });
  
});

function showMorePeople() {
  $(".hiddenPerson").fadeIn();
  $("#showMorePeopleButton").hide();
}

function showSearchForm(show, hide) {
  $("#" + show).show();
  $("#" + hide).hide();
  $("#searchSelector span").toggleClass('searchSelected');
}

function showStudyData(show) {
  $(".curvyShell").each(function(index) {
    var name = $(this).attr('id');
    if(name == show + "-data") {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
  $("#studyDataSelector span").each(function(index) {
    var name = $(this).attr('id');
    if(name == show + "-button") {
      $(this).addClass('studyDataSelected');
    } else {
      $(this).removeClass('studyDataSelected');
    }
  });
}