function jsonFetch (){
    'use strict';


    fetch('data/1081.json')
    .then(response => response.text())
    .then(data => {
    
        var object = JSON.parse(data);

        var jsonList = object.Skolenheter;


    var col = [];
        for (var i = 0; i < jsonList.length; i++) {
            for (var key in jsonList[i]) {
                if (col.indexOf(key) === -1) {
                    col.push(key);
                }
            }
        }
    
    
        var table = document.createElement("table");
        var tr = table.insertRow(-1);                  

        for (var i = 0; i < col.length; i++) {
            var th = document.createElement("th");     
            th.innerHTML = col[i];
            tr.appendChild(th);
        }

        for (var i = 0; i < jsonList.length; i++) {

            tr = table.insertRow(-1);

            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                tabCell.innerHTML = jsonList[i][col[j]];
            }
        }

        var divContainer = document.getElementById("showData");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);
    
    })
    var button = document.getElementById('fetchSchools');
            button.addEventListener("click", function(){

            })
        
    }
