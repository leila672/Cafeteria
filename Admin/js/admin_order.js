function getuserid(){

    select = document.getElementById('select');
   
    select.addEventListener("change",()=>{

  var userid = select.options[select.selectedIndex].value;
  
  make_order(userid);

 
});

}

const make_order = (userid)=>{          
   let totalButton = document.getElementById("total");

    totalButton.addEventListener("click",()=>{

      const totalTable = document.getElementsByClassName("total-table"); 

      if (Number(totalTable[0].children[1].children[0].children[1].innerText)!=0){

        let totalNumber =  Number(document.getElementsByClassName("total-table")[0].children[1].children[0].children[1].innerText);
        let params = 'tn='+totalNumber+'&'+'id='+userid;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","../views/admin_order.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(params);

      }else{
        alert("You Must Checkout to make order ");
      }
  

    });

}


getuserid();