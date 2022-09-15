# OUTDATED
# I am currently working on a new One. I will no longer Update the Panel


# FiveM-UCP_Panel

# I created that Panel to learn PHP, the Code is really messy to be honest. And there are a lot of things which can be done better. Feel free to use it as a template or snippet or whatever. Please have mercy. My frontend creativity is on the level of a monkey
Hey and welcome stranger. :)
To be able to include the panel it requires a few things that need to be adjusted.
I'll try to explain these steps here.

Before you start with the integration you have to do the following in your database. I recommend to make a backup of your database in case of problems.
The SQL for this is located in the folder `cp_user.sql`.

You can then create an admin account.
The rank is `Superadministrator`

First of all you have to change the database variable in config.php.

`$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); `

This variable is present in other files a few times.
It is best to check all files once and replace the string.
If this is done, you should see that the panel is connected when you reload the page.

Once this is done you can start customizing the panel with your data.
Go to the main.php for this
You can add here from line 56 your parameters from your database. It is only important that you name the column correctly.

Here a Example:

`$whitelist = $row['whitelist'];` the Name in the Table is whitelist so you also need to set it as whitelist.

Then you can add the previously added column from line 76. Reload your page and check if it is displayed correctly.

`<h4 class="media-heading"><strong>Whitelist</strong>: '.$whitelist.'</h4>`

I also integrated some Simple Logs. You can find the Logfilename in the config.

To create new Logs you can for example use the following Code:

`    $log = "User ".$_SESSION['username']." deleted user ".$username."\n";
    $logfile = fopen('log.txt', 'a');
    fwrite($logfile, $log);
    fclose($logfile);`

I will continue to work on the panel.
There should be possibilities like editing users. So that you can make adjustments such as setting whitelists.
Also I want to rebuild the security a bit so that users don't get to pages that require a login or a certain rank.
Also passwords are currently in plain text in the database. This was mainly for testing purposes. I recommend that this be changed. And of course the frontend should be improved :D


If you have any questions or problems, you can contact me. Discord: Niclas#1352
