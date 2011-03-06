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