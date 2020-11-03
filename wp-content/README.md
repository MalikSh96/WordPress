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

# Keeping your code D-R-Y
Don't Repeat Yourself (coding wise).

In terms of how the webpage is displayed there is a similiarity on how items are outputted on the webpage, they are
all outputting the same.
There is no need to have all that code repeated in our theme files.

get_template_part() is an inbuild function which allows the code to be D-R-Y.

get_template_part() --> https://developer.wordpress.org/reference/functions/get_template_part/

For this part we modified our index.php and created a new file content.php which now contains the content we have
that used to be in our index.php, archive.php, search.php and etc.

get_template_part('content'); <-- this can now be a reused in other theme files.

get_template_part('content'); makes WordPress look for our content.php file in the theme folder.

With content.php all of our theme design code is in one central place and is not repeated throughout our theme files.
Now if changes need to happen you will only need to change in one file instead of jumping from one file to another and so on.
