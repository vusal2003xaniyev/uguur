const url_string = location.href;
const url = new URL(url_string);
const add = url.searchParams.get("success");
const add_student = url.searchParams.get("student");
const delete_student = url.searchParams.get("delete");
const edit_student = url.searchParams.get("edit");
const login = url.searchParams.get("login_success");
function Refresh() {
  location.href = "student.php";
  exit;
}
//sign_up
if (add == "ok") {
  alert("Uğurla qeydiyyatdan keçdiniz.");
  Refresh();
} else if (add == "no") {
  alert("Qeydiyyat zamanı xəta baş verdi!");
  exit;
}
//sign_up

//insert alert
if (add_student == "ok") {
  alert("Tələbə uğurla əlavə edildi.");
  Refresh();
} else if (add_student == "no") {
  alert("Gözlənilməz xəta!");
  Refresh();
}
//insert alert

//delete function
function delStudent(id, name) {
  const conf = confirm(
    `Siz ${name} tələbəsinin məlumatlarını silmək istəyirsinizmi?`
  );
  if (conf) {
    location.href = `student.php?delete=ok&id=${id}`;
  } else {
    alert("Silmə imtina edildi!");
    exit;
  }
}
//delete function

//delete alert
if (delete_student == "ok") {
  alert("Məlumat uğurla silindi.");
  Refresh();
} else if (delete_student == "no") {
  alert("Gözlənilməz xəta!");
  Refresh();
}
//delete alert

//update function
function updStudent(id) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "./app/ajax.php");
  xhttp.onload = function () {
    const data = JSON.parse(this.responseText);
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_fullname").value = data.fullname;
    document.getElementById("edit_email").value = data.email;
    document.getElementById("edit_phone").value = data.phone;
    document.getElementById("edit_package").value = data.package;
    $("#edit").modal("show");
  };
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`view=ok&id=${id}`);
}
//update function

//update alert
if(edit_student=="ok"){
  alert("Məlumatlar uğurla redakte edildi");
  Refresh();
}
else if(edit_student=="no"){
  alert("Gözlənilməz xəta baş verdi!");
  Refresh();
}
//update alert

//login email
function loginCheck(email){
  const xhttp=new XMLHttpRequest();
  xhttp.open("POST","./app/ajax.php");
  xhttp.onload=function(){
    const data=JSON.parse(this.responseText);
    console.log(data);
    if(data.status){
      document.getElementById("login").disabled=false;
    }
    else{
      document.getElementById('login').disabled=true;  
      alert("Zəhmət olmasa qeydiyyatdan keçin.");    
    }
    

  }
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhttp.send(`login_email=ok&email=${email}`);
}
//login email

//sig_up email
function signCheck(email){
  const xhttp=new XMLHttpRequest();
  xhttp.open("POST","./app/ajax.php");
  xhttp.onload=function(){
    const data=JSON.parse(this.responseText);
    console.log(data);
    if(data.status){
      document.getElementById("send").disabled=true;
      alert("E-poçt qeydiyyatdan keçmişdir."); 
    }
    else{
      document.getElementById("send").disabled=false;  
         
    }
    

  }
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhttp.send(`sign_email=ok&email=${email}`);
}
//sign_up email

//add phone
function phoneCheck(phone){
  const xhttp=new XMLHttpRequest();
  xhttp.open("POST","./app/ajax.php");
  xhttp.onload=function(){
    const data=JSON.parse(this.responseText);
    console.log(data);
    if(data.status){
      document.getElementById("add_student").disabled=true;
      alert("Nömrə istifadə edilmişdir."); 
    }
    else{
      document.getElementById("add_student").disabled=false;  
         
    }
    

  }
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhttp.send(`add_phone=ok&phone=${phone}`);
}
//add phone

//edit phone
function editphoneCheck(phone){
  const xhttp=new XMLHttpRequest();
  xhttp.open("POST","./app/ajax.php");
  xhttp.onload=function(){
    const data=JSON.parse(this.responseText);
    console.log(data);
    if(data.status){
      document.getElementById("edit_student").disabled=true;
      alert("Nömrə istifadə edilmişdir."); 
    }
    else{
      document.getElementById("edit_student").disabled=false;  
         
    }
    

  }
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhttp.send(`edit_phone=ok&phone=${phone}`);
}
//edit phone

//login alert
if(login=="ok"){
  Refresh();
}
else if(login=="no"){
  alert("Gözlənilməz xəta!");
  location.href="login.php";
}
//login alert