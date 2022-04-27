class User {
    constructor(login, email, password1, password2) {
      this.login = login;
      this.email = email;
      this.password1 = password1;
      this.password2 = password2;
    }
  }
document.querySelector("form").addEventListener("submit",(e) => {
  
    console.log(e.target)
    const user = new User(e.target.elements.login.value,e.target.elements.email.value,e.target.elements.password.value,e.target.elements.password_conf.value)
      if (!e.target.checkValidity()) {
        e.preventDefault()
        e.stopPropagation()
      }
      if(e.target.elements.password.value != e.target.elements.password_conf.value){
        e.preventDefault()
        e.stopPropagation()
        alert("issue password")
      }
    e.target.classList.add('was-validated')
    //sendData();
  }
);
/*
function sendData () {
  // (A) GET FORM DATA
  var data = new FormData();
  data.append("name", document.getElementById("name").value);
  data.append("email", document.getElementById("email").value);
  data.append("password", document.getElementById("password").value);
 
  // (B) INIT FETCH POST
  fetch("2-dummy.php", {
    method: "POST",
    body: data
  })
 
  // (C) RETURN SERVER RESPONSE AS TEXT
  .then((result) => {
    if (result.status != 200) { throw new Error("Bad Server Response"); }
    return result.text();
  })
 
  // (D) SERVER RESPONSE
  .then((response) => {
    console.log(response);
  })
 
  // (E) HANDLE ERRORS - OPTIONAL
  .catch((error) => { console.log(error); });
 
  // (F) PREVENT FORM SUBMIT
  return false;
}
*/