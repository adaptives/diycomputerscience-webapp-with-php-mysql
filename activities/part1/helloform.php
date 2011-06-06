<h2>This example has been created for <a href="http://diycomputerscience.com/studysessions/studysession/4/sessionpart/15">part 1 activity 3</a>, of the <a href="http://diycomputerscience.com/studysessions/studysession/4">Web Application Development with PHP and MySql course</a>.

<p>
In this example we will display a simple form to the user in which they are suppossed to enter their name. The form is submitted to a PHP script, which reads the input recieved from the form and displays 'Hello ' followed by the user's name.
</p>

<form method="POST" action="hellosubmit.php">
  <input type="text" name="username" />
  <input type="submit" name="submit" value="submit" />
</form>
