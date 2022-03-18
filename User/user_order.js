const make_order = ()=>{

   let totalButton = document.getElementById("total");

    totalButton.addEventListener("click",()=>{

        let totalNumber =  Number(document.getElementsByClassName("total-table")[0].children[1].children[0].children[1].innerText);
        
        let params = 'tn='+totalNumber;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","user_order.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(params);

    });


}

make_order();