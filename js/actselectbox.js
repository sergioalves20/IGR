

var select = document.getElementsByTagName("tMaterial")[0],
    td = document.getElementById("alterar"),
    a = document.getElementById("alt");

select.onchange = function(){
    td.value = this[this.selectedIndex].text;

    var selected = this,
        selectedIndex = this.selectedIndex;

        a.onclick = function(){
          selected[selectedIndex].text = td.value;
     
        }
     }


