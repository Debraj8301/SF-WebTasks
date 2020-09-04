


let winplayer1 = 0;
let winplayer2 = 0;
let homeCount1 = 2;
let homeCount2 = 2;
var move;
var moved;
let move1a = 0;
var move1b = 0;
var move2a = 0;
var move2b = 0;
var sound = new Audio("kick-bass.mp3");
var dicesound = new Audio("Dice-Sound.mp3");
const movesforplayer1 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28];
const movesforplayer2 = [15,16,17,18,19,20,21,22,23,24,25,26,27,28,1,2,3,4,5,6,7,8,9,10,11,12,13,14];
let player1turn = true;

const diceValue = [1,2,3,4,5,6];


function randoms(arr){
    return Math.floor(Math.random() * arr.length);
}
function setText(id, text){
    $(id).text(text);
}
function movePlayer(playerClass, moved, move){

  if(moved > 27){
    alert("Sorry, Move not allowed. Try again in next chance");
    if(playerClass === ".player1a"){
      move1a -= move;
      $("#pos" + movesforplayer1[move1a]).addClass("red");

    }
    else if(playerClass === ".player1b"){
      move1b -= move;
      $("#pos" + movesforplayer1[move1b]).addClass("red");
    }
        else if(playerClass === ".player2a"){
      move2a -= move;
      $("#pos" + movesforplayer2[move2a]).addClass("orange");

    }
      else if(playerClass === ".player2b"){
      move2b -= move;
      $("#pos" + movesforplayer2[move2b]).addClass("orange");
    }


        return;

  }
   else if(moved == 27){
    if(playerClass === ".player1a" || playerClass === ".player1b"){
      winplayer1++;
      $(playerClass).appendTo("#pos28");

      $(playerClass).appendTo("#win-box1");

      $("#pos" + movesforplayer1[moved - move]).removeClass("red");
      if(moved - move == move1b || moved - move == move1a){
        $("#pos" + movesforplayer1[moved - move]).addClass("red");
      }
      if(playerClass === ".player1a"){
        $("#p1a").removeClass("player1a");
        move1a = -100;
      }
      else {
        $("#p1b").removeClass("player1b");
        move1b = -100;
      }
      console.log(winplayer1);
      if(winplayer1 == 2){
      $(".gameboard").css("display", "none");
      $(".winner1").css("display", "block");
      }
      return;
    }
    else  {
      winplayer2++;
      $(playerClass).appendTo("#pos14");

      $(playerClass).appendTo("#win-box2");
      $("#pos" + movesforplayer2[moved - move]).removeClass("orange");
      if(moved - move == move2b || moved - move == move2a){
        $("#pos" + movesforplayer2[moved - move]).addClass("orange");
      }
      if(playerClass === ".player2a"){
        $("#p2a").removeClass("player2a");
        move2a = -100;
      }
      else {
        $("p2b").removeClass("player2b");
        move2b = -100;
      }
      if(winplayer2 == 2){
      $(".gameboard").css("display", "none");
      $(".winner2").css("display", "block");
      }
      return;
    }

  }
  else {

  if(playerClass === ".player1a" || playerClass === ".player1b"){

  $("#pos" + movesforplayer1[moved - move]).removeClass("red");
  $(playerClass).appendTo("#pos" + movesforplayer1[moved]);
  $("#pos" + movesforplayer1[moved]).addClass("red");
  if(moved - move == move1b || moved - move == move1a){
    $("#pos" + movesforplayer1[moved - move]).addClass("red");
  }
}
else {
  $("#pos" + movesforplayer2[moved - move]).removeClass("orange");
  $(playerClass).appendTo("#pos" + movesforplayer2[moved]);
  $("#pos" + movesforplayer2[moved]).addClass("orange");
  if(moved - move == move2b || moved - move == move2a){
    $("#pos" + movesforplayer2[moved - move]).addClass("orange");
  }
}
}
}
function InitialMove(playerclass){


  if(playerclass === ".player1a" || playerclass === ".player1b"){
    homeCount1--;
  $(playerclass).appendTo("#pos1");
  if(playerclass === ".player1a"){
    $("#players1").removeClass("parent1a");
  }
  else {
    $("#players1").removeClass("parent1b");
  }

}

  else {
    homeCount2--;
  $(playerclass).appendTo("#pos15")
  if(playerclass === ".player2a"){
    $("#players2").removeClass("parent2a");
  }
  else {
    $("#players2").removeClass("parent2b");
  }

  }

}

function checkforPlayer2(move){
  if(movesforplayer1[move] == 15){
    return;
  }
    if(movesforplayer1[move] == movesforplayer2[move2a]){
      move2a = 0;
      $(".player2a").appendTo("#players2");
      $("#players2").addClass("parent2a");
      homeCount2 ++;
      $("#pos" + movesforplayer1[move]).removeClass("orange");

        }
        if(movesforplayer1[move] == movesforplayer2[move2b]){
          move2b = 0;
          $(".player2b").appendTo("#players2");
          $("#players2").addClass("parent2b");
          homeCount2 ++;
          $("#pos" + movesforplayer1[move]).removeClass("orange");
            }

}
function checkforPlayer1(move){
  if(movesforplayer2[move] == 1){
    return;
  }
  if(movesforplayer2[move] == movesforplayer1[move1a]){
    move1a = 0;
    $(".player1a").appendTo("#players1");
    $("#players1").addClass("parent1a");
    homeCount1 ++;
    $("#pos" + movesforplayer2[move]).removeClass("red");

      }
      if(movesforplayer2[move] == movesforplayer1[move1b]){
        move1b = 0;
        $(".player1b").appendTo("#players1");
        $("#players1").addClass("parent1b");
        homeCount1 ++;
        $("#pos" + movesforplayer2[move]).removeClass("red");
        return;
          }

}

function roll(key){
  $(document).off("keydown");
  if(parseInt(key) > 6 || parseInt(key) < 1){
    alert("Enter a Number between 1 to 6")
    $(document).on("keydown", function(event){
      roll(event.key);
    });
  }
  else{
  $("#dice").fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250);
  sound.play();
  setText("#status", "Rolling....");
  let move = parseInt(key);

  setTimeout(() => {

    dice.src = "dice" + move + ".png";
    setText("#status", "It's a " + move + ".");

  setTimeout(() => {
    if(player1turn == true){
    if(move !== 6){
      if(homeCount1 == 1){

      if($("#players1").hasClass("parent1a") == false){


        $(".player1a").click(function(){
        sound.play();
        move1a = move1a + move;
        movePlayer(".player1a", move1a, move);
        checkforPlayer2(move1a);

        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player2");
        setText("#status", "Enter a Number");
        });

    }
    else if($("#players1").hasClass("parent1b") == false) {


       $(".player1b").click(function(){ 
      sound.play();
      move1b += move;
      movePlayer(".player1b", move1b, move);
      checkforPlayer2(move1b);
      $(".player1").off();
      $(document).on("keydown", function(event){
        roll(event.key);
      });
      setText("#turn", "Turn: Player2");
      setText("#status", "Enter a Number");
       });
  }

}
    else if(homeCount1 == 0){
      $(".player1").click(function(){
        sound.play();
        let playerClass = $(this).attr("class").split(" ")[0];
        if(playerClass == "player1a"){
          move1a += move;
          movePlayer(".player1a", move1a, move);
          checkforPlayer2(move1a);
          $(".player1").off();
          $(document).on("keydown", function(event){
            roll(event.key);
          });
        }
        else {
          move1b += move;
          movePlayer(".player1b", move1b, move);
          checkforPlayer2(move1b);
          $(".player1").off();
          $(document).on("keydown", function(event){
            roll(event.key);
          });
        }
        setText("#turn", "Turn: Player2");
        setText("#status", "Enter a Number");
      });

    }
    else {
      $(document).on("keydown", function(event){
        roll(event.key);
      });
      setText("#turn", "Turn: Player2");
      setText("#status", "Enter a Number");
    }
      player1turn = false;


    }
    else if(move === 6) {

          $(".player1").click(function(){
            sound.play();
            let playerClass = $(this).attr("class").split(" ")[0];

        if(playerClass == "player1a"){

          if($("#players1").hasClass("parent1a") == false){
            move1a += move;
            movePlayer(".player1a", move1a, move);
            checkforPlayer2(move1a);
            $(".player1").off();

          }
          else {

            InitialMove(".player1a");
            $(".player1").off();

          }
        }
        else {

          if($("#players1").hasClass("parent1b") == false){
            move1b += move;
            movePlayer(".player1b", move1b, move);
            checkforPlayer2(move1b);
            $(".player1").off();
          }
          else {

            InitialMove(".player1b");
            $(".player1").off();

          }
        }
        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player1");
        setText("#status", "Enter Again");
      });


    }


  }
  else if(player1turn == false){
    if(move !== 6){

      if(homeCount2  == 1){

      if($("#players2").hasClass("parent2a") == false){

      $(".player2a").click(function(){

        sound.play();

        move2a = move2a + move;
        movePlayer(".player2a", move2a, move);
        checkforPlayer1(move2a);

        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player1");
        setText("#status", "Roll It!");
      });

    }
    else if($("#players2").hasClass("parent2b") == false) {

          $(".player2b").click(function(){

      sound.play();
      move2b += move;
      movePlayer(".player2b", move2b, move);
        checkforPlayer1(move2b);
        $(".player2").off();
        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player1");
        setText("#status", "Roll It!");
          });
  }
}
    else if(homeCount2 == 0) {
      $(".player2").click(function(){
        sound.play();
        let playerClass = $(this).attr("class").split(" ")[0];
        if(playerClass == "player2a"){
          move1a += move;
          movePlayer(".player2a", move2a, move);
            checkforPlayer1(move2a);
            $(".player2").off();
        }
        else {
          move2b += move;
          movePlayer(".player2b", move2b, move);
            checkforPlayer1(move2b);
            $(".player2").off();
        }
        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player1");
        setText("#status", "Roll It!");
      });
    }
    else {
      $(document).on("keydown", function(event){
        roll(event.key);
      });
      setText("#turn", "Turn: Player1");
      setText("#status", "Roll It!");
    }
      player1turn = true;


    }
    else if(move === 6) {


          $(".player2").click(function(){
            sound.play();
            let playerClass = $(this).attr("class").split(" ")[0];

        if(playerClass == "player2a"){

          if($("#players2").hasClass("parent2a") == false){
            move2a += move;
            movePlayer(".player2a", move2a, move);
              checkforPlayer1(move2a);
              $(".player2").off();

          }
          else {

            InitialMove(".player2a");
            $(".player2").off();

          }
        }
        else {

          if($("#players2").hasClass("parent2b") == false){
            move2b += move;
            movePlayer(".player2b", move2b, move);
              checkforPlayer1(move2b);
              $(".player2").off();
          }
          else {

            InitialMove(".player2b");
            $(".player2").off();
          }
        }
        $(document).on("keydown", function(event){
          roll(event.key);
        });
        setText("#turn", "Turn: Player2");
        setText("#status", "Roll Again");
      });


    }

  }


}, 500);
}, 1000);
}
}


$(".gameboard").css("display", "block");
$(".winner1").css("display", "none");
$(".winner2").css("display", "none");
$(document).keydown(function(event){
  roll(event.key);
});
