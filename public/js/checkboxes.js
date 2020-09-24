
const cookieCheckboxesName = "checkboxesCount";

// updates number of checkboxes checked and updates cookie
function countCheck(){
  return{
    count: 0,
    clickCount(e, group){
      alert('hello world');
      if (e.target.checked == true) {
        this.count++;
        AddToCookie(cookieCheckboxesName, e.target.id);
        postCheckedCount(this.count, group);
      }
      else{
        if (this.count > 0) {
          this.count--;
          RemoveFromCookie(cookieCheckboxesName, e.target.id);
          postCheckedCount(this.count, group);
        }
      }
    }
  }
}


// posts checked count for a group data
function postCheckedCount(count, group){
  const data = {
    checked: count,
    group: group
  }
  axios.post('groups/checked', data).then(res => {
    console.log(res.data);
    alert(res.data);
  });
}

// returns number of checkboxes currently checked from cookie
function checkboxCount(cardName){
  var count = 0;
  var cookies = getCookie(cookieCheckboxesName);

  if (cookies != "") {
    cookies = cookies.split(",");

    // make sure not to count duplicates
    let uniqueArray = [...new Set(cookies)];

    if (uniqueArray != "") {
      for (let i = 0; i < uniqueArray.length; i++) {
        if (uniqueArray[i].slice(0, uniqueArray[i].length-1) == cardName) {
          count++;
          document.getElementById(uniqueArray[i]).checked = true;
        }
      }
    }
  }

  return count;
}

function AddToCookie(cookieName, newValue) {
  var cookies = getCookie(cookieName);
  var isAlreadySet = false;

  if (cookies != "") {
    cookies = cookies.split(",");

    for (let i = 0; i < cookies.length; i++) {
      if (cookies[i] == newValue) {
        isAlreadySet = true;
      }
    }

    if (!isAlreadySet) {
      cookies.push(newValue);

      setCookie(cookieName, cookies);
    }
  }
  else {
    setCookie(cookieName, newValue);
  }
}

function RemoveFromCookie(cookieName, oldValue) {
  var cookies = getCookie(cookieName);

  cookies = cookies.split(",");

  for(var i = cookies.length - 1; i >= 0; i--) {
    if(cookies[i] == oldValue) {
      cookies.splice(i, 1);
    }
  }

  setCookie(cookieName, cookies);
}

function setCookie(cookieName, cookieValue) {
  var d = new Date();
  d.setTime(d.getTime() + (3*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}

function getCookie(cookieName) {
  var name = cookieName + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
