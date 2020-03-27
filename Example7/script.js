
var demo = document.getElementById('demo');

function changed(){
    demo.innerHTML = "";
    var table = "";

    var options = document.getElementsByTagName('option');
    for(var i in options){
        if(options[i].selected == true){
            table = options[i].value;
        }
    }

    seekData(table, receiveData);
}
function seekData(table, receive){
    if(table != ""){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
               receive(this);
            }
        }

        xhttp.open("POST", "./server.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send('table=' + table);
    }
}

function receiveData(xhttp){
    var data = xhttp.responseText;
    var obj = JSON.parse(data);
    
    var table = document.createElement('table')
    demo.appendChild(table);
    if(obj[0] == null){            
        demo.innerHTML += `<tr><td>${obj[1]}</td></tr>`;
    }else{                
        for(var i in obj){
            var tr = document.createElement('tr');
            table.appendChild(tr);            
            tr.innerHTML  =  '<td>' + obj[i].descricao + '</td>';
        }
    }
    
}