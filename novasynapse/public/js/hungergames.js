$( document ).ready(function() {
    gameStarted = false;
    $( "#start" ).hide();
    $( "#next" ).hide();
    var Person = [];
    var Players = ["Player1", "Player2", "Player3", "Player4", "Player5", "Player6",
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
    var randomImageList = ["http://footage.framepool.com/shotimg/qf/161475002-gossip-standing-out-from-the-crowd-multicultural-business-attire.jpg",
    "https://banner2.kisspng.com/20180207/wte/kisspng-stock-photography-black-happiness-african-american-recommended-gesture-business-people-do-5a7b5e050e1b08.9480166115180344370578.jpg","https://amp.businessinsider.com/images/5899ffcf6e09a897008b5c04-750-750.jpg",
    "https://banner2.kisspng.com/20180428/vxq/kisspng-thumb-signal-businessperson-stock-photography-ok-5ae4846b292d62.8008028615249255471687.jpg"];
    var randomSex = ["Male", "Female"];
    
    $.each(Players, function( index, value ) {
        
         sex =  Math.floor(Math.random()*2);
         name = Math.floor(Math.random()*3);
         image = Math.floor(Math.random()*4);
        console.log(name);
        Person[Players[index]] = {
            "player": index + 1,
            "name" : randomNamesList[name],
            "sex" : randomSex[sex],
            "image" : randomImageList[image],
            "status" : "alive"                  
        };

        // $("#player-list").prepend('<label for="' + Person[Players[index]]["name"] + '">' + Person[Players[index]]["name"] + '</label>');
        $("#player-list").append('<img data-toggle="modal" data-target="#myModal" id="' + Person[Players[index]]["player"] + '" name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img-thumbnail player">');
    });

     
//     $.each(Person, function( index, value ) {
//        $("#player-list").prepend('<img name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img-thumbnail">');
//    });

    
if(gameStarted == true){
    $( "#generate" ).hide();
    $( "#start" ).show();
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

        //    Person[Players[index]] = {
        //        "player": Person[Players[index]]["Player"],
        //        "name" : Person[Players[index]]["name"],
        //        "sex" : Person[Players[index]]["sex"],
        //        "image" : Person[Players[index]]["image"],
        //        "status" : "alive"                  
        //    };
        //    console.log("ik kom hier");
           // $("#player-list").prepend('<label for="' + Person[Players[index]]["name"] + '">' + Person[Players[index]]["name"] + '</label>');
           $("#player-list").append('<img data-toggle="modal" data-target="#myModal" id="' + Person[Players[index]]["player"] + '" name="' + Person[Players[index]]["name"] + '" src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img-thumbnail player">');
       });
    });
    console.log(Person);
});

function StartGame() {
    $("#player-list").empty();
    $( "#start" ).hide()

    // dayCount = 1;
    // maxDays = 11;
    // playerCount = 0;
    // actionCount = 0;
    // actualDays = 1;
    // time = 0;

    // // for (dayCount = 1; dayCount < maxDays; dayCount++) {
    Day();
    // dayArray.push("its day:" + dayCount++);

    // $.each(Players, function(index) {
    //     if (Person[Players[index]]["status"] == "alive") {
    //     eventRoll =  Math.floor(Math.random()*2);
    //     // console.log(eventRoll);
    //     // console.log("its day:" + actualDays++);
    //     switch (eventRoll) {
    //         case 0:
    //         hostileEvents(index);
    //             break;

    //         case 1:
    //         passiveEvents(index);
    //             break;
    //     }
    // }
    //     // console.log("the day ends");
    // });
    // dayArray.push("the day ends");
    // }

        // $.each(dayArray, function(index){
        //     setTimeout(function() {

        //         console.log(dayArray[index]);

        //         if(dayArray.length - 1 === index) {
        //             console.log('loop ends');
        //         }

        //     }, time);
        //     time += 1000;
        //  });
        // console.log("starting the next day");

}

function Day(params) {
    // dayCount = 1;
    maxDays = 11;
    playerCount = 0;
    actionCount = 0;
    actualDays = 1;
    time = 0;

    dayArray =[];

    $( "#next" ).hide();

    // for (dayCount = 1; dayCount < maxDays; dayCount++) {
    
    dayArray.push("its day:" + dayCount++);

    $.each(Players, function(index) {
        if (Person[Players[index]]["status"] == "alive") {
        eventRoll =  Math.floor(Math.random()*2);
        // console.log(eventRoll);
        // console.log("its day:" + actualDays++);
        switch (eventRoll) {
            case 0:
            hostileEvents(index);
                break;

            case 1:
            passiveEvents(index);
                break;
        }
    }
        // console.log("the day ends");
    });
    dayArray.push("the day ends");

    
    $.each(dayArray, function(index){
        setTimeout(function() {

            console.log(dayArray[index]);

            if(dayArray.length - 1 === index) {
                console.log('loop ends');
                $( "#next" ).show();
            }

        }, time);
        time += 1000;
     });
}

function hostileEvents(index){
        // setTimeout(function() {
            // dayArray.push("its day:" + actualDays++);

            // $.each(Players, function(index) {
                    if(Person[Players[index]]["Player"] == "male") {

                        pronoun = "his";

                    }
                    else {

                        pronoun = "her";

                    }

                    username = Person[Players[index]]["name"];

                    eventRoll =  Math.floor(Math.random()*3);

                    var hostileEventsList = [username + " tripped on " + pronoun + " dick and fell to their death", username + " collided with an asteroid", username + " has encountered aliens and got zapped"];

                    
                    // dayArray = hostileEventsList[eventRoll];
                    dayArray.push(hostileEventsList[eventRoll]);
                    // console.log(dayArray);
                    Person[Players[index]] = {
                        "status" : "dead"                  
                    };
                

            // });

    };

function passiveEvents(index){
    // for (dayCount = 1; dayCount < maxDays; dayCount++) {

        // setTimeout(function() {
            // dayArray.push("its day:" + actualDays++);

            // $.each(Players, function(index) {
                // if (Person[Players[index]]["status"] == "alive") {
                    if(Person[Players[index]]["Player"] == "male") {

                        pronoun = "his";

                    }
                    else {

                        pronoun = "her";

                    }

                    username = Person[Players[index]]["name"];

                    eventRoll =  Math.floor(Math.random()*3);

                    var passiveEventsList = [username + " is taking a nap", username + " doesn't want to get out of bed", username + " is doing a flip", username + " is confused"];

                    
                    // dayArray = hostileEventsList[eventRoll];
                    dayArray.push(passiveEventsList[eventRoll]);
                    // console.log(dayArray);
                // }

            // });

    };

// }




});