<!DOCTYPE html>
<html>
    <head>
        <title>Camagru Reset</title>
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

            input {
                padding: 15px 25px; 
                border-radius: 2px;
                width: 50%;
                border: 1px solid #659cf0; 
                display: inline-block;
                margin-bottom: 10px;
            }

            button {
                font-size: 20px;
                font-family: Helvetica, Arial, sans-serif; 
                text-decoration: none; 
                color: #ffffff;
                background-color: #659cf0;
                border: 2px solid #659cf0;
                border-radius: 2px;
                margin-top: 10px;
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

            .signuperror {
	            font-size: 13px;
	            color: #dd2456;
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
                            <h1>Reset Ya' Password!</h1>
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
                            <p>I'm not going to chastise you anymore about how you should train your 
                                brain a bit more so you don't go around forgetting passwords.
                                <br> So just go ahead and set a new one:
                            </p>
                        </td>
                    </tr>
        <!-- Introvert Your Eyes Row -->
                    <tr>
                        <td align="center" class="formtext" style="padding: 0px 30px 20px 30px;">
                            <form id="pwd-form" action="../includes/reset.inc.php" method="POST">    
                                <input type="hidden" name="tid" value="<?php echo $_GET['tid']; ?>">
                                <input type="password" name="pwd" placeholder="New Password...">
                                <input type="password" name="pwd-repeat" placeholder="Repeat password..."><br>
                                <p class="signuperror">Min 8 characters.<br>Max 64 characters.<br>
						        At least 1 uppercase letter.<br>At least 1 lowercase letter.
						        <br>At least 1 number.<br>At least 1 special character.</p>
                                <button type="submit" name="new-pwd">Reset Password</button>
                            </form>
                        </td>
                    </tr>
        <!-- Introvert Your Eyes Row -->
                    <tr>
                        <td class="formtext" style="padding: 0px 30px 10px 30px;" >
                            <p>Maybe I judged you too harshly... Maybe you just need to unravel your mind
                                a little. If that is the case...
                            </p>
                        </td>
                    </tr>
        <!-- Self Deprecation Row -->
                    <tr>
                        <td class="formtext" style="padding: 0px 30px 20px 30px;">
                            <p>I recommend Defiance Bay from Pillars of Eternity.</p>
                        </td>
                    </tr>
        <!-- Hail Spock Row -->
                    <tr>
                        <td class="formtext" style="border-radius: 0px 0px 4px 4px;">
                            <p>Use headphones ya dengis bye,<br>Yah boi x</p>
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