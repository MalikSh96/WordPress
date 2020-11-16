//Quick Add Post AJAX
let quickAddButton = document.querySelector("#quick-add-button");

//Because our button won't exist on every page, we will check for it
//Only IF we are on a page where quickAddButton exists will we add an event listener
if(quickAddButton){
  quickAddButton.addEventListener("click", function() {
    //Below is a javascript object
    let ourPostData = {
      "title": document.querySelector('.admin-quick-add [name="title"]').value,
      "content": document.querySelector('.admin-quick-add [name="content"]').value,
      "status": "publish"
    }

    let createPost = new  XMLHttpRequest();
    ///wp-json/wp/v2 is the WordPress RESP API part of the url
    createPost.open("POST", magicalData.siteUrl + "/wp-json/wp/v2/posts");
    /*
    To make sure only a signed in user can create a post we retrieve their code number
    */
    createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
    /*
    We want to spell out exactly what our AJAX request is sending, because we know that we
    are sending JSON but we want the server to know ahead of time what we are intending to send
    */
    createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    createPost.send(JSON.stringify(ourPostData));
    createPost.onreadystatechange = function () {
      if(createPost.readyState == 4){
        //readyState == 4 checks if the creation is complete
        if(createPost.status == 201){
          //WordPress returns the value of 201 if it has successfully created the post entry
          document.querySelector('.admin-quick-add [name="title"]').value = '';
          document.querySelector('.admin-quick-add [name="content"]').value = '';
        }
        else{
          alert("Error - Try again.");
        }
      }
    }
  });
}
