<!--Jay Dong, Q2 Project, new account page, 11/21/19-->
<!--Inspiration drawn from: https://dribbble.com/shots/5882378-Create-Account-UI-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Account</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
    <style media="screen">
      html,body{height: 100%}
      body{background-color: #1E262D;}
      .container{height: 70%; width: 35%; margin: auto; background-color: #27333D; position: relative; top: 50%; transform: translateY(-50%); box-shadow: 5px 10px 5px 0px;}
      .topHalf{z-index: 1; height: 12%; width: 100%; position: relative; top: 0; font-family: 'Roboto Condensed';}
      .newAcct{height: 100%; width: 50%; float: left; background-color: #27333D; text-align: center; color: white; border-bottom: 3px solid gold;}
      .newAcct:hover{cursor: pointer; background-color: #3F4E5B;}
      .signIn{height: 100%; width: 50%; float: right; background-color: #27333D; text-align: center; color: white; border-bottom: 3px solid #242C33;}
      .signIn:hover{cursor: pointer; background-color: #3F4E5B;}
      input[type="text"]{background-color: #27333D; color: white; border-style: none; border-bottom: 2px solid white; width: 85%; font-size: 1.25em;}
      input[type="text"]:focus{outline: none;}
      input[type="submit"]{width: 85%; padding: 3%; font-weight: bold; font-size: 1.1em; color: #27333D; background-color: #ff4e00; background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%); border-style: none;}
      input[type="submit"]:hover{cursor: pointer}
      ::placeholder{color: white; font-family: 'Roboto Condensed'}
      .returningBottomHalf{visibility: hidden; width: 100%; height: 85.5%; background-color: #27333D; position: absolute; top: 14.5%;}
      .newBottomHalf{visibility: visible; height: 100%;}
      /*.userInputs relies on .bottomHalf to have a height in percentage*/
      .userInputs{height: 80%; width: 80%; margin: auto; position: relative; top: 25%; transform: translateY(-25%);}
      .username{position: relative; top: 10%; right: 50%; transform: translateX(60%);}
      .password{position: relative; top: 20%; right: 50%; transform: translateX(60%);}
      .email{position: relative; top: 30%; right: 50%; transform: translateX(60%);}
      .submit{position: relative; top: 50%; right: 50%; transform: translateX(60%);}
      form{height: 100%;}
    </style>
  </head>
  <body>
    <form class="" action="createAccount.php" method="post">
      <div class="container">
        <div class="topHalf">
          <div class="newAcct" id="newAcct" onclick="newAcct()">
            <p>New Account</p>
          </div>
          <div class="signIn" id="signIn" onclick="signIn()">
            <p>Sign In</p>
          </div>
        </div>
        <div class="newBottomHalf">
          <div class="userInputs">
            <!--By default, the new account inputs are required, but that switches if you click on login: see createAccount()-->
            <div class="username">
              <input type="text" name="newUsername" value="" placeholder="Username" id="newUsername" required>
            </div>
            <div class="password">
              <input type="text" name="newPassword" value="" placeholder="Password" id="newPassword" required>
            </div>
            <div class="submit">
              <input type="submit" name="newAccount" value="Create Account!" onclick="createAccount()">
            </div>
          </div>
        </div>
        <div class="returningBottomHalf">
          <div class="userInputs">
            <div class="username">
              <input type="text" name="oldUsername" value="" placeholder="Username" id="oldUsername">
            </div>
            <div class="password">
              <input type="text" name="oldPassword" value="" placeholder="Password" id="oldPassword">
            </div>
            <div class="submit">
              <input type="submit" name="oldAccount" value="Log In" onclick="login()">
            </div>
          </div>
        </div>
      </div>
    </form>

    <script type="text/javascript">
      function signIn(){
        document.getElementById("signIn").style.borderBottom = "3px solid gold";
        document.getElementById("newAcct").style.borderBottom = "3px solid #242C33";
        document.getElementsByClassName("newBottomHalf")[0].style.visibility = "hidden";
        document.getElementsByClassName("returningBottomHalf")[0].style.visibility = "visible";
        document.getElementById("oldUsername").required = true;
        document.getElementById("oldPassword").required = true;
        document.getElementById("newUsername").required = false;
        document.getElementById("newPassword").required = false;
      }
      function newAcct(){
        document.getElementById("signIn").style.borderBottom = "3px solid #242C33";
        document.getElementById("newAcct").style.borderBottom = "3px solid gold";
        document.getElementsByClassName("newBottomHalf")[0].style.visibility = "visible";
        document.getElementsByClassName("returningBottomHalf")[0].style.visibility = "hidden";
        document.getElementById("oldUsername").required = false;
        document.getElementById("oldPassword").required = false;
        document.getElementById("newUsername").required = true;
        document.getElementById("newPassword").required = true;
      }
    </script>
  </body>
</html>
