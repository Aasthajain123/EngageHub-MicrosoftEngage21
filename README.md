#                Microsoft Engage Mentorship program'21 project   

<h1 align="center"><img src="https://user-images.githubusercontent.com/50754325/143672348-3f4c1a57-30df-4473-9222-4d37e48b002a.png" width="500"></h1>
<p align="center">
  
##  🚩 Technologies used:
#### Front End Programming Languages : <img alt="HTML5" src="https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white"/> <img alt="CSS3" src="https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white"/><img alt="JavaScript" src="https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E"/><img alt="Bootstrap" src="https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white"/><img alt="jQuery" src="https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white"/> 

  | Backend Languages | PHP , MYSQL , XAMPP SERVER |
|---------|-------------|

#### Version Control : <img alt="Git" src="https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white"/>  
#### Hosting : <img alt="Azure" src="https://img.shields.io/badge/azure-%230072C6.svg?style=for-the-badge&logo=azure-devops&logoColor=white"/> 
## Features

This software has following features:

| Feature | Description |
|---------|-------------|
| Roles  | Admin, Teacher, Student |
| Certificate | Now you can upload certificate to a student using student code. |
| Payment |**[Stripe](http://stripe.com/)** is used. See configuration below.|
||Students can pay from their accounts.|
||Student can view payment receipts (history)|
||View Screenshot below|
|Attendance|Take student attendance for each course|
|Mark|Can give marks to students for each course|
|Registration|Register students|
|Notice, Syllabus|Manage uploaded Notices, Syllabus, Routines|
|Library|Manage a library of books.|
||Add new books.|
||Keep track of books.|
|Exam|Manage Semester by Examination|
|Grade|Give Grades based on marks of each course.|
|Accounts|Manage Income, Expense Amounts|
||View Graphs based on year.|
|Messaging|Uses CKEditor 5|
|Export/Import|  Users (Students, Teachers) from/to **Excel**|
||[Laravel Excel](https://github.com/maatwebsite/Laravel-Excel) package is used.|
||**Important:** Single sheet supported in an Excel file. So delete any extra sheet in an Excel file.|
||Following excel column  names supported for both Teachers and Students: `name, email, password, address, about, phone_number, blood_group, nationality, gender`.|
||Other columns:|
||For Teachers: `department`, (`class, section`) if assigned as class teacher.|
||For Students: `class, section, session, version, group, birthday, religion, father_name, father_phone_number, father_national_id, father_occupation, father_designation, father_annual_income, mother_name, mother_phone_number, mother_national_id, mother_occupation, mother_designation, mother_annual_income`|
||For any number(e.g: phone_number) starts with zero, put (') before zero.|
|Supported Languages|English, Spanish|
||To set default Language and Timezone, Edit as following in `config/app.php`:|

    'timezone' => 'Asia/Dhaka',//'UTC',
    'locale' => 'en',//'es-MX' for Spanish




# Run on your local machine:

1. First of all run your xampp server from "https://xampp.site" and set it up.

2. Next set up phpmyadmin , check whether phpMyAdmin is connected or not, by going to "https://localhost/phpmyadmin" , A Webpage should open for your localhost, if it show some error, connect it properly. (Note : If error does not go , You can also try stopping "MySQL Database" and "APACHE Web Server" from XAMPP control panel of your System{in "Manage Servers" option} and start them again.)

3. Go To “localhost/phpmyadmin” in any browser and create Database with name "engagehub". In that Database, Next go to import and import the file name "engagehub.sql" from database folder.

4. Now paste you project folder from github in xampp directory inside like “c:\xampp\htdocs\” named as engagehub.


5. Then go to your browser and type in URL like http://localhost/(Your_ProjectName) like "“http://localhost/engagehub”".

6. Next create student and teachers profiles to go to there dashboards and run all functionalities and features.

7. For Admin panel

-  Go to browser URL and type localhost/engagehub/admin

   - Username : 'Aastha Jain'
   - Password : 'MicrosoftEngage'






# Here are some screenshots:

# Major Learnings:
  
1. **Agile Methodology**: Through the 3 week span of the project, I undertook weekly sprints and made sure that small features get implemented in an efficient and time bound manner. Having a usable version of the product from the very beginning and seeing it evolve through the days and weeks was a joyful experience.
2. **Perseverance and debugging skills**: Having faced numerous bugs that seemed *impossible* to solve at first to actually overcoming them felt like victory. It improved my problem solving skills and faith in hardwork.
3. **New Technologies**: The project was a fun introduction to Php, Various front end Technologies and databases for me and I thoroughly enjoyed learning the new technologies. With the help of my friends and mentors as well as self study I was able to grow my knowledge.
4. **Growth mindset**: The sessions as well as the project taught me that our skills can be improved and having a growth mindset helps one and their organization in the long run.
  



Thank you ! Microsoft Team for such a wonderful mentorship program ❤️
