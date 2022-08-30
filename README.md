# FiveM-UCP_Panel

# I created that Panel to learn PHP, the Code is really messy to be honest. And there are a lot of things which can be done better. Feel free to use it as a template or snippet or whatever.
Hey and welcome stranger. :)
To be able to include the panel it requires a few things that need to be adjusted.
I'll try to explain these steps here.

Before you start with the integration you have to do the following in your database. I recommend to make a backup of your database in case of problems.
The SQL for this is located in the folder cp_user.sql.

You can then create an admin account.
The rank is Superadministrator

First of all you have to change the database variable in config.php.

$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); 

This variable is present in other files a few times.
It is best to check all files once and replace the string.
If this is done, you should see that the panel is connected when you reload the page.

Once this is done you can start customizing the panel with your data.
Go to the main.php for this
You can add here from line 56 your parameters from your database. It is only important that you name the column correctly.
Then you can add the previously added column from line 76. Reload your page and check if it is displayed correctly.

If you have any questions or problems, you can contact me. Discord: Niclas#1352

Translated with www.DeepL.com/Translator (free version)
