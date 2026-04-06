<form action="PHPSlideExTimeButton.php" method="GET" id="timeForm"> 
  <button type="submit" form="timeForm" name="btn" value="Submit">Submit</button>
</form>

<?php
echo "<form action='PHPSlideExTimeButton.php' method='post'>
        <button type='submit'>Get Time</button>
      </form>";

echo "<p>Current time: " . date("h:i:s A") . "</p>";
?>

<?php
if (isset($_GET["btn"])) {
  echo "<p>The time is now " . date('H:i:s')."</p>";
}
?>

<pre>
<?php var_dump($_GET);?>
</pre>