<!DOCTYPE html>
<html>
    <head>
        <title>Camagru Verified</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style type="text/css">
            /* Fonts from Googs*/
            @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
              font-family: 'Lato';
              font-style: normal;
              font-weight: 700;
              src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            body {
                background-color: #f4f4f4ee; 
                margin: 0; 
                padding: 0;
            }

            p {
                margin: auto;
            }

            h1 {
                font-size: 48px;
                font-weight: 400;
                margin: 0;
                text-align: center;
            }

            td.welcome {
                padding: 40px 20px 20px 20px;
                border-radius: 4px 4px 0px 0px;
                letter-spacing: 4px;
                color: #111111;
                font-family: 'Lato', Helvetica, Arial, sans-serif;
                font-size: 18px;
                font-weight: 400;
                line-height: 48px;
                background-color: #ffffff;
            }

            td.formtext {
                padding: 20px 30px 40px 30px;
                color: #666666;
                font-family: 'Lato', Helvetica, Arial, sans-serif;
                font-size: 18px;
                font-weight: 400;
                line-height: 25px;
                background-color: #ffffff;
            }

            a.verify {
                font-size: 20px;
                font-family: Helvetica, Arial, sans-serif; 
                color: #ffffff; 
                text-decoration: none; 
                padding: 15px 25px; 
                border-radius: 2px; 
                border: 1px solid #659cf0; 
                display: inline-block;
                -webkit-transition-duration: 0.5s; /* Safari */
                transition-duration: 0.5s;
            }

            button {
                font-size: 20px;
                font-family: Helvetica, Arial, sans-serif; 
                text-decoration: none; 
                color: #ffffff;
                background-color: #659cf0;
                border: 2px solid #659cf0;
                border-radius: 2px;

                padding: 15px 25px;
                display: inline-block;
                -webkit-transition-duration: 0.5s; /* Safari */
                transition-duration: 0.5s;
            }

            button:hover {
                color: #ffffff;
                background-color: #78a7ee;
            }

            td.footer {
                padding: 0px 20px 30px 30px; 
                color: #666666; 
                font-family: 'Lato', Helvetica, Arial, sans-serif; 
                font-size: 14px; 
                font-weight: 400; 
                line-height: 18px;
                background-color: #f4f4f4;
                text-align: left;
            }
        </style>
    </head>

    <table cellspacing="0" width="100%">
        <!-- Header Logo Row -->
        <tr>
            <td bgcolor="#dd2456" align="center">
                <table width="100%" style="max-width: 600px;" >
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                            <a href="http://127.0.0.1:8100/index.php">
                            <img alt="wtc_" src="http://findryan.online/img/wtc_.png" width="50" height="50">
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Congregation Banner Row -->
        <tr>
            <td bgcolor="#dd2456" align="center" style="padding: 0px 10px 0px 10px;">
                <table cellspacing="0" width="100%" style="max-width: 600px;" >
                    <tr>
                        <td class="welcome">
                            <h1>Congratulations!</h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Form Text Block -->
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table  cellspacing="0" width="100%" style="max-width: 600px;" >
        <!-- Weird Welcome Text Row -->
                    <tr>
                        <td class="formtext" bgcolor="#ffffff" align="left" >
                            <p>The collective is happy you have joined our cause. 
                            You may proceed to login and browse through the catalogue of other entities.
                            <br>Click the 'Login' button to proceed.</p>
                        </td>
                    </tr>
        <!-- Login to Account -->
                    <tr>
                        <td bgcolor="#ffffff">
                            <table width="100%"  cellspacing="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table  cellspacing="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#4a8cf2">
                                                    <form id="verf" action="../includes/verify.inc.php" method="POST">
                                                        <input type="hidden" name="tid" value="<?php echo $_GET['token']; ?>">
                                                        <button type="submit" name="usr-verf">Login</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
        <!-- Introvert Your Eyes Row -->
                    <tr>
                        <td class="formtext" style="padding: 0px 30px 10px 30px;" >
                            <p>Why are you still reading, go make hay while the sun still shines or the moon...
                            Whatever your preference.</p>
                        </td>
                    </tr>
        <!-- Self Deprecation Row -->
                    <tr>
                        <td class="formtext" style="padding: 0px 30px 20px 30px;">
                            <p>You can tell cant you... I havent slept in 40 hours... Deprivation has become my friend.</p>
                        </td>
                    </tr>
        <!-- Hail Spock Row -->
                    <tr>
                        <td class="formtext" style="border-radius: 0px 0px 4px 4px;">
                            <p>Live long and prosper,<br>Gunter Burrows of the Shire</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Tasty Feet -->
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table  cellspacing="0" width="100%" style="max-width: 600px;">
        <!-- Address -->
                    <tr>
                        <td class="footer">
                            <p>P3 Terrace Level, Portswood Square, V & A Waterfront, Cape Town - 8001</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</html>