$( document ).ready(function() {
   

    gameStarted = false;
    playerCount = 10;
    
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
    
    function GenerateRandomUsers() {
        gameStarted = true;
    
        var randomNamesList = ["bob", "marcella", "steve"];
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
        
        var randomSex = ["Male", "Female"];
        
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
    
    $(document).on('click', ".player", function(){
        id = $(this).attr("id");
      
        $("#submitPlayer").on('click', function(){
            console.log(document.getElementById("name").value);
            Person['Player'+id]["name"] =  document.getElementById("name").value;
            Person['Player'+id]["image"] =  document.getElementById("link").value;
            Person['Player'+id]["sex"] =  document.getElementById("sex").value;
            $("#player-list").empty();
            $.each(Players, function(index) {
    
                // if (Players[index] != "User") {
               $("#player-list").append('<img data-toggle="modal" data-target="#myModal" id="' + Person[Players[index]]["player"] + '" name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img player">');
                // }
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
    
    function Day(params) {
        maxDays = 11;
        actionCount = 0;
        actualDays = 1;
        time = 0;
    
        dayArray =[];
    
        $( "#next" ).hide();
        $( ".game-container" ).show();
        $( ".player-container" ).empty();
        $.each(Players, function(index) {
    
            // if (Players[index] != "User") {
           $(".player-container").append('<img src="' + Person[Players[index]]["image"] + '" class="game-img">');
            // }
        });

        dayArray.push("its day:" + dayCount++);
        
    
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
        
        $.each(dayArray, function(index){
            setTimeout(function() {
                console.log(dayArray[index]);
                $(".event-container").append('<p>' + dayArray[index] + '</p>');
                if(dayArray.length - 1 === index) {
                    console.log('loop ends');
                    $( "#next" ).show();
                    if(playerCount === 0) {
                        console.log("everybody loses");
                        $( "#next" ).hide();
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
                    else if(playerCount === 1) {
    
                        $.each(Players, function(index) {
                            if (Person[Players[index]]["status"] == "alive") {
                                if (Players[index] != "User") {
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
                                else {
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
            time += 1000;
         });
    }
    
    function hostileEvents(index){
    
        if(Person[Players[index]]["Player"] == "male") {
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
            username = Person[Players[index]]["name"];
        }
        eventRoll =  Math.floor(Math.random()*3);
        var hostileEventsList = [username + " tripped on " + pronoun + " dick and fell to their death", username + " collided with an asteroid", username + " has encountered aliens and got zapped"];
        dayArray.push(hostileEventsList[eventRoll]);
        Person[Players[index]] = {
            "image" : Person[Players[index]]["image"],
            "status" : "dead"                  
        }; 
    };
    
    function passiveEvents(index){
    
    
        if(Person[Players[index]]["Player"] == "male") {
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
            username = Person[Players[index]]["name"];
        }
        username = Person[Players[index]]["name"];
        eventRoll =  Math.floor(Math.random()*3);
        var passiveEventsList = [username + " is taking a nap", username + " doesn't want to get out of bed", username + " is doing a flip", username + " is confused"];
        dayArray.push(passiveEventsList[eventRoll]);
        };
    });