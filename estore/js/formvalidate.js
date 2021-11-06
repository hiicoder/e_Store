function validate()
{     
      var name=document.getElementById('name').value;
      var email=document.getElementById('email').value;
      var pwd=document.getElementById('pwd').value;
      var cpwd=document.getElementById('cpwd').value;
      var dob=document.getElementById('dob').value;
      var phone=document.getElementById('phone').value;
      var emailcheck = email.charAt(0);
      if(name=="")
      {
        document.getElementById("name").style = "border-color:#e52213";
        return false;
      }
      if((name.length <= 2)||(name.length > 20))
      {
        document.getElementById("name").style = "border-color:#e52213";
        document.getElementById("name1").innerHTML = "*Name must be between 3-20 character.";
        return false;
      }
      
       if(!/^[a-zA-Z]*$/.test(name)){
          document.getElementById("name").style="border-color:#e52213";
         document.getElementById("name1").innerHTML="*Number not allowed.";
          return false;
      }
      else{
        document.getElementById("name").style = "border-color:#006400";
        document.getElementById("name1").innerHTML = "";
      }

      if(email=="")
      {
        document.getElementById("email").style="border-color:#e52213";
        return false;
      }
      if(emailcheck<='9' && emailcheck>='0')
      {
        document.getElementById("email").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="Email must start with a Alphabet letter";
        return false;
      }
      if(email.indexOf('@')<=0)
      {
        document.getElementById("email").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="Invalid email";
        return false;
      }

      if((email.charAt(email.length-4)!=".")&&(email.charAt(email.length-3)!="."))
      {
        document.getElementById("email").style="border-color:#e52213";
        document.getElementById("email1").innerHTML="*. is at invalid position or not found.";
        return false;
      }

      else{
        document.getElementById("email").style="border-color:#006400";
        document.getElementById("email1").innerHTML="";
      }


      if(pwd=="")
      {
        document.getElementById("pwd").style="border-color:#e52213";
      return false;
      }
       if((pwd.length <= 5)||(pwd.length > 20))
      {
        document.getElementById("pwd").style="border-color:#e52213";
        document.getElementById("pass").innerHTML="*Password must be between 3-20 character.";
      return false;
      }
      else{
        document.getElementById("pwd").style="border-color:#006400";
        document.getElementById("pass").innerHTML="";
      }


      if(pwd!=cpwd){
        document.getElementById("pass1").innerHTML="*Password and Confirm Password not Match.";
        return false;
      }

      if(cpwd=="")
      {
        document.getElementById("cpwd").style="border-color:#e52213";
        return false;
      }else{
        document.getElementById("cpwd").style="border-color:#006400";
         document.getElementById("pass1").innerHTML="";
      }



      if(dob=="")
      {
        document.getElementById("dob").style="border-color:#e52213";
      return false;
      }

      else{
        document.getElementById("dob").style="border-color:#006400";
         document.getElementById("dob1").innerHTML="";
      }

      if(phone=="")
      {
        document.getElementById("phone").style="border-color:#e52213";
      return false;
      }
      if(!/^[0-9]*$/g.test(phone)){
          document.getElementById("phone").style="border-color:#e52213";
         document.getElementById("phone1").innerHTML="*Only Number allowed.";
       return false;
      }
      if(phone.length!=10)
      {
        document.getElementById("phone").style="border-color:#e52213";
        document.getElementById("phone1").innerHTML="*Must be 10 digit Number.";
      return false;
      }
      else{

        document.getElementById("phone").style="border-color:#006400";
        document.getElementById("phone1").innerHTML="";
      }

  }