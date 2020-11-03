# Just a bit of theory

If you are building a theme for a "real" world project and your client is very particular about your form looking very identical
in many different browsers.
Then perform a web search for something called formalize or css normalize/reset, which will provide you some css code you can use which
will level your playing field across all browsers and devices.

# About the different functions that gets used in this project
A lot, if not all, of the functions used in this project are inbuild functions from WordPress.
To know what they exactly do or if you need more theory about them visit the official WordPress website.
https://developer.wordpress.org/reference/

# About featured images
A featured image is a single image that we choose to represent a post or a page,
whereas a regular image is something we add in the text area of the post.

A featured image is a hands-off approach when it comes where you think the image should be located,
we don't get to choose that. We are basically saying that you will let your theme make intelligent design choices for you.
We just assign the image to represent the given post/page.

A featured image is a separate field from the main text of your post/page, which allows your theme to do very dynamic things.

# WordPress Search functionality
WordPress has an in built search form such as get_search_form().

If you don't have a custom file as our searchform.php WordPress will fall back to its default serach form code.

WordPress will automatically look in our theme folder for a file named search.php to output the search results, if you don't have
a search.php WordPress will fall back and use index.php to output the search results.
