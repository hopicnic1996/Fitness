# Fitness
Introduction 
 
 
 
Task 1 
I. 	Use-case Diagram 
  
Customer can view the main page to understand more about the center and also they can see which courses are available to join. They can join the community by sign-up to get an account then login with it. After login they can view able to go to the manage page which in there they can edit their profile, change password, join courses that they want. Customer not just can join course, the order will stay pending till the admin accept it which mean customer have to go to the center and pay for the courses that they applied. 
  
Admin can also see the main page and login like normal customer. But after login the system will check, if the account are admin they will be able to go to admin manage page. In admin manage page they are able to add a bunch of information such as coach, course, customer then they are able to edit and remove them. They also can view all the customers, coaches and courses. With the order department, admin can view all the order that are pending on the system, then they can decide to accept it if the customer pay for the course or refuse it if customer not pay. 
 
 
 
 
 
 
 
II. 	Site-Map 
 
  
From the main page, admin and customer can login and access their area, also if customer don’t have the account they can Sign-up. After that each type of user will be able to do what they need to do. 
 
III. 	Prototype 
Below are prototypes for some main pages. 
  
 This is fitness center home page. As you can see, there are logo, banner. The page will display all courses that are available to join but customer have to login first. The navigation contain Login and Register. 
 	Admin and customer using same login site from the main page, but after logged the system will check if it is an admin account you will be able to access admin manage page if not you will access customer manage page. 
  
 	After logged with customer account, they will be able to access customer manage page. In there, they can change their information, password and also view all courses and join them. After join they can see their order status. 
  
 	After logged with Admin account, they are able to access admin manage page. In there they are able to add, view, update and delete of coach, course and also customer. With View order, they can check is there any order are pending then decide accept it or not and they can also view all the order history. 
IV. 	ERD 
  
To make the database as simple as possible for easy to use, there are 4 table in this ERD. 
•	There are Customer, user, course, order table. The Customer and User table are two different type of user when login.  I use the User status to identify Admin user or coach user which mean coach will have their own account but lack of functions than Admin. 
•	The course table are using to stories all the course that will be create. Each course will have its own coach teach that course. 
•	For selling, the Order table are using to stories the order which mean when customer want to join any course the Order table will store customer ID include course ID that customer want to join and I’m using the order status to know have the customer pay for the course 
ERD meets what the scenario are requiring. It is not the final one, and need more refinements.   
V. 	How use server-side scripting language? 
1. How to use PHP to build the website 
The website is created by using PHP (Hypertext Preprocessor) – a programming language designed for web development. Beside, XAMPP used as a tool to run dynamic website in localhost and create the database by using MySQL. 
$_POST are used to collect form the data. We can use it in any html form such as login, register, etc. Here is a simple code: 
 
with $_POST method will collect all data are inputted from the form, and display it. 
Isset () are used when a variable is set. We can use this in combination with $_POST to take data from form when user click submit button.  A lot of functions need this like login, register, etc.  Variables 
 
Data from input field will be sent to demo3.php when user click submit, the same file with PHP code.  They will be stored in variables, and display to the page. 
I have make the evidences and point out where it can be used. The evidences show that I can retrieve data and display it by using PHP. There are more functions and methods that I can use, but these two I probably will use the most. 
 
2. Consider other programming languages 
For creating the website, we can also use others programming languages such as ASP.NET (web application framework) or JSP (JavaServer Pages). Compare to theses languages, PHP is free and easier to learn, to use so the best solution in this scenario is using PHP. 
VI. 	How use Client-side scripting language? 
1. How to use HTML form to build the website 
Form is very important in dynamic website, it allows us to gather information from users. This website like ecommerce website, so html form can be implemented in several CMS functions such as 
 
information will be send to page action where PHP code is resided to execute related function. 
2. How to use CSS style, JavaScript dialog box form to build the website 
If the website just using HTML, it will not make the website look good. That why we also need CSS, and JavaScript to make it look better, more dynamic in client-site. Alert method will be used more often.  
For example: when a customer login, a dialog box will appear to tell customer has vice-versa or logged in 
 
There are more things with CSS and Javascript that I can use it for HTML form but above is an example how it work. In conclusion, I can learn more about it from internet at some communities, video. 
For client-side, I will try to make the website with HTML and include CSS, javascript to make it better depend the situation, and I will add more things of it necessary. 
 
VII. 	Evaluate alternative languages 
As discussion server-site and client-site languages at assignment 1 about my choice of them. Once again, I would like to refer them main point of them. 
1. Client-site 
Based on my research, HTML and CSS are standard when using to creating website lay-out and JavaScript is standard for manipulating events in client-site. Reasons for choose them: 
•	They are used everywhere on the web. 
•	JavaScript works on different browser, lot of framework, can be used in both client-side, and server-side. 
•	JavaScript has fast performance. 
•	Large resources, and community, people can learn and get help easily. 
As they are standard with many advantages, so there are no reasons to not choose them for clientside works. When developing this website I will use JavaScript framework if necessary.  
2. Server-site 
As mentioned in assignment 1, there are some main point about the reason that I choose PHP: 
•	PHP uses less code so the design is faster. 
•	PHP can develop advanced structure for complex web pages so the cost of web development design is quite cheap. 
•	PHP has a great advantage of being highly community driven, so there is a lot of developer development so building a web will be simpler with reference from other developers. 
Server side scripting is programming languages used to create dynamic websites (Ruby, PHP, ASP.NET, Perl etc). They use CGI (Common Gateway Interface) to produce dynamic webpage. As for design web development, I believe using PHP might be a best choice as PHP is a simple language with incredibly speedy and easy to learn and use. It integrates with HTML code and has large community to support. Although PHP is free, its features less compare to other languages (ASP.NET, ISF, Java,…). 
Until I learn more about other languages, and create application with other server-side language, for now PHP is the best choice to make the website in this course. Also I will stick with HTML, CSS, and JavaScript for front-end, PHP for back-end. I will also appropriate JavaScript framework to support what I want to make.  
Task 2 
By follow this the link below you are able to view source code: 
On Web browser:  	https://github.com/hopicnic1996/Fitness 
On Git: 
https://github.com/hopicnic1996/Fitness.git  
 
 In the login page, user have to login to their account. If user login by manager account, the website will allow manager to go to manager page. 
  
•	If customer don’t have account to they can select “Don’t have an account” to sign-up 
  
 
•	After login to go to manage page user have to hover on the user name at top right corner of web 
  
1. Customer menu 
•	If the account is customer it will show up as Profile. If the account is admin it will show up as Edit profile 
 
•	In manage page there are 2 different page: Customer page and menu page 
 
For Customer page: 
  
In manage user customer can able to manage their profile, change their password, and view all the coach 
-	Mange profile 
  
-	Change password 
  
-	View all coaches 
  
-	In manage course customer are able to view all the courses and also they can join course by click on Join. After click on Join button it will show as “Pending” which mean it is pending for the customer come to the station and pay to join. After paid the it will show as “You already in this course” 
  
 
-	To logout the account customer can select Logout option form Setting 
  
 
 
 
 
 
 
 
 
1. Admin menu 
 	For admin page, unlike customer manage page. Admin are allow to Manage user, Course, Customer, and view Order detail. 
  
-	In Manage User, admin are allow to add new coach and also view all coaches 
 
  
-	In View Coaches, admin not just see all coaches they can also change coach information and also remove them 
 
-	In Manage Course, admin are allow to add new course and View all courses. Same as View Coaches, admin also can able to change course information and remove them 

  
-	In Order Detail admin are allow to view all the order. Not just stop at view all the order, they are allowed to accept the customer to join the case by click on 
 
 
