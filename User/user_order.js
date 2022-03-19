const make_order = ()=>{

   let totalButton = document.getElementById("total");

    totalButton.addEventListener("click",()=>{

        const totalTable = document.getElementsByClassName("total-table"); 

        if (Number(totalTable[0].children[1].children[0].children[1].innerText)!=0){

            let totalNumber =  Number(document.getElementsByClassName("total-table")[0].children[1].children[0].children[1].innerText);
        
            let params = 'tn='+totalNumber;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST","user_order.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(params);
        }else{
            alert("please checkout to make order");
        }

       

    });


}

make_order();