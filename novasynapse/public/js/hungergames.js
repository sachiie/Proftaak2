$( document ).ready(function() {
    

// {name:"", sex:"", image:"", status:"alive"}


function GenerateRandomUsers() {
    
    var Players = ["Player1", "Player2", "Player3", "Player4", "Player5", "Player6",
    "Player7", "Player8", "Player9"];

    var Person = [];

    var randomNamesList = ["bob", "marcella", "steve"];
    var randomImageList = ["https://www.ienglishstatus.com/wp-content/uploads/2018/04/Cute-Whatsapp-DP.jpg",
    "https://i.imgur.com/oW1dGDI.jpg","https://amp.businessinsider.com/images/5899ffcf6e09a897008b5c04-750-750.jpg"];
    var randomSex = ["Male", "Female"];
    
    $.each(Players, function( index, value ) {
        
        var sex = rand(0,2);
        var name = rand(0,3);
        var image = rand(0,3);
        Person[Players[index]] = {
            "name" : randomNamesList[name],
            "sex" : randomSex[sex],
            "image" : randomImageList[image],
            "status" : "alive"                  
        };
    });


    
}













});