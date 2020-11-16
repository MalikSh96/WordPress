//for now we are making some references to our page-contact-us.php
let relatedPostsBtn = document.getElementById("related-posts-btn");
let relatedPostsContainer = document.getElementById("related-posts-container");

if(relatedPostsBtn) {
  relatedPostsBtn.addEventListener("click", function() {
    //console.log("the button was clicked");
    //We will use AJAX to send a request to the WordPress REST API to retrieve the desired data
    let ourRequest = new XMLHttpRequest();
    const url = "http://localhost:8080/wordpress";
    /*
    We are sending a Get request from the given url, the hardcoded url, and we are
    making a request to the WordPress REST API and the endpoint is /wp-json/wp/v2/posts
    */
    ourRequest.open('GET', url + '/wp-json/wp/v2/posts?categories=4&order=asc');
    //if AJAX connection and request is successful
    ourRequest.onload = () =>
    {
      if(ourRequest.status >= 200 && ourRequest.status < 400)
      {
        //saving the responseText into the variable named data
        let data = JSON.parse(ourRequest.responseText);
        //console.log(data);
        createHTML(data);
        relatedPostsBtn.remove(); //<-- removing our button after our data is read
      }
      else
      {
        console.log("We connected to the server, but it returned an error.");
      }
    };

    ourRequest.onerror = () => {
      console.log("Connection error");
    }

    ourRequest.send();
  });
}

function createHTML(postsData){
  /*
  We will loop through the raw JSON data to create an html string and then we will
  add that string into to the empty container div in page-contact-us.php
  */
  let ourHTMLString = '';
  for(i = 0; i < postsData.length; i++){
    ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
    ourHTMLString += postsData[i].content.rendered; //<-- gives the paragraph of text (the body text)
  }
  relatedPostsContainer.innerHTML = ourHTMLString;
}
