# Tutorial link:
[Link](https://www.youtube.com/watch?v=8OBfr46Y0cQ&list=PLpcSpRrAaOaqMA4RdhSnnNcaqOVpX7qi5&ab_channel=LearnWebCode)

# Just a bit of theory

If you are building a theme for a "real" world project and your client is very particular about your form looking very identical
in many different browsers.

Then perform a web search for something called formalize or css normalize/reset, which will provide you some css code you can use which
will level your playing field across all browsers and devices.

# About the different functions that gets used in this project
A lot, if not all, of the functions used in this project are inbuild functions from WordPress.
To know what they exactly do or if you need more theory about them visit the [official WordPress website](https://developer.wordpress.org/reference/)

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

Read more about -> [get_template_part()](https://developer.wordpress.org/reference/functions/get_template_part/)

For this part we modified our index.php and created a new file content.php which now contains the content we have
that used to be in our index.php, archive.php, search.php and etc.

get_template_part('content'); <-- this can now be a reused in other theme files.

get_template_part('content'); makes WordPress look for our content.php file in the theme folder.

With content.php all of our theme design code is in one central place and is not repeated throughout our theme files.
Now if changes need to happen you will only need to change in one file instead of jumping from one file to another and so on.

# Post format feature
Typically when working on a website you wanna post different types, such as a status update (quick blurp of text)
that does not need a title, or perhaps a link to an external website and you want that link, or post, to be styled
differently from the other content on the webpage.

In short, the general idea is that if you are posting different types of content your theme should have different type of presentation
to match that type of content, and this is where that Post Formats comes into play.

The team of developers who created the core WordPress software have put together a standardized list of nine post formats:

- aside
- gallery
- link
- image
- quote
- status
- video
- audio
- chat

Post Formats is a ***theme*** feature.

# WordPress widgets
A widget is simply a self contained chunk of content that usually has a very specific purpose that gets displayed on a website.

For example a lot of websites have a sidebar, and in that sidebar you may see an area named "xxx" and a list of links, that is a "xxx"-widget.

The great thing about WordPress is that you can add widget locations wherever you want very easily.

By default WordPress treats widget areas as a giant unordered list.

# Functions.php
Whenever we are enabling a feature or making something dynamic we will use this file, function.php.

# WP_Query
Learning to take control f what is being fed to "the loop", loop through any set of posts at any time in any theme file.

The empty skeleton of the WordPress loop looks as follows.

```
if(have_posts()) :
  while(have_posts()) : the_post();
    //output content however we please here
  endwhile;

  else :
  //fallback no content message here
 endif;
 ```

 The reason why the loop is good as theme creators is because it gives you 100% complete control over how you format or
 output your post.

 By default the current url or permalink that you are currently viewing on your website determines which post gets looped through.

 By default WordPress will order its query results by date.

 Read more about -> [WP_Query](https://developer.wordpress.org/reference/classes/wp_query/)

 # Customized theme
 Everything being done for this is dependent on a WordPress object named `$wp_customize`.

 In `functions.php` we will create a function named `learningWordPress_customize_register('$wp_customize')` which
 takes `$wp_customize` as an argument.

 You need to be familiar with 3 sections:

 1. Controls (UI)
 2. Settings (Database)
 3. Sections (Group)

 The **Controls** is the form element that users actually interact with.

 The **Settings** is how you save the users choice, you can *set* or *save* a value into a setting and later *get*
 or *load* value from a setting.

 The **Sections** is a group of options.

 ```
 //Customize Appearance Options
 function learningWordPress_customize_register($wp_customize){
   //To create a settings
   $wp_customize->add_setting('lwp_link_color', array(
     'default' => '#006ec3',
     'transport' => 'refresh',
   ));
   //To create a section
   $wp_customize->add_section('lwp_standard_colors', array(
     'title' => __('Standard Colors', 'LearningWordPress'),
     'priority' => 30,
   ));
   //To create a control
   $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
     'label' => __('Link Color', 'LearningWordPress'),
     'section' => 'lwp_standard_colors',
     'settings' => 'lwp_link_color',
   )));
 }
 add_action('customize_register', 'learningWordPress_customize_register');

 ```

 The name of our function is `learningWordPress_customize_register()` and this takes `$wp_customize` as an argument.

 To create your **Settings** you use `$wp_customize` and its inbuild WordPress function `add_setting()` and give that a name
 which in this case is `lwp_link_color` and an array which takes the parameters needed.

 The `transport` property controls how WordPress will update the preview of your website when you are on the *customize* screen.

 Next to create a **Sections** you again use `$wp_customize` and its inbuild WordPress function `add_section()` and do what you did
 with the `add_setting()` function.

 The `'title'` is a UI which means that the users will be seeing that, therefore it should get a friendly user name.

 The `__()` is a WordPress translation/localization feature.

 Lastly you create **Controls** by using `$wp_customize` and its inbuild WordPress function `add_control()` and give
 that a `'label'` which is also an UI and needs a friendly user name, and give it your `'section'` and `'settings'` that you created.

 The different names given to the 3 of them `lwp_link_color`, `lwp_standard_colors` and `lwp_link_color_control` - *lwp* being
 short for *learning WordPress*.

 Read more about the functions being used here:
 - [$wp_customize->add_setting()](https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/)
 - [$wp_customize->add_section()](https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/)
 - [$wp_customize->add_control()](https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/)
 - [Customizer objects](https://developer.wordpress.org/themes/customize-api/customizer-objects/)
 - [__()](https://developer.wordpress.org/reference/functions/__/)
 - [add_action()](https://developer.wordpress.org/reference/functions/add_action/)
 - [WP_Customize_Control()](https://developer.wordpress.org/reference/classes/wp_customize_control/)
 - [WP_Customize_Cropped_Image_Control()](https://developer.wordpress.org/reference/classes/wp_customize_cropped_image_control/)
 - [wpautop()](https://developer.wordpress.org/reference/functions/wpautop/)
 - [wp_get_attachment_url()](https://developer.wordpress.org/reference/functions/wp_get_attachment_url/)
 - [get_author_posts_url()](https://developer.wordpress.org/reference/functions/get_author_posts_url/)
 - [get_the_author_meta()](https://developer.wordpress.org/reference/functions/get_the_author_meta/)
 - [get_avatar()](https://developer.wordpress.org/reference/functions/get_avatar/)
 - [WP_Query()](https://developer.wordpress.org/reference/classes/wp_query/)
 - [have_posts()](https://developer.wordpress.org/reference/functions/have_posts/)
 - [the_post()](https://developer.wordpress.org/reference/functions/the_post/)
 - [the_permalink()](https://developer.wordpress.org/reference/functions/the_permalink/)
 - [the_title()](https://developer.wordpress.org/reference/functions/the_title/)
 - [wp_reset_postdata()](https://developer.wordpress.org/reference/functions/wp_reset_postdata/)
 - [count_user_posts()](https://developer.wordpress.org/reference/functions/count_user_posts/)

# User accounts in WordPress
You can create as many users as you like for your WordPress website by under `Users` you can use `Add New` and create
a user account based on their email address.

# Pagination
[Pagination](https://developer.wordpress.org/themes/functionality/pagination/) allows
your user to browse back and forth through multiple pages of content.

WordPress can use pagination when:

- Viewing lists of posts when more posts exist than can fit one page.
- Breaking up by manually using following tag `<!--nextpage-->`.

When you are creating a theme you wanna to be sure add paginations support to any or all listing or results templates.

When you are dealing with a page where the url defines which content should be queried, in situations like that
adding pagination is easy. However what if you don't want to rely on the url to define what is getting queried from the database or
in other words, what if you are using your custom queries within your own custom template? The WordPress pagination functions will still
work but you would have to go some extra meters and provide more content to them, so that they get applicable by your own custom query and
template, as seen below.

```
//First option without the custom query and template
echo paginate_links();
//Second option with the custom query and template
echo paginate_links(array(
  'total' => $aboutShows->max_num_pages
));
```

When working with pagination on the most pages, you can do as we have done so far by using `paged` in for example `page-about-me.php`
**line** 63. But if you need to work on pagination on static pages you would have to use `page` instead of `paged`.
