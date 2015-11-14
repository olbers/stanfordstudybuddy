# Application Platform #

The application would be implemented for Android phones. It would be tested on Android phones only. We also have a web version with some limited functionaries. We do have a plan to port the app to iPhone in future.

# High Level Overview #

All modules are written in PHP. The back-end database is in MySql.

We started with a client server architecture where we planned to write a native android app that would make a HTTP request to a server side back-end module to get data in JSON/XML and do a native rendering.

However after the alpha phase, we dropped the idea of native UI rendering and we used android native webkit which could allow us to still use all native functionalities we wanted to use (like detecting the unique device id of the phone so that we could avoid making user log-in and GPS) and yet render a html.


  1. **/depot/client/android** - our native code
  1. **/newcode** - root of our server side code (which is in use)
  1. **/depot/client/web-prototype** - root of our alpha prototype (we are not using it)
  1. **/website** - root of our website