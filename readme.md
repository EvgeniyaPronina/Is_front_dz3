Letters to the Future

This work - a service for sending messages in the future.
It can be used on the site to allow users to create letters that will be sent to the specified destination at the appointed time, they (in the future).
Stylized CSS otherwise you'll get tons of entertaining service to send Christmas letters at exactly 00:00!

How-to install

$ git clone https://github.com/EvgeniyaPronina/Is_front_dz3.git

Install composer.
$ composer.phar install

Create a new database on your hosting.
Change the settings to connect to a database in the file Model.php (public function __construct()).

Make task for CroneTab on your hosting.
0 * * * * /path/to/.../mail.php