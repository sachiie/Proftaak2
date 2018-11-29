$( document ).ready(function() {
    gameStarted = false;
    


// {name:"", sex:"", image:"", status:"alive"}
$("#start").click(GenerateRandomUsers);

function GenerateRandomUsers() {
    gameStarted = true;
    
    var Players = ["Player1", "Player2", "Player3", "Player4", "Player5", "Player6",
    "Player7", "Player8", "Player9"];

    var Person = [];

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
            "name" : randomNamesList[name],
            "sex" : randomSex[sex],
            "image" : randomImageList[image],
            "status" : "alive"                  
        };

        $("#player-list").prepend('<img src="' + Person[Players[index]]["image"] + '" alt="..." style="height: 150px;" class="img-thumbnail">');
    });

    
if(gameStarted == true){
    $( "#start" ).hide();
}
console.log(Person);
    
}













});