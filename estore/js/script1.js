function getProduct()
      {

        data = document.getElementById('search').value;
        
        obj= new XMLHttpRequest();
        obj.open("GET","getproducts.php?id=" + data,true);
        
        obj.onload = function(){
          console.log(this.responseText);
        }
        obj.send();
        obj.onreadystatechange = function(){
          if(obj.readyState == 4 && obj.status == 200)
          {
            document.getElementById('t1').hidden=true;
            document.getElementById('t2').innerHTML=obj.responseText;
            document.getElementById('hint').innerHTML="";
             
          }
        }
      }
function getProductName()
      
         {
        data = document.getElementById('search').value;
        
        if(data!="")
        {
        obj= new XMLHttpRequest();  
         obj.open("GET","getproductname.php?id=" + data,true);
        obj.send();
        obj.onreadystatechange = function(){
          if(obj.readyState == 4 && obj.status == 200)
          {
            document.getElementById('hint').innerHTML=obj.responseText;
          }
      }
    }else{
      document.getElementById('hint').innerHTML="";
    }
}