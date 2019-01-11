$( document ).ready(function() {
   

    gameStarted = false;

    //set the max amount of players in the game
    playerCount = 10;
    
    //hide UI till necessary
    $( "#start" ).hide();
    $( "#next" ).hide();
    $( "#victory" ).hide();
    $( "#defeat" ).hide();
    $( ".game-container" ).hide();
    var Useralias = $('#username').val();
    var Winnername;
    
    var Person = [];
    var Players = ["User","Player1", "Player2", "Player3", "Player4", "Player5", "Player6",
    "Player7", "Player8", "Player9"];
    var dayArray = [];
    var dayCount =1;
    
    // {name:"", sex:"", image:"", status:"alive"}
    $("#generate").click(GenerateRandomUsers);
    $("#start").click(StartGame);
    $("#next").click(Day);

    // make sure the link in the image link input is a image link
    function checkURL(url) {
        return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
    }
    
    //generate information for the computer players
    function GenerateRandomUsers() {
        gameStarted = true;
    
        //array of all the names they van get
        var randomNamesList = ["bob", "marcella", "steve"];

        //array of all the images they can get
        var randomImageList = [ 
        "https://i.imgur.com/HOiKNCH.png",
        "https://i.imgur.com/cqpSh5z.png",
        "https://i.imgur.com/uCGMfnQ.png",
        "https://i.imgur.com/brZ4x72.png",
        "https://i.imgur.com/vrHps8O.png",
        "https://i.imgur.com/wjpPZPU.png",
        "https://i.imgur.com/iV9kiwQ.png",
        "https://i.imgur.com/tnWHzmP.png",
        "https://i.imgur.com/2dI1gKh.png",
        "https://i.imgur.com/RDqGFUm.png"
        ];
        
        //randomized gander
        var randomSex = ["Male", "Female"];
        
        //each player gets asigned their values the values are different if the Players is the User
        $.each(Players, function( index, value ) {
            
        if (Players[index] != "User") {
             sex =  Math.floor(Math.random()*2);
             name = Math.floor(Math.random()*3);
             image = Math.floor(Math.random()*4);
            console.log(name);
            Person[Players[index]] = {
                "player": index,
                "name" : randomNamesList[name],
                "sex" : randomSex[sex],
                "image" : randomImageList[image],
                "status" : "alive"                  
            };
    
            }
            else {
                   Person[Players[index]] = {
                       "player": 10,
                       "name" : Useralias,
                       "sex" : "User",
                       "image" : "css/profile-images/2.png",
                       "status" : "alive"                  
                   };
            }
    
            //if its a computer player it gets added to a list so they can be edited in the ui
            if (Players[index] != "User") {
            $("#player-list").append('<img data-toggle="modal" data-target="#myModal" id="' + Person[Players[index]]["player"] + '" name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img player">');
            }
        
        });
    
        
        if(gameStarted == true){
            $( "#generate" ).hide();
            $( "#start" ).show();
            // $( "#player-list" ).hide();
            // $( ".player-list-row" ).hide();
            // $( ".hungry-container" ).hide();
        }
    console.log(Person);   
    }
    
    //function for editing computer players
    $(document).on('click', ".player", function(){
        
        id = $(this).attr("id");
      
        $("#submitPlayer").on('click', function(){
            console.log(document.getElementById("name").value);

            //set new name if filled in
            if (document.getElementById("name").value != "") {
                Person['Player'+id]["name"] =  document.getElementById("name").value;
            }
            //set new image if there is a link
            if (document.getElementById("link").value != "") {
                if(checkURL(document.getElementById("link").value)){
                    Person['Player'+id]["image"] =  document.getElementById("link").value;
                }
            }
            //set the asigned sex
            Person['Player'+id]["sex"] =  document.getElementById("sex").value;

            //empty ui
            $("#player-list").empty();

            //remake ui with new infomation
            $.each(Players, function(index) {
    
                if (Players[index] != "User") {
               $("#player-list").append('<img data-toggle="modal" data-target="#myModal" id="' + Person[Players[index]]["player"] + '" name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img player">');
                }
            });
        });
        console.log(Person);
    });
    
    function StartGame() {
        $("#player-list").empty();
        $( "#start" ).hide();
        $( ".your-char" ).hide();
        $( ".build-header" ).hide();
        Day();
        
    }
    
    //generate events for each loop
    function Day(params) {
        maxDays = 11;
        actionCount = 0;
        actualDays = 1;
        time = 0;

        dayArray =[]; //events will be stored in this array
    
        $( "#next" ).hide();
        $( ".game-container" ).show();
        $( ".player-container" ).empty();
        $.each(Players, function(index) {
    
            // if (Players[index] != "User") {
           $(".player-container").append('<img src="' + Person[Players[index]]["image"] + '" class="game-img">');
            // }
        });

        dayArray.push("its day:" + dayCount++); //add a day count to information to be displayed
        
        // generate a event for each player if he or he is alive
        $.each(Players, function(index) {
            
            if (Person[Players[index]]["status"] == "alive") {
            eventRoll =  Math.floor(Math.random()*2);
    
                switch (eventRoll) {
                    case 0:
                    hostileEvents(index);
                    playerCount--;
                        break;
    
                    case 1:
                    passiveEvents(index);
                        break;
                }
            }
    
        });
        dayArray.push("the day ends");
        
        $.each(dayArray, function(index){ //in here it gets decided how the array should be read out
            setTimeout(function() { //timeout so not everything is read out at once
                console.log(dayArray[index]);
                $(".event-container").append('<p>' + dayArray[index] + '</p>'); //read information in order
                if(dayArray.length - 1 === index) {
                    console.log('loop ends');
                    $( "#next" ).show(); // when the day is over show the next button
                    if(playerCount === 0) { // lose condition if noone wins
                        console.log("everybody loses");
                        $( "#next" ).hide();
                        $( "#defeat" ).show();

                        $.ajaxSetup({ //ajax to send the victory/loss to the database
                            headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                          });

                        $.ajax({
                            url:"updatescore",  
                            method:"POST",  
                            data:{
                                 gamesplayed: 1,
                                 type: 'defeat'
                            },                              
                            success: function( data ) {
                                console.log("data send");
                            },
                            error: function (error) {
                                console.log('Error:', error);
                            }
                        });
                    }
                    else if(playerCount === 1) { //if there is one player still alive
    
                        $.each(Players, function(index) {
                            if (Person[Players[index]]["status"] == "alive") { 
                                if (Players[index] != "User") {//if its not the user show victor and send data
                                    Winnername = Person[Players[index]]["name"];
                                    console.log(Winnername + " wins");
                                    $( "#defeat" ).show();

                                    $.ajaxSetup({
                                        headers: {
                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                      });

                                    $.ajax({
                                        url:"updatescore",  
                                        method:"POST",  
                                        data:{
                                             gamesplayed: 1,
                                             type: 'defeat'
                                        },                              
                                        success: function( data ) {
                                            console.log("data send");
                                        },
                                        error: function (error) {
                                            console.log('Error:', error);
                                        }
                                    });
                                    
                                }
                                else { //if it is the player show message and send data
                                    console.log("you win");
                                    $( "#victory" ).show();

                                    $.ajaxSetup({
                                        headers: {
                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                      });

                                    $.ajax({
                                        url:"updatescore",  
                                        method:"POST",  
                                        data:{
                                             gamesplayed: 1,
                                             type: 'victory'
                                        },                              
                                        success: function( data ) {
                                            console.log("data send");
                                        },
                                        error: function (error) {
                                            console.log('Error:', error);
                                        }
                                    });
                                }
                            }
                        });
    
                        $( "#next" ).hide();
                    }
                }
    
            }, time);
            time += 1000; //time between messages
         });
    }
    
    function hostileEvents(index){ //events that make a player drop out
    
        if(Person[Players[index]]["Player"] == "male") { //change pronoun to an accurate one for the gender
            pronoun = "his";
        }
        else if (Players[index] == "User") {
            pronoun = "your";
        }
        else {
            pronoun = "her";
        }
    
        if(Players[index]  == "User") {
            username = "you";
        } else {
            username = "<h1>" + Person[Players[index]]["name"] + "</h1>";
        }
        eventRoll =  Math.floor(Math.random()*3); //randomize which event gets chosen
        //list of events that can happen more to be added
        var hostileEventsList = [username + " tripped on " + pronoun + " dick and fell to their death", username + " collided with an asteroid", username + " encountered aliens and got zapped"];
        dayArray.push(hostileEventsList[eventRoll]); //add event to day
        Person[Players[index]] = { //change player status
            "image" : Person[Players[index]]["image"],
            "status" : "dead"                  
        }; 
    };
    
    function passiveEvents(index){ //events that make a player continue to play
    
    
        if(Person[Players[index]]["Player"] == "male") { //change pronoun to an accurate one for the gender
            pronoun = "his";
        }
        else if (Players[index] == "User") {
            pronoun = "your";
            username = "you";
        }
        else {
            pronoun = "her";
        }
    
        if(Players[index]  == "User") {
            username = "you";
        } else {
            username = "<h1>" + Person[Players[index]]["name"] + "</h1>";
        }
        // username = Person[Players[index]]["name"];
        eventRoll =  Math.floor(Math.random()*3);//randomize which event gets chosen
        //list of events that can happen more to be added
        var passiveEventsList = [username + " is taking a nap", username + " doesn't want to get out of bed", username + " is doing a flip", username + " is confused"];
        dayArray.push(passiveEventsList[eventRoll]); //add event to day
        };
    });