<!--Quiz page-->
<!--Inspiration drawn from: https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwiEgMHVwYTmAhUN2qwKHT40AqoQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.freelancer.com%2Fcontest%2FUIUX-Website-Graphic-Design-for-Quiz-Game-Please-Create-Mockup-1311283-byentry-20656526&psig=AOvVaw0SiszGoYA0V0YSk2IF1VU9&ust=1574742014203673-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php
  //MySQLi procedural
  include 'config.php';
  ?>
  <head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
    <style media="screen">
      body{height: 100%; margin: 0; font-family: 'Roboto Condensed'; color: white; background: linear-gradient(90deg, #1E262D 0%, rgba(9,9,121,1) 72%, rgba(3,4,79,1) 100%);}
      hr{border: 1px solid gold;}
      .container{height: 100vh; width: 80%; margin: auto;}
      .bottomHalf{height: 70%;}
      table{width: 100%; height: 100%;}
      input[type="button"]:hover{cursor: pointer;}
      .answerChoice:focus{outline: none;}
      #nextQuestion{width: 30%; margin: auto; display: block; border-radius: 50px; border-style: none; background-color: #27333D; padding: 20px; font-size: 1.5em; color: white;}
      #nextQuestion:focus{outline: none;}
      label{cursor: pointer; font-size: 1.5em;}
      .options{background-color: #2A2A72;}
      .options:hover{cursor: pointer; background-color: #12127B;}
      .submitBtn{text-align: center;}
      input[type="submit"]{width: 30%; font-size: 1.5em; padding: 20px; background-color: #27333D; color: white; border-style: none;}
      input[type="submit"]:hover{cursor: pointer;}
    </style>
  </head>
  <?php
  //Probably do a random selection of data base for h2, h1
  //Use cookie/session

  //List of all ids (1-16)
  $ids = array();
  for($i = 1; $i<=16; $i++){
    array_push($ids, $i);
  }
  shuffle($ids);
  //Pick five question ids
  $fiveIDs = array();
  for($i = 0; $i<5; $i++){
    array_push($fiveIDs, $ids[$i]);
  }
  //Select the 'q2project' database to work with
  mysqli_select_db($conn, 'q2project');
  $sql = "SELECT * FROM quizquestions";
  $result = mysqli_query($conn, $sql);
  //Create array of questions
  $questions = array();
  //Create an array with a question and its 3 answers for randomization later
  $groupQuestions = array();
  while($row = mysqli_fetch_assoc($result)){
    if(in_array($row['id'],$fiveIDs)){
      array_push($questions,$row['question']);
      $insert = array(array($row['answer'],1),array($row['wrong1'],0),array($row['wrong2'],0),array($row['wrong3'],0));
      shuffle($insert);
      array_push($groupQuestions,$insert);
    }
  }
  //echo '<pre>'; print_r($groupQuestions); echo '</pre>';
  //Above line used to see what the arrays look like
  ?>
  <body>
    <form class="" action="results.php" method="post">
      <div class="container" id="q1">
        <div class="topHalf">
          <h2>Question 1</h2>
          <?php echo "<h1>$questions[0]</h1>";?>
          <hr></hr>
        </div>
        <div class="bottomHalf">
          <table>
            <tr>
              <td class="options" id="q1o1" onclick="selected('q1o1','q1o2','q1o3','q1o4','question1_1','question1_2','question1_3','question1_4')">
                <input type='radio' id="question1_1" name="q1" class='radio' value="<?php echo $groupQuestions[0][0][1]?>"/>
                <label><?php echo $groupQuestions[0][0][0]?></label>
              </td>
              <td class="options" id='q1o2' onclick="selected('q1o2','q1o1','q1o3','q1o4','question1_2','question1_1','question1_3','question1_4')">
                <input type="radio" id="question1_2" name="q1" class='radio' value="<?php echo $groupQuestions[0][1][1]?>">
                <label><?php echo $groupQuestions[0][1][0]?></label>
              </td>
            </tr>
            <tr>
              <td class="options" id='q1o3' onclick="selected('q1o3','q1o1','q1o2','q1o4','question1_3','question1_1','question1_2','question1_4')">
                <input type='radio' id="question1_3" name="q1" class='radio' value='<?php echo $groupQuestions[0][2][1]?>'/>
                <label><?php echo $groupQuestions[0][2][0]?></label>
              </td>
              <td class="options" id='q1o4' onclick="selected('q1o4','q1o1','q1o2','q1o3','question1_4','question1_1','question1_2','question1_3')">
                <input type="radio" id="question1_4" name="q1" class='radio' value="<?php echo $groupQuestions[0][3][1]?>">
                <label><?php echo $groupQuestions[0][3][0]?></label>
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="button" id="nextQuestion" value="Next Question" onclick="scrollDown('#q2')"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="container" id="q2">
        <div class="topHalf">
          <h2>Question 2</h2>
          <?php echo "<h1>$questions[1]</h1>";?>
          <hr></hr>
        </div>
        <div class="bottomHalf">
          <table>
            <tr>
              <td class="options" id="q2o1" onclick="selected('q2o1','q2o2','q2o3','q2o4','question2_1','question2_2','question2_3','question2_4')">
                <input type='radio' id="question2_1" name="q2" class='radio' value="<?php echo $groupQuestions[1][0][1]?>"/>
                <label><?php echo $groupQuestions[1][0][0]?></label>
              </td>
              <td class="options" id='q2o2' onclick="selected('q2o2','q2o1','q2o3','q2o4','question2_2','question2_1','question2_3','question2_4')">
                <input type="radio" id="question2_2" name="q2" class='radio' value="<?php echo $groupQuestions[1][1][1]?>">
                <label><?php echo $groupQuestions[1][1][0]?></label>
              </td>
            </tr>
            <tr>
              <td class="options" id='q2o3' onclick="selected('q2o3','q2o1','q2o2','q2o4','question2_3','question2_1','question2_2','question2_4')">
                <input type='radio' id="question2_3" name="q2" class='radio' value='<?php echo $groupQuestions[1][2][1]?>'/>
                <label><?php echo $groupQuestions[1][2][0]?></label>
              </td>
              <td class="options" id='q2o4' onclick="selected('q2o4','q2o1','q2o2','q2o3','question2_4','question2_1','question2_2','question2_3')">
                <input type="radio" id="question2_4" name="q2" class='radio' value="<?php echo $groupQuestions[1][3][1]?>">
                <label><?php echo $groupQuestions[1][3][0]?></label>
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="button" id="nextQuestion" value="Next Question" onclick="scrollDown('#q3')"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="container" id="q3">
        <div class="topHalf">
          <h2>Question 3</h2>
          <?php echo "<h1>$questions[2]</h1>";?>
          <hr></hr>
        </div>
        <div class="bottomHalf">
          <table>
            <tr>
              <td class="options" id="q3o1" onclick="selected('q3o1','q3o2','q3o3','q3o4','question3_1','question3_2','question3_3','question3_4')">
                <input type='radio' id="question3_1" name="q3" class='radio' value="<?php echo $groupQuestions[2][0][1]?>"/>
                <label><?php echo $groupQuestions[2][0][0]?></label>
              </td>
              <td class="options" id='q3o2' onclick="selected('q3o2','q3o1','q3o3','q3o4','question3_2','question3_1','question3_3','question3_4')">
                <input type="radio" id="question3_2" name="q3" class='radio' value="<?php echo $groupQuestions[2][1][1]?>">
                <label><?php echo $groupQuestions[2][1][0]?></label>
              </td>
            </tr>
            <tr>
              <td class="options" id='q3o3' onclick="selected('q3o3','q3o1','q3o2','q3o4','question3_3','question3_1','question3_2','question3_4')">
                <input type='radio' id="question3_3" name="q3" class='radio' value='<?php echo $groupQuestions[2][2][1]?>'/>
                <label><?php echo $groupQuestions[2][2][0]?></label>
              </td>
              <td class="options" id='q3o4' onclick="selected('q3o4','q3o1','q3o2','q3o3','question3_4','question3_1','question3_2','question3_3')">
                <input type="radio" id="question3_4" name="q3" class='radio' value="<?php echo $groupQuestions[2][3][1]?>">
                <label><?php echo $groupQuestions[2][3][0]?></label>
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="button" id="nextQuestion" value="Next Question" onclick="scrollDown('#q4')"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="container" id="q4">
        <div class="topHalf">
          <h2>Question 4</h2>
          <?php echo "<h1>$questions[3]</h1>";?>
          <hr></hr>
        </div>
        <div class="bottomHalf">
          <table>
            <tr>
              <td class="options" id="q4o1" onclick="selected('q4o1','q4o2','q4o3','q4o4','question4_1','question4_2','question4_3','question4_4')">
                <input type='radio' id="question4_1" name="q4" class='radio' value="<?php echo $groupQuestions[3][0][1]?>"/>
                <label><?php echo $groupQuestions[3][0][0]?></label>
              </td>
              <td class="options" id='q4o2' onclick="selected('q4o2','q4o1','q4o3','q4o4','question4_2','question4_1','question4_3','question4_4')">
                <input type="radio" id="question4_2" name="q4" class='radio' value="<?php echo $groupQuestions[3][1][1]?>">
                <label><?php echo $groupQuestions[3][1][0]?></label>
              </td>
            </tr>
            <tr>
              <td class="options" id='q4o3' onclick="selected('q4o3','q4o1','q4o2','q4o4','question4_3','question4_1','question4_2','question4_4')">
                <input type='radio' id="question4_3" name="q4" class='radio' value='<?php echo $groupQuestions[3][2][1]?>'/>
                <label><?php echo $groupQuestions[3][2][0]?></label>
              </td>
              <td class="options" id='q4o4' onclick="selected('q4o4','q4o1','q4o2','q4o3','question4_4','question4_1','question4_2','question4_3')">
                <input type="radio" id="question4_4" name="q4" class='radio' value="<?php echo $groupQuestions[3][3][1]?>">
                <label><?php echo $groupQuestions[3][3][0]?></label>
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="button" id="nextQuestion" value="Next Question" onclick="scrollDown('#q5')"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="container" id="q5">
        <div class="topHalf">
          <h2>Question 5</h2>
          <?php echo "<h1>$questions[4]</h1>";?>
          <hr></hr>
        </div>
        <div class="bottomHalf">
          <table>
            <tr>
              <td class="options" id="q5o1" onclick="selected('q5o1','q5o2','q5o3','q5o4','question5_1','question5_2','question5_3','question5_4')">
                <input type='radio' id="question5_1" name="q5" class='radio' value="<?php echo $groupQuestions[4][0][1]?>"/>
                <label><?php echo $groupQuestions[4][0][0]?></label>
              </td>
              <td class="options" id='q5o2' onclick="selected('q5o2','q5o1','q5o3','q5o4','question5_2','question5_1','question5_3','question5_4')">
                <input type="radio" id="question5_2" name="q5" class='radio' value="<?php echo $groupQuestions[4][1][1]?>">
                <label><?php echo $groupQuestions[4][1][0]?></label>
              </td>
            </tr>
            <tr>
              <td class="options" id='q5o3' onclick="selected('q5o3','q5o1','q5o2','q5o4','question5_3','question5_1','question5_2','question5_4')">
                <input type='radio' id="question5_3" name="q5" class='radio' value='<?php echo $groupQuestions[4][2][1]?>'/>
                <label><?php echo $groupQuestions[4][2][0]?></label>
              </td>
              <td class="options" id='q5o4' onclick="selected('q5o4','q5o1','q5o2','q5o3','question5_4','question5_1','question5_2','question5_3')">
                <input type="radio" id="question5_4" name="q5" class='radio' value="<?php echo $groupQuestions[4][3][1]?>">
                <label><?php echo $groupQuestions[4][3][0]?></label>
              </td>
            </tr>
          </table>
        </div>
        <div class="submitBtn">
          <input type="submit"name="" value="Submit Quiz!">
        </div>
      </div>
      <script type="text/javascript">
      function scrollDown(id){
        document.querySelector(id).scrollIntoView({
          behavior: 'smooth'
        });
      }
      function selected(id1,id2,id3,id4,btn1,btn2,btn3,btn4){
        document.getElementById(id1).style.backgroundColor = "#12127B";
        document.getElementById(btn1).checked = true;
        document.getElementById(id2).style.backgroundColor = "#2A2A72";
        document.getElementById(btn2).checked = false;
        document.getElementById(id3).style.backgroundColor = "#2A2A72";
        document.getElementById(btn3).checked = false;
        document.getElementById(id4).style.backgroundColor = "#2A2A72";
        document.getElementById(btn4).checked = false;
      }
      </script>
    </form>
  </body>
</html>
