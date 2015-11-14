# Introduction #

For CS 247 Winter 2011, we're building a mobile web app that will help students log their daily study sessions by checking into study spots on campus, locate other people who are working on the same classes in real time, and get access to campus wide study data...
  * A student can check-in and check-out to a study location to log his study sessions.
  * A student can locate all other people who are studying the class of his interest, in real time
  * A student can find the study locations in real time (based on number of classmates studying at that location, distance of the study location and quietness of the study location) and choose the one he likes the most.
  * Since students log their study sessions over the course of the quarter (by checking-in and checking-out) we aggregate all the data and create a campus wide statistics of number of study hours per week for each class.
  * A student can see his weekly study log (number of hours he is studying for each class) and compare it with campus wide study data for that class.
  * A student can select set of classes and see if they balance out properly.

# Feature List #

  * Account registration
  * Account login
  * Location search engine/recommendation engine
    * Able to search by how quiet/busy a place is, what part of campus, etc.
    * Rank results by search parameters
    * Location profile showing all information for a particular location

  * Ability to check in and check out of a study location
    * If not searching first, have a list of places to check in to
    * Allow users to add new locations that are not already in the database
    * Alert user about nearby study buddies
    * Allow user to set a status/availability.

  * Aggregate campus data
    * Week by week courseload # of hours per class
    * Choose your classes and we generate a graph of the # of hours a class should take
    * Integrate with coursework
    * At end of week, ask how many hours you spent per class (after showing actual # of hours logged, so we can get a more accurate dataset)

  * Motivations for checking in
    * Extra credit incentives
    * Coupons for foody places
    * Badges -> A new badge for every X check ins

## Check In ##
  * Ask user how busy the place is and what they will be working on (their initial status messahge)
  * Show the user who else is checked into the location

## Check Out ##
  * User will need to check out to end their study session and formally log it. No questions on exit.