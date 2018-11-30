$( document ).ready(function() {
    gameStarted = false;
    var Person = [];
    var Players = ["Player1", "Player2", "Player3", "Player4", "Player5", "Player6",
    "Player7", "Player8", "Player9"];

// {name:"", sex:"", image:"", status:"alive"}
$("#start").click(GenerateRandomUsers);

function GenerateRandomUsers() {
    gameStarted = true;

    var randomNamesList = ["bob", "marcella", "steve"];
    var randomImageList = ["https://www.ienglishstatus.com/wp-content/uploads/2018/04/Cute-Whatsapp-DP.jpg",
    "https://i.imgur.com/oW1dGDI.jpg","https://amp.businessinsider.com/images/5899ffcf6e09a897008b5c04-750-750.jpg",
    "http://i.imgur.com/cDqspyH.png"];
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
    $( "#start" ).hide();
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




});