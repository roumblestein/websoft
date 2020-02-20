(function () {
    'use strict';

    var area = document.body,
        areaHeight = window.innerHeight,
        areaWidth = window.innerWidth,
        duck = document.createElement('img')
        



    /**
     * Set the attributes for the duck
     **/
    duck.src='img/duck.png';
    duck.style.position ='absolute';
    duck.style.left = '250px';
    duck.style.top = '250px';
    duck.style.zIndex = 10000;
    duck.addEventListener('click', newDuck);



    /**
     * A function for displaying the duck in random positions
     **/
    function newDuck() {
        var newX = Math.floor(Math.random() * (areaWidth-duck.width)),
            newY = Math.floor(Math.random() * (areaHeight-duck.height));

        duck.style.left = newX+'px';
        duck.style.top = newY+'px';
        area.appendChild(duck);
    }



    /**
     * The function that triggers the game, uses an time interval in milliseconds
     **/
    function startGame() {
        area.appendChild(duck)
        
    }



    /**
     * Start the game
     **/
    startGame();

    console.log('Game is ready!');
})();